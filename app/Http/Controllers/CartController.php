<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItem = session('cart', []); // add fonksiyonundaki session carttan alacak...
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

        $request->validate([
            'sizes' => 'required|in:S,M,L,XL',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = session('cart', []); //Sepetteki mevcut ürünleri al, sepette ürün yoksa boş bir dizi döndür.

        if (array_key_exists($productId, $cartItem)) { //$productId, $cartItem dizisinde bir key olarak var mı? Yani, ürün sepette var mı?
            $cartItem[$productId]['quantity'] += $quantity; // zaten sepette olduğu için adedini arttır.
        } else {
            $cartItem[$productId] = [ //Yoksa yeni bir ürün olarak sepete ekle.
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'size' => $size,
            ];
        }

        session(['cart' => $cartItem]); // Oluşturulan $cartItem'ı, cart olarak sessiona ekle. Yani, sepet güncellenir.

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
