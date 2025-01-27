<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItem = session('cart', []);
        $totalPrice = 0;

        foreach ($cartItem as $cart) {
            $totalPrice += $cart['price'] * $cart['quantity'];
        }

        return view('frontend.pages.cart', compact('cartItem', 'totalPrice'));
    }

    public function add(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $size = $request->sizes;

        $product = Product::find($productId);
        if (!$product) {
            return back()->withError('Product Not Found!');
        }

        $cartItem = session('cart', []);

        if (array_key_exists($productId, $cartItem)) {
            $cartItem[$productId]['quantity'] += $quantity;
        } else {
            $cartItem[$productId] = [
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'size' => $size,
            ];
        }

        session(['cart' => $cartItem]);

        return back()->with('success', 'Product added to cart');
    }

    public function remove(Request $request)
    {
        $productId = $request->product_id;
        $cartItem = session('cart', []);

        if (array_key_exists($productId, $cartItem)) {
            unset($cartItem[$productId]);
        }

        session(['cart' => $cartItem]);

        return back()->with('success', 'Item successfully deleted from cart.');
    }
}
