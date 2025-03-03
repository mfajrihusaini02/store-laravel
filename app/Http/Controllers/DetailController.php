<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $slug)
    {
        $products = Product::with(['galleries', 'user'])->where('slug', $slug)->firstOrFail();

        return view('pages.detail', [
            'products' => $products,
        ]);
    }
}
