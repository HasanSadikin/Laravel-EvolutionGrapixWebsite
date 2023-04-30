@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Edit Service
                    <a href="{{url('admin/services')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/services/'.$service->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value='{{$service->name}}'>
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" value='{{$service->slug}}''>
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{$service->description}}</textarea>
                            @error('description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Cost Per Meter</label>
                            <input type="number" name="cost_per_meter" class="form-control" value='{{$service->cost_per_meter}}'>
                            @error('imacost_per_meterge') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{asset($service->image)}}" width="60px" />
                            @error('image') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label><br/>
                            <input type="checkbox" name="status" value={{$service->status == '1' ? 'check' : ''}}>
                        </div>

                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value='{{$service->meta_title}}'>
                            @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{$service->meta_keyword}}</textarea>
                            @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{$service->meta_description}}</textarea>
                            @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
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