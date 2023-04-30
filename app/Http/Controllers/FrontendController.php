<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\ServiceCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function newArrivals()
    {
        $newArrivals = Product::latest()->take(16)->get();
        return view('frontend.pages.new_arrivals', compact('newArrivals'));
    }

    public function showService(string $serviceSlug)
    {
        $service = Service::where('slug',$serviceSlug)->first();
        return view('frontend.services.view', compact('service'));
    }

    public function showServices()
    {
        $services = Service::all();
        return view('frontend.services.index', compact('services'));
    }


    public function requestService(string $serviceSlug)
    {
        $service = Service::where('slug',$serviceSlug)->first();
        return view('frontend.services.request', compact('service'));
    }

    public function createServiceOrder(string $serviceSlug, Request $request)
    {
        $service = Service::where('slug',$serviceSlug)->first();

        $validatedData = $request->validate([
            'reference_image' => ['required'],
            'meter' => ['required', 'integer']
        ]);

        $service_cart = new ServiceCart;
        $service_cart->user_id = Auth::user()->id;
        $service_cart->service_id = $service->id;
        $service_cart->meter = $validatedData['meter'];

        $path = 'uploads/services/request/';
        
        if($request->hasFile('reference_image'))
        {
            $imagePath = $service_cart->reference_image;

            if(File::exists($imagePath))
            {
                File::delete($imagePath);
            }

            $file = $request->file('reference_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move($path, $filename);

            $service_cart->reference_image = $path.$filename;
        }

        $service_cart->save();

        return redirect('/')->with('message', 'Service ordered successfully');
    }

    public function searchProducts(Request $request)
    {
        if($request->search){
            return view('frontend.pages.search', ['searchString' => $request->search]);
            
        }else{
            return redirect()->back()->with('message', 'Empty Search');
        }
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if($category){
        return view('frontend.collections.products.index', compact('category'));
        }
        else{
            return redirect()->back();
        }
    }

    public function productView($category_slug, $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if($category){
            $product = $category->products()->where('slug', $product_slug)
                                            ->where('status', '0')
                                            ->first();

            if($product)
            {
                return view('frontend.collections.products.view', compact('category', 'product'));
            }
            else{
                return redirect()->back();
            }

        }
        else{
            return redirect()->back();
        }
    }

    public function thankYou()
    {
        return view('frontend.thank-you');
    }
}
