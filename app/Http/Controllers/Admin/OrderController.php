<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMailable;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // $todayDate = Carbon::now();
        // $orders = Order::whereDate('created_at', $todayDate)->paginate(10);
        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function($q) use ($request) {
                            return $q->whereDate('created_at', $request->date);
                        }, function($q) use ($todayDate) {
                            $q ->whereDate('created_at', $todayDate);
                        })
                        ->when($request->status != null, function($q) use ($request) {
                            return $q->where('status_message', $request->status);
                        })
                        ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        
        if($order)
        {
            return view('admin.orders.view', compact('order'));
        }
        else
        {
            return redirect()->back()->with('message', 'No Order Found');
        }
    }

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $request->validate([
            'order_status' => ['required']
        ]);
        
        $order = Order::where('id', $orderId)->first();

        if($order)
        {
            $order->update([
                'status_message' => $request->order_status
            ]);

            return redirect('admin/orders/'.$orderId)->with('message', 'Order Status updated');
        }
        else
        {
            return redirect('admin/orders/'.$orderId)->with('message', 'Order ID Not Found');
        }
    }

    public function viewInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = [
            'order' => $order
        ];

        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
    }

    public function mailInvoice(int $orderID)
    {
        $order = Order::findOrFail($orderID);

        try{
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect()->back()->with('message', 'Invoice Mail has been sent to '.$order->email);
        }
        catch(\Exception $e){
            return redirect()->back()->with('message', 'Something Went Wrong');
        }
    }
}
