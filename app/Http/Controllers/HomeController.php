<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodItem;

class HomeController extends Controller
{
    public function index()
    {
        $featuredItems = FoodItem::where('is_featured', true)->take(4)->get();
        return view('home', compact('featuredItems'));
    }
}
