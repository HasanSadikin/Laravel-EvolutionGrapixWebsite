@extends('layouts.app')

@section('title', 'Search')

@section('content')
  <livewire:frontend.pages.search :search="$searchString" />
@endsection
