<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $validatedData = $request->validated();

        $slider = new Slider;
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $slider->status = $request->status == true ? '1' : '0';

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/sliders/', $filename);

            $slider->image = $filename;
        }

        $slider->save();

        return redirect('admin/sliders')->with('message', 'Slider Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();

        if($request->hasFile('image'))
        {
            $path = 'uploads/sliders/';

            if(File::exists($path.$slider->image))
            {
                File::delete($path.$slider->image);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/sliders/', $filename);

            $slider->image = $filename;
        }

        $slider->title = $validatedData['title']; 
        $slider->description = $validatedData['description']; 
        $slider->status = $request->status == true ? '1' : '0'; 
        $slider->update();

        return redirect('admin/sliders')->with('message', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $path = 'uploads/sliders/';
        if(File::exists($path.$slider->image))
        {
            File::delete($path.$slider->image);
        }

        $slider->delete();

        return redirect('admin/sliders')->with('message', 'Slider Deleted Successfully');
    }
}
