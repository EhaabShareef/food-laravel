@extends('layouts.admin')


@section('content')
<div class="flex justify-between my-6">
    <h2 class="text-xl font-semibold text-card-foreground">
        Edit Category / <span class="text-base text-foreground/80">{{ $category->name }}</span>
    </h2>
    <a href="{{route('admin.categories.index')}}" class="btn btn-primary hover:bg-red-500 text-xs px-4">
        Back to categories
    </a>    
</div>

    <div class="card">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-content p-4">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-card-foreground">Name</label>
                    <input type="text" name="name" id="name" class="input mt-1 block w-full" value="{{ $category->name }}" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-card-foreground">Description</label>
                    <textarea name="description" id="description" rows="3" class="input mt-1 block w-full">{{ $category->description }}</textarea>
                </div>
            </div>
            <div class="card-footer px-4 py-2">
                <button type="submit" class="btn btn-primary border border-primary py-2 px-3 gap-2">Update Category</button>
            </div>
        </form>
    </div>
@endsection