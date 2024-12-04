@extends('layouts.admin')

@section('content')
    <div class="flex justify-between my-6">
        <h2 class="text-xl font-semibold text-card-foreground">
            Create Category
        </h2>
        <a href="{{route('admin.categories.index')}}" class="btn btn-primary hover:bg-red-500 text-xs px-4">
            Back to categories
        </a>    
    </div>

    <div class="card">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="card-content p-4">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-card-foreground">Name</label>
                    <input type="text" name="name" id="name" class="input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-card-foreground">Description</label>
                    <textarea name="description" id="description" rows="3" class="input mt-1 block w-full"></textarea>
                </div>
            </div>
            <div class="card-footer px-4 py-2">
                <button type="submit" class="btn btn-primary border border-primary py-2 px-3 gap-2">Create</button>
            </div>
        </form>
    </div>
@endsection