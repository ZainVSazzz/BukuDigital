<?php

namespace App\Http\Controllers;


use App\Models\Bank;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('details', 'payment')
            ->where('user_id', request()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('transaction.index', compact('orders'));
    }

    public function detail(Order $order): View
    {
        $banks = Bank::all();
        return view('transaction.detail', compact('banks', 'order'));
    }

    public function payment(Order $order, Request $request): RedirectResponse
    {
        DB::beginTransaction();

        $data = [
            'user_id' => $request->user()->id,
            'order_id' => $order->id,
            'bank_id' => $request->input('bank_id'),
            'bank_name' => $request->input('bank_name'),
            'bank_account_name' => $request->input('bank_account_name'),
            'bank_account_number' => $request->input('bank_account_number'),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storePublicly('public/payments');
        }

        Payment::query()->create($data);
        $order->update(['status' => 'WAITING_CONFIRMATION']);

        DB::commit();

        return redirect()
            ->route('transaction')
            ->with('success', 'Konfirmasi pembayaran berhasil! Silahkan menunggu beberapa saat, hubungi CS untuk informasi lebih lanjut.');
    }
}
