@extends('layouts.app')

@section('title', 'Welcome to Our Food Order App')

@section('content')
    <h1>Welcome to Our Food Order App</h1>
    <h2>Featured Items</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($featuredItems as $item)
            <div class="bg-white shadow rounded-lg p-4">
                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                <p class="text-gray-600">{{ $item->description }}</p>
                <p class="text-lg font-bold mt-2">${{ number_format($item->price, 2) }}</p>
                <a href="{{ route('menu.show', $item) }}"
                    class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Details</a>
            </div>
        @endforeach
    </div>
@endsection
