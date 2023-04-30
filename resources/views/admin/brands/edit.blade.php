@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Update Brand
                    <a href="{{url('admin/brands')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/brands/'.$brand->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$brand->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$brand->name}}" class="form-control">
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="slug" value="{{$brand->slug}}" class="form-control">
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label><br/>
                            <input type="checkbox" name="status" {{$brand->status == '1' ? 'checked' : ''}}>
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