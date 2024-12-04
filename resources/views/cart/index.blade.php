@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    
    @if(count($cartItems) > 0)
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left p-2">Item</th>
                        <th class="text-center p-2">Quantity</th>
                        <th class="text-right p-2">Price</th>
                        <th class="text-right p-2">Subtotal</th>
                        <th class="text-right p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $id => $item)
                        <tr class="border-b">
                            <td class="p-2">
                                <div class="flex items-center">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded mr-4">
                                    <span>{{ $item['name'] }}</span>
                                </div>
                            </td>
                            <td class="text-center p-2">{{ $item['quantity'] }}</td>
                            <td class="text-right p-2">${{ number_format($item['price'], 2) }}</td>
                            <td class="text-right p-2">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td class="text-right p-2">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-red-600 hover:text-red-800">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right p-2 font-bold">Total:</td>
                        <td class="text-right p-2 font-bold">${{ number_format($total, 2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="text-right">
            <a href="{{ route('checkout') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition duration-300">
                Proceed to Checkout
            </a>
        </div>
    @else
        <p class="text-xl text-center">Your cart is empty.</p>
        <div class="text-center mt-6">
            <a href="{{ route('menu') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition duration-300">
                Browse Menu
            </a>
        </div>
    @endif
</div>
@endsection