@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Slider
                    <a href="{{url('admin/sliders')}}" class="btn btn-danger text-white btn-sm float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$slider->title}}"  class="form-control">
                            @error('title') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control" rows="3">{{$slider->description}}</textarea>
                            @error('description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Status</label><br/>
                            <input type="checkbox" name="status" {{$slider->status == '1' ? 'checked' : ''}}>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image') <small class="text-danger">{{$message}}</small> @enderror
                            <img src="{{asset('uploads/sliders/'.$slider->image)}}" width="600px" alt="">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary text-white float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection