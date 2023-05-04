<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItems = collect($cart)->map(function ($item) {
            $product = Product::findOrFail($item['product_id']);
            $item['product'] = $product;
            return $item;
        });

        $totalAmount = session()->get('totalAmount', 0);

        return view('Cart/cartIndex', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart', []);
        $cartItem = collect($cart)->firstWhere('product_id', $product->id);

        if ($cartItem) {
            $cartItem['quantity'] += $request->quantity;
        } else {
            $cartItem = [
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price
            ];
            $cart[] = $cartItem;
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $cart = session()->get('cart', []);
        // $cartItem = collect($cart)->firstWhere('product_id', $id);

        // if ($cartItem) {
        //     $cartItem['quantity'] = $request->quantity;
        // }

        // $totalAmount = collect($cart)->sum(function ($item) {
        //     return $item['quantity'] * $item['price'];
        // });

        // session()->put('cart', $cart);
        // session()->put('totalAmount', $totalAmount);

        // return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $cart = session()->get('cart', []);
        $index = collect($cart)->search(function ($cartItem) use ($id) {
            return $cartItem['product_id'] == $id;
        });

        if ($index !== false) {
            array_splice($cart, $index, 1);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');

        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index');
    }
}
