@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
  <div class="py-3 py-md-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="shadow bg-white p-3">
            <h4 class="text-primary">
              <i class="fa fa-shopping-cart text-dark"></i> My Order Details
              <a href="{{url('orders')}}" class="btn btn-danger btn-sm float-end">Back</a>
            </h4>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <h5>Order Details</h5>
                <hr>
                <h6>Order ID: {{ $order->id }}</h6>
                <h6>Tracking ID/No: {{ $order->tracking_no }}</h6>
                <h6>Ordered Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                <h6 class="border p-2 text success">
                  Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
                </h6>
              </div>
              <div class="col-md-6">
                <h5>User Details</h5>
                <hr>
                <h6>Full Name: {{ $order->fullname }}</h6>
                <h6>Email: {{ $order->email }}</h6>
                <h6>Phone: {{ $order->phone }}</h6>
                <h6>Address: {{ $order->address }}</h6>
                <h6>Pin Code: {{ $order->pincode }}</h6>
              </div>
            </div>
            <br />
            <h5>Order Items</h5>
            <hr>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Item ID</th>
                  <th>Image</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $totalPrice = 0;
                @endphp
                @forelse ($order->orderItems as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                      @if ($item->product->productImages)
                        <img src="{{ asset($item->product->productImages[0]->image) }}" style="width: 50px; height: 50px"
                          alt=" {{ $item->product->name }}">
                      @else
                        <img src="" style="width: 50px; height: 50px" alt="">
                      @endif
                    </td>
                    <td>{{ $item->product->name }}</td>
                    <td>Rp. {{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="fw-bold">Rp. {{ $item->quantity * $item->price }}</td>
                    @php
                      $totalPrice += $item->quantity * $item->price;
                    @endphp
                  </tr>
                @empty
                  <tr>
                    <td colspan="7">No Orders Available</td>
                  </tr>
                @endforelse
                <tr>
                  <td colspan="5" class="fw-bold">Total Amount</td>
                  <td colspan="1" class="fw-bold">Rp. {{ $totalPrice }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
