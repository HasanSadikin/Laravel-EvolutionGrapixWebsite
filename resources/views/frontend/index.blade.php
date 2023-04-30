@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
  <livewire:frontend.home />
@endsection

@section('script')
  <script>
    $('.trending-product').owlCarousel({
      logo: true,
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 4
        }
      }
    });
  </script>
@endsection
