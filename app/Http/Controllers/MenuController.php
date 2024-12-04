<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $foodItems = FoodItem::where('is_active', true)->get();
        $categories = Category::all();
        return view('menu.index', compact('foodItems', 'categories'));
    }
}