<x-dashboard-layout page-title="Transaksi Buku">
    <div class="container mx-auto">
        <div class="card p-6 bg-base-100 shadow-xl mt-2">
            <div class="text-md inline-block">Transaksi Buku</div>
            <div class="divider mt-2"></div>
            <div class='h-full w-full pb-6 bg-base-100'>
                @if(session('success'))
                    <div role="alert" class="alert alert-success my-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                <div class="overflow-x-auto w-full">
                    <table class="table w-full">
                        <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Invoice</th>
                            <th>Buku</th>
                            <th>Sub Total</th>
                            <th>Kode Unik</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($orders) === 0)
                            <td colspan="8" class="text-center">Anda belum memiliki transaksi pembelian buku.</td>
                        @endif
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->created_at->format('d-m-Y h:i') }}</td>
                                <td>{{ $order->invoice }}</td>
                                <td>
                                    <ul>
                                        @foreach($order->details as $detail)
                                            <li>{{ $detail->detail }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ rupiah($order->sub_total) }}</td>
                                <td>{{ $order->unique_code }}</td>
                                <td>{{ rupiah($order->total_price) }}</td>
                                <td>
                                    @php
                                    $textColors = [
                                        'PENDING' => 'text-warning',
                                        'WAITING_CONFIRMATION' => 'text-info',
                                        'SUCCESS' => 'text-success'];

                                    $textInfo = [
                                        'PENDING' => 'Pending',
                                        'WAITING_CONFIRMATION' => 'Menunggu Konfirmasi',
                                        'SUCCESS' => 'Sukses'];
                                    @endphp
                                    <span class="{{ $textColors[$order->status] }}">{{ $textInfo[$order->status] }}</span>
                                </td>
                                <td>
                                    <a href="{{ $order->status === 'SUCCESS' ? '#' : route('transaction.detail', $order->invoice) }}" class="btn btn-sm btn-primary text-white" {{ $order->status === 'SUCCESS' ? 'disabled' : '' }}>Bayar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {{ $orders->links('components.admin-pagination') }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
