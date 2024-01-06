<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function index(): View
    {
        $total = 0;
        $cart = Cart::with('book', 'book.category')
            ->where('user_id', request()->user()->id)
            ->get()
            ->all();

        foreach ($cart as $cBook) {
            $total += $cBook->book->price;
        }

        return view('cart', compact('cart', 'total'));
    }

    public function add(Book $book): RedirectResponse
    {
        $cBook = Cart::query()
            ->where('user_id', request()->user()->id)
            ->where('book_id', $book->id)
            ->get();

        if ($cBook->count() === 0) {
            Cart::query()->insert([
                'user_id' => request()->user()->id,
                'book_id' => $book->id,
            ]);
        }

        return redirect()->route('cart');
    }

    public function remove(Book $book): RedirectResponse
    {
        Cart::query()
            ->where('user_id', request()->user()->id)
            ->where('book_id', $book->id)
            ->delete();

        return redirect()->route('cart');
    }
}
