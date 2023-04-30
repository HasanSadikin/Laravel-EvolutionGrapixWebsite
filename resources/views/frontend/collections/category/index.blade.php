@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
    <section>
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
            <header>
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
                    Products
                </h2>

                <p class="max-w-md mt-4 text-gray-500">
                    Our products are designed to enhance your everyday life with durability, comfort, and style.
                </p>
            </header>
            <ul class="grid gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($categories as $category)
                    <li>
                        <div class="group relative block overflow-hidden text-decoration-none text-dark drop-shadow-lg py-2">
                            <a href="{{ url('/collections/' . $category->slug) }}">
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                                    class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72" />
                            </a>
                            <div class="relative bg-white p-6">
                                <a href="{{ url('/collections/' . $category->slug) }}" class="text-decoration-none">
                                    <h3 class="mt-4 text-lg font-medium text-gray-900 truncate">
                                        {{ $category->name }}</h3>
                                </a>

                                <a href="{{ url('/collections/' . $category->slug) }}"
                                    class="text-center block w-full rounded bg-yellow-400 p-4 text-sm font-medium transition hover:scale-105">
                                    Show More
                                </a>
                            </div>

                        </div>
                    </li>
                @empty
                    <li class="grid-cols-12">
                        <h5>No Categories Available</h5>
                    </li>
                @endforelse
            </ul>
        </div>
    </section>
@endsection
