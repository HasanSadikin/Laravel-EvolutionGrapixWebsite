@extends('layouts.app')

@section('title', 'Services')

@section('content')
<section>
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
        <header class="text-center">
            <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
                Our Services
            </h2>

            <p class="max-w-md mx-auto mt-4 text-gray-500">
                Our services are designed to meet your unique needs with personalized attention and care.
            </p>
        </header>


        <ul class="grid grid-cols-1 gap-4 mt-8 lg:grid-cols-2">

            @foreach ($services as $service)
                <li>
                    <a href="{{ url('services/' . $service->slug) }}" class="relative block group">
                        <img src="{{ asset($service->image) }}" alt=""
                            class="object-cover w-full transition duration-500 aspect-square group-hover:opacity-90" />

                        <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
                            <span
                                class="w-full mt-1.5 inline-block bg-black px-5 py-3 text-center text-xs font-medium uppercase tracking-wide text-white">
                                {{ $service->name }}
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection
