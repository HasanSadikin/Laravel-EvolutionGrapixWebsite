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
                    Sliders
                    <a href="{{url('admin/sliders/create')}}" class="btn btn-primary text-white btn-sm float-end">
                        Add Slider
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                        <tr>
                            <td>{{$slider->id}}</td>
                            <td>{{$slider->title}}</td>
                            <td>{{$slider->description}}</td>
                            <td>
                                <img src="{{asset('uploads/sliders/'.$slider->image)}}" alt="">
                            </td>
                            <td>{{$slider->status == '1' ? 'Hidden' : 'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{url('admin/sliders/'.$slider->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Slider Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection