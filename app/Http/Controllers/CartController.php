<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->with('product');
        $carts_data = $carts->get();
        $cart_item_count = $carts->count();
        $cart_item_total_price = $carts->sum('total_price');

        return view('user.cart', compact('carts_data', 'cart_item_count', 'cart_item_total_price'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:App\Models\Product,id',
            'qty' => 'required|numeric'
        ]);

        $cart_item_old = Cart::where([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id
        ]);

        $qty = $cart_item_old->exists() ? $request->qty + $cart_item_old->first()->qty : $request->qty;

        Cart::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
            ],
            [
                'qty' => $qty,
                'total_price' => Product::whereId($request->product_id)->value('price') * $qty
            ]
        );

        return redirect(route('cart.index'));
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->back();
    }
}
