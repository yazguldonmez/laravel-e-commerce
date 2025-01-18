<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Product;

class PageController extends Controller
{
    public function products()
    {
        $products = Product::where('status', '1')->paginate(20);

        return view('frontend.pages.products', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('frontend.pages.product', compact('product'));
    }

    public function about()
    {
        $about = About::where('id', 1)->first(); //About içeriği, yalnızca bir kez ekleneceği için bu şekilde çekildi...
        return view('frontend.pages.about', compact('about'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function cart()
    {
        return view('frontend.pages.cart');
    }
}
