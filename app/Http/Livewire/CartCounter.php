<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    public function render()
    {
        $cart = session('cart');
        $totalCartItems = is_array($cart) ? count($cart) : 0;
        return view(
            'livewire.cart-counter',
            compact('totalCartItems')
        );
    }
}
