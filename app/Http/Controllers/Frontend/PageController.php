<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    public function products(Request $request)
    {

        $order = $request->order ?? 'id';
        $sort = $request->sort ?? 'desc';

        $products = Product::where('status', '1')
            ->where(function ($query) use ($request) {})
            ->with('category:id,name,slug'); //Eager loading için...

        $minPrice = $products->min('price'); //filtremeledeki filter by price için...
        $maxPrice = $products->max('price');

        $sizeLists = Product::where('status', '1')->groupBy('size')->pluck('size')->toArray();

        $colors = Product::where('status', '1')->groupBy('color')->pluck('color')->toArray();

        $products = $products->orderBy($order, $sort)->paginate(20);


        $categories = Category::where('status', '1')
            ->where('cat_ust', null)
            ->withCount('items')
            ->get();

        return view('frontend.pages.products', compact('products', 'categories', 'minPrice', 'maxPrice', 'sizeLists', 'colors'));
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
