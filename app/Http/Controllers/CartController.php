<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the current user's cart.
     */
    public function view()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()], ['items' => []]);
        $items = collect($cart->items)->map(function ($item) {
            $product = Product::find($item['product_id']);
            return [
                'product' => $product,
                'quantity' => $item['quantity'],
            ];
        })->filter();
        return view('shop.cart', compact('items'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()], ['items' => []]);
        $items = $cart->items ?? [];
        $found = false;
        foreach ($items as &$it) {
            if ($it['product_id'] == $request->product_id) {
                $it['quantity'] += $request->quantity;
                $found = true;
                break;
            }
        }
        if (! $found) {
            $items[] = ['product_id' => $request->product_id, 'quantity' => $request->quantity];
        }
        $cart->items = $items;
        $cart->save();
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang.');
    }

    /**
     * Remove a product from the cart.
     */
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
        $cart = Cart::where('user_id', Auth::id())->first();
        if (! $cart) {
            return redirect()->back();
        }
        $items = $cart->items ?? [];
        $items = array_filter($items, function ($it) use ($request) {
            return $it['product_id'] != $request->product_id;
        });
        $cart->items = array_values($items);
        $cart->save();
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }

    /**
     * Update quantity of a product in the cart.
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);
        $cart = Cart::where('user_id', Auth::id())->first();
        if (! $cart) {
            return redirect()->back();
        }
        $items = $cart->items ?? [];
        foreach ($items as &$it) {
            if ($it['product_id'] == $request->product_id) {
                $it['quantity'] = $request->quantity;
                break;
            }
        }
        $cart->items = $items;
        $cart->save();
        return redirect()->back()->with('success', 'Keranjang diperbarui.');
    }
}

