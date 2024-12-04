@extends('layouts.app')

@section('title', 'Welcome to Our Food Order App')

@section('content')
    <h1>Welcome to Our Food Order App</h1>
    <h2>Featured Items</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white shadow rounded-lg p-4">
            <h3 class="text-lg font-semibold">Dashboard</h3>
        </div>
    </div>
@endsection
