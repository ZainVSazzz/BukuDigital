<?php

namespace App\View\Composers;

use App\Models\Cart;
use Illuminate\View\View;

class CartComposer
{
    private function getCartCount(): int
    {
        if (!request()->user()) {
            return 0;
        }

        return Cart::query()
            ->where('user_id', request()->user()->id)
            ->get()
            ->count();
    }

    public function compose(View $view): void
    {
        $view->with('cart_count', $this->getCartCount());
    }
}
