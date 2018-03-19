<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Show the index page.
     *
     * @var App\Product $products
     * @return Illuminate\View\View
     */
    public function index()
    {
        $products = \App\Product::all();
        return view('index', compact('products'));
    }
}
