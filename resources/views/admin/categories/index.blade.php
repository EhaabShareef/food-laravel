@extends('layouts.admin')

@section('content')
    <h2 class="my-6 text-xl font-semibold text-card-foreground">
        Categories
    </h2>

    <div class="mb-6">
        <a href="{{ route('admin.categories.create') }}" class="text-xs btn btn-primary border border-primary py-2 px-3 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus">
                <circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/>
            </svg>
            Add New Category
        </a>
    </div>

    <div class="card mb-6">
        <div class="card-header">
            <h3 class="card-title text-xs md:text-sm font-semibold">Search Categories</h3>
        </div>
        <div class="card-content p-2">
            <form action="{{ route('admin.categories.index') }}" method="GET">
                <div class="flex items-center">
                    <input type="text" name="search" placeholder="Search categories..." class="input mr-2" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-secondary p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="border border-secondary rounded-md">
        <div class="p-4 bg-secondary">
            <table class="w-full">
                <thead>
                    <tr class="text-xs uppercase">
                        <th class="text-left p-2">Name</th>
                        <th class="text-left p-2">Description</th>
                        <th class="text-left p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr class="text-sm bg-muted">
                            <td class="p-2">{{ $category->name }}</td>
                            <td class="p-2">{{ $category->description }}</td>
                            <td class="p-2 flex flex-row">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm w-6 h-6 p-1 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line">
                                        <path d="m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2"/>
                                        <path d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><path d="M8 18h1"/>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-destructive btn-sm  w-6 h-6 p-1 rounded-lg" onclick="return confirm('Are you sure you want to delete this category?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                                            <path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
@endsection