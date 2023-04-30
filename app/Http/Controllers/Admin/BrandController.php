<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', '0')->get();
        return view('admin.brands.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $validatedData = $request->validated();

        $brand = new Brand;
        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->status = $request->status == true ? '1' : '0';
        $brand->category_id = $validatedData['category_id'];
        
        $brand->save();

        return redirect('admin/brands')->with('message', 'Brand Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $categories = Category::where('status', '0')->get();
        return view('admin.brands.edit', compact('brand','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, $brand)
    {
        $validatedData = $request->validated();

        $brand = Brand::findOrFail($brand);

        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->status = $request->status == true ? '1' : '0';
        $brand->category_id = $validatedData['category_id'];
        $brand->update();

        return redirect('admin/brands')->with('message', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect('admin/brands')->with('message', 'Brand Deleted Successfully');
    }
}
