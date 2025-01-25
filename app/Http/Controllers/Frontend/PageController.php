<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    public function products(Request $request, $slug = null)
    {

        $category = request()->segment(1) ?? null;

        $order = $request->order ?? 'id';
        $sort = $request->sort ?? 'desc';

        $products = Product::where('status', '1')
            ->where(function ($query) use ($request) {})
            ->with('category:id,name,slug') //Categories tablosu ile ilişki kuruldu, ürünler için yalnızca ilgili sütunlar çağırıldı.
            ->whereHas('category', function ($query) use ($category, $slug) {
                if (!empty($slug)) {
                    $query->where('slug', $slug);
                }

                return $query;
            });

        $minPrice = $products->min('price');
        $maxPrice = $products->max('price');

        $sizeLists = Product::where('status', '1')->groupBy('size')->pluck('size')->toArray();

        $colors = Product::where('status', '1')->groupBy('color')->pluck('color')->toArray();

        $products = $products->orderBy($order, $sort)->paginate(21);

        return view('frontend.pages.products', compact('products', 'minPrice', 'maxPrice', 'sizeLists', 'colors'));
    }

    public function productDetail($slug)
    {
        $product = Product::whereSlug($slug)->where('status', '1')->firstOrFail();

        $products = Product::where('id', '!=', $product->id) //Mevcut ürünün önerilmemesi için.
            ->where('category_id', $product->category_id) // Aynı kategorideki ürünlerin getirilmesi için, ilişkili ürün için.
            ->where('status', '1')
            ->limit(6)
            ->get(); //Featured Products için.

        return view('frontend.pages.product', compact('product', 'products'));
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
}
