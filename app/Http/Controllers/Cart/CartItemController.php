<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $productId = $request->product_id;
        $quantity = $request->quantity;

        if (auth()->check()) {
            // If the user is authenticated, store the cart item in the database
            $cart = auth()->user()->cart;
            $product = Product::findOrFail($productId);
            $cartItem = $cart->cartItems()->where('product_id', $product->id)->first();
            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                $cartItem = new CartItem([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price
                ]);
                $cart->cartItems()->save($cartItem);
            }
        } else {
            // If the user is not authenticated, store the cart item in the session
            $cartItems = session()->get('cart.items', []);
            $key = array_search($productId, array_column($cartItems, 'product_id'));
            if ($key !== false) {
                $cartItems[$key]['quantity'] += $quantity;
            } else {
                $cartItems[] = [
                    'product_id' => $productId,
                    'quantity' => $quantity
                ];
            }
            session()->put('cart.items', $cartItems);
        }

        return redirect()->route('cart.index', $cartItems);

        // $cart = auth()->user()->cart;

        // $product = Product::findOrFail($request->product_id);

        // $cartItem = $cart->cartItems()->where('product_id', $product->id)->first();

        // if ($cartItem) {
        //     $cartItem->quantity += $request->quantity;
        //     $cartItem->save();
        // } else {
        //     $cartItem = new CartItem([
        //         'product_id' => $product->id,
        //         'quantity' => $request->quantity,
        //         'price' => $product->price
        //     ]);
        //     $cart->cartItems()->save($cartItem);
        // }

        // return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItem $cartItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        if (auth()->check()) {
            // If the user is authenticated, delete the cart item from the database
            $cartItem = CartItem::findOrFail($id);
            $cartItem->delete();
        } else {
            // If the user is not authenticated, delete the cart item from the session
            $cartItems = session()->get('cart.items', []);
            unset($cartItems[$id]);
            session()->put('cart.items', $cartItems);
        }

        return redirect()->route('cart.index');

        // $cartItem = CartItem::findOrFail($id);
        // $cartItem->delete();

        // return redirect()->route('cart.index');
    }
}
