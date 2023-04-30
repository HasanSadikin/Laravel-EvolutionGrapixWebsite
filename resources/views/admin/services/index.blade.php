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
                    Services
                    <a href="{{url('admin/services/create')}}" class="btn btn-primary text-white btn-sm float-end">Add Service</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->status == '1' ? 'Hidden' : 'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/services/'.$service->id.'/edit')}}" class="btn btn-sm btn-success text-white">Edit</a>
                                <a href="{{url('admin/services/'.$service->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-danger text-white">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Service Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection