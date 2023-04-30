@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>
                    Brands
                    <a href="{{url('admin/brands/create')}}" class="btn btn-primary text-white btn-sm float-end">Add Brand</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->category->name}}</td>
                            <td>{{$brand->status == '1' ? 'Hidden' : 'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/brands/'.$brand->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{url('admin/brands/'.$brand->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Brands Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection