@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Brand
                    <a href="{{url('admin/brands')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/brands')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control">
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label><br/>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary text-white float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection