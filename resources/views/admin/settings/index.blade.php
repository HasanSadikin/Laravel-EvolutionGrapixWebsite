@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success mb-3">{{session('message')}}</div>
        @endif
        <form action="{{url('admin/settings')}}" method="POST">
            @csrf
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Website Name</label>
                            <input type="text" value="{{$settings->website_name ?? ''}}" name="website_name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Website URL</label>
                            <input type="text" value="{{$settings->website_url ?? ''}}" name="website_url" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Page Title</label>
                            <input type="text" value="{{$settings->page_title ?? ''}}" name="page_title" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{$settings->meta_keyword ?? ''}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{$settings->meta_description ?? ''}}</textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website - Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control" rows="3">{{$settings->address ?? ''}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone 1 *</label>
                            <input value="{{$settings->phone1 ?? ''}}" type="text" name="phone1" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone 2</label>
                            <input value="{{$settings->phone2 ?? ''}}" type="text" name="phone2" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email ID 1 *</label>
                            <input value="{{$settings->email1 ?? ''}}" type="text" name="email1" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email ID 2</label>
                            <input value="{{$settings->email2 ?? ''}}" type="text" name="email2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website - Social Media</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Facebook (Optional)</label>
                            <input value="{{$settings->facebook ?? ''}}" type="text" name="facebook" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Twitter</label>
                            <input value="{{$settings->twitter ?? ''}}" type="text" name="twitter" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Instagram (Optional)</label>
                            <input value="{{$settings->instagram ?? ''}}" type="text" name="instagram" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Youtube (Optional)</label>
                            <input value="{{$settings->youtube ?? ''}}" type="text" name="youtube" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button class="btn btn-primary text-white">Save Setting</button>
            </div>
        </form>
    </div>
  </div>
@endsection