<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController
{
    public function index(): View|RedirectResponse
    {
        $total = 0;

        $banks = Bank::all();
        $cart = Cart::query()
            ->where('user_id', request()->user()->id)
            ->get()
            ->all();

        if (count($cart) === 0) {
            return redirect()->route('cart');
        }

        foreach ($cart as $cBook) {
            $total += $cBook->book->price;
        }

        return view('checkout', compact('banks', 'cart', 'total'));
    }

    public function checkout(Request $request): RedirectResponse
    {
        $subTotal = 0;
        $uniqueCode = rand(100, 999);

        $cart = Cart::with('book')
            ->where('user_id', request()->user()->id)
            ->get()
            ->all();

        if (count($cart) === 0) {
            return redirect()->route('cart');
        }

        foreach ($cart as $cBook) {
            $subTotal += $cBook->book->price;
        }


        DB::beginTransaction();
        // Insert Order
        $order = Order::query()->create([
            'invoice' => 'BDN' . '-' . date('ymd') . strtoupper(Str::random(8)),
            'user_id' => $request->user()->id,
            'unique_code' => $uniqueCode,
            'sub_total' => $subTotal,
            'total_price' => $subTotal + $uniqueCode,
        ]);

        // Insert Order Detail
        foreach ($cart as $cBook) {
            $order->details()->create([
                'book_id' => $cBook->book->id,
                'detail' => $cBook->book->title . ' ' . '(' . rupiah($cBook->book->price) . ')',
            ]);
        }

        // Delete Cart
        Cart::query()->where('user_id', request()->user()->id)->delete();
        DB::commit();

        return redirect()->route('transaction.detail', $order->invoice);
    }
}
