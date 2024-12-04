@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Our Menu</h1>
    
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Filter by Category:</h2>
        <div class="flex flex-wrap gap-2">
            <button class="category-filter bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark transition duration-300" data-category="all">All</button>
            @foreach($categories as $category)
                <button class="category-filter bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition duration-300" data-category="{{ $category->id }}">{{ $category->name }}</button>
            @endforeach
        </div>
    </div>
    
    <div id="category-description" class="mb-6 text-gray-600 italic"></div>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    
    <div id="menu-items" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($foodItems as $item)
            <div class="food-item bg-white rounded-lg shadow-md overflow-hidden" data-category="{{ $item->category_id }}">
                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $item->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $item->description }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold">${{ number_format($item->price, 2) }}</span>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="food_item_id" value="{{ $item->id }}">
                            <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark transition duration-300">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const menuItems = document.querySelectorAll('.food-item');
    const categoryDescription = document.getElementById('category-description');
    const categories = JSON.parse('@json($categories)');

    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            categoryFilters.forEach(f => f.classList.remove('bg-primary', 'text-white'));
            this.classList.add('bg-primary', 'text-white');

            menuItems.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });

            if (category === 'all') {
                categoryDescription.textContent = '';
            } else {
                const selectedCategory = categories.find(c => c.id == category);
                categoryDescription.textContent = selectedCategory ? selectedCategory.description : '';
            }
        });
    });
});
</script>
@endpush