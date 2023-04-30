<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $validatedData = $request->validated();

        $service = new Service;
        $service->name = $validatedData['name'];
        $service->slug = Str::slug($validatedData['slug']);
        $service->description = $validatedData['description'];
        
        $path = 'uploads/services/';
        
        if($request->hasFile('image'))
        {
            $imagePath = $path.$service->image;

            if(File::exists($imagePath))
            {
                File::delete($imagePath);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move($path, $filename);

            $service->image = $path.$filename;
        }
        
        $service->meta_title = $validatedData['meta_title'];
        $service->meta_keyword = $validatedData['meta_keyword'];
        $service->meta_description = $validatedData['meta_description'];
        $service->cost_per_meter = $validatedData['cost_per_meter'];

        $service->status = $request->status == true ? '1' : '0';
        $service->save();

        return redirect('admin/services')->with('message', 'Service Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, int $service)
    {
        $validatedData = $request->validated();

        $service = Service::findOrFail($service);
        $service->name = $validatedData['name'];
        $service->slug = Str::slug($validatedData['slug']);
        $service->description = $validatedData['description'];
        
        $path = 'uploads/services/';
        
        if($request->hasFile('image'))
        {
            $imagePath = $service->image;

            if(File::exists($imagePath))
            {
                File::delete($imagePath);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move($path, $filename);

            $service->image = $path.$filename;
        }
        
        $service->meta_title = $validatedData['meta_title'];
        $service->meta_keyword = $validatedData['meta_keyword'];
        $service->meta_description = $validatedData['meta_description'];
        $service->cost_per_meter = $validatedData['cost_per_meter'];

        $service->status = $request->status == true ? '1' : '0';
        $service->save();

        return redirect('admin/services')->with('message', 'Service Added Successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
