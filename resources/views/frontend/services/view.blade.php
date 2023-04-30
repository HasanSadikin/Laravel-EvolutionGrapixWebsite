@extends('layouts.app')

@section('title')
{{$service->meta_title}}
@endsection

@section('meta_keyword')
{{$service->meta_keyword}}
@endsection

@section('meta_description')
{{$service->meta_description}}
@endsection

@section('content')
<div class="">
    <livewire:frontend.service.view :service="$service"/>
</div>
@endsection