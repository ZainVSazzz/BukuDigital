<x-dashboard-layout page-title="Order Detail">
    <div class="container mx-auto">
        @if(session('success'))
            <div class="alert alert-success justify-between mb-3" x-data="{ show: true }" x-show="show">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success') }}</span>
                <button class="w-10" @click="show = !show">x</button>
            </div>
        @endif

        <div class="grid grid-cols-2 gap-x-5">
            <div class="rounded-lg px-5 py-3 shadow-lg bg-base-100">
                <h2 class="text-lg font-bold">Detail Order</h2>
                <ul class="mt-3">
                    <li class="flex justify-between items-center my-2">
                        <span>Invoice</span>
                        <span class="font-bold">{{ $order->invoice }}</span>
                    </li>
                    <li class="flex justify-between items-center my-2">
                        <span>User</span>
                        <span class="">{{ $order->user->name }} ({{ $order->user->email }})</span>
                    </li>
                    <li class="mt-5">
                        <span class="block">Items:</span>
                        <ul class="list-disc">
                            @foreach($order->details as $detail)
                                <li class=" flex justify-between items-start my-2 first:mt-0">
                                    <span class="text-wrap max-w-xs">{{ $detail->book->title }}</span>
                                    <span class="text-nowrap font-bold">{{ rupiah($detail->book->price) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="flex justify-between items-center mt-5 mb-2">
                        <span>Sub Total</span>
                        <span class="font-bold">{{ rupiah($order->sub_total) }}</span>
                    </li>
                    <li class="flex justify-between items-center my-2">
                        <span>Kode Unik</span>
                        <span class="font-bold">{{ $order->unique_code }}</span>
                    </li>
                    <li class="flex justify-between items-center my-2">
                        <span>Total Pembayaran</span>
                        <span class="font-bold">{{ rupiah($order->total_price) }}</span>
                    </li>
                    <li class="flex justify-between items-center my-2">
                        <span>Status</span>
                        <span class="">
                            @if($order->status === 'PENDING')
                                <span class="font-bold text-warning">Pending</span>
                            @elseif($order->status === 'SUCCESS')
                                <span class="font-bold text-success">Sukses</span>
                            @else
                                <span class="font-bold text-info">Menunggu Konfirmasi</span>
                            @endif
                        </span>
                    </li>
                </ul>
            </div>
            <div class="rounded-lg px-5 py-3 shadow-lg bg-base-100">
                <h2 class="text-lg font-bold">Detail Pembayaran</h2>
                @if($order->payment)
                    <ul class="list-none">
                        <li class="flex justify-between items-center my-2">
                            <span>Bank Tujuan</span>
                            <span class="font-bold">{{ $order->payment->bank->name }}</span>
                        </li>
                        <li class="flex justify-between items-center my-2">
                            <span>Bank Pengirim</span>
                            <span class="font-bold">{{ $order->payment->bank_name }}</span>
                        </li>
                        <li class="flex justify-between items-center my-2">
                            <span>Nama Rekening Pengirim</span>
                            <span class="font-bold">{{ $order->payment->bank_account_name }}</span>
                        </li>
                        <li class="flex justify-between items-center my-2">
                            <span>Nomor Rekening Pengirim</span>
                            <span class="font-bold">{{ $order->payment->bank_account_number }}</span>
                        </li>
                        <li class="flex justify-between items-center my-2">
                            <span>Bukti Transfer</span>
                            <button class="text-error underline" onclick="my_modal_1.showModal()">Lihat</button>
                        </li>
                    </ul>
                    @if($order->status === 'WAITING_CONFIRMATION')
                        <button class="btn btn-sm btn-primary" onclick="my_modal_2.showModal()">Konfirmasi</button>
                    @endif
                @else
                    <span class="font-light block my-3">Menunggu Pembayaran</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Bukti Transfer -->
    @if($order->payment)
        <dialog id="my_modal_1" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <div class="w-full py-5">
                    <img class="w-full" src="{{ Storage::url($order->payment->image) }}" alt="{{ $order->invoice }}">
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    @endif

    <!-- Modal Konfirmasi Pembayaran -->
    @if($order->payment and $order->status === 'WAITING_CONFIRMATION')
        <dialog id="my_modal_2" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <form class="w-full py-5" action="{{ route('admin.order.confirm', $order->invoice) }}" method="post">
                    @csrf
                    <h2 class="text-center font-bold">Apakah anda yakin ingin mengonfirmasi order ini?</h2>
                    <div class="flex justify-center items-center mt-3 gap-x-3">
                        <form method="dialog">
                            <button class="btn">Batal</button>
                        </form>
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    @endif
</x-dashboard-layout>
