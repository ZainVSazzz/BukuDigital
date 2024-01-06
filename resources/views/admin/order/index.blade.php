<x-dashboard-layout page-title="Order">
    <div class="container mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="text-xl font-semibold inline-block">
                    All Orders
                    <form class="inline-block float-right">
                        <div class="inline-block mr-2">
                            <div class="input-group  relative flex flex-wrap items-stretch w-full">
                                <input type="search" name="invoice" aria-label="Search" placeholder="Cari invoice" class="input input-sm input-bordered w-full max-w-xs" value="{{ request('invoice') }}" required />
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm">Search</button>
                    </form>
                </div>
                <div class="divider mt-2"></div>
                <div class="overflow-x-auto w-full">
                    <table class="table w-full">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Invoice</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($orders) === 0)
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada transaksi</td>
                            </tr>
                        @endif
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <div class="flex flex-col">
                                        <span class="font-bold">{{ $order->user->name }}</span>
                                        <span>{{ $order->user->email }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex flex-col">
                                        <span>{{ $order->invoice }}</span>
                                        <span class="font-bold">{{ rupiah($order->sub_total) }}</span>
                                    </div>
                                </td>
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
                                    <a href="{{ route('admin.order.show', $order->invoice) }}" class="btn btn-sm btn-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
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
