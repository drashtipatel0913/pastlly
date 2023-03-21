<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.navbar',
            [
                'products' => Product::select(['name', 'image', 'details'])
                    ->inRandomOrder()
                    ->take(5)
                    ->get()
            ],
            [
                'categories' => Category::get(['name', 'slug'])
            ]
        );
    }
}
