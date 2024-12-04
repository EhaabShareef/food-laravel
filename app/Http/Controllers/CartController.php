<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodItem;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $foodItem = FoodItem::findOrFail($request->food_item_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$foodItem->id])) {
            $cart[$foodItem->id]['quantity']++;
        } else {
            $cart[$foodItem->id] = [
                "name" => $foodItem->name,
                "quantity" => 1,
                "price" => $foodItem->price,
                "image" => $foodItem->image_url
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Food item added to cart successfully!');
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Food item removed from cart successfully!');
        }
    }
}