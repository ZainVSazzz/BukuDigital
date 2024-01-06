<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserBook;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $orders = Order::with('details', 'details.book', 'user')
            ->when($invoice = $request->input('invoice') and !empty($invoice), function ($query) use ($invoice) {
                return $query->where('invoice', $invoice);
            })
            ->orderByRaw("`status` = 'WAITING_CONFIRMATION' DESC")
            ->orderByDesc('id')
            ->paginate(15);

        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        return view('admin.order.detail', compact('order'));
    }

    public function confirmPayment(Order $order): RedirectResponse
    {
        DB::beginTransaction();
        foreach ($order->details as $detail) {
            UserBook::query()->create([
                'user_id' => $order->user_id,
                'book_id' => $detail->book_id,
            ]);
        }

        $order->update(['status' => 'success']);
        $order->payment()->update(['status' => 'success']);
        DB::commit();

        return redirect()
            ->route('admin.order.show', $order->invoice)
            ->with('success', 'Pembayaran telah dikonfirmasi!');
    }
}
