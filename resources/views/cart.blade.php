<x-app-layout title="Keranjang">
    <div class="container mx-auto">
        <div class="flex gap-x-3 my-10">
            <div class="w-full rounded-lg border shadow-lg px-5">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($cart) === 0)
                            <td colspan="5" class="text-center">Tidak ada buku di dalam keranjang.</td>
                        @endif
                        @foreach($cart as $cartBook)
                            <tr>
                                <td><img class="w-20" src="{{ $cartBook->book->image_url }}" alt="{{ $cartBook->book->title }}"></td>
                                <td>{{ $cartBook->book->title }}</td>
                                <td>{{ $cartBook->book->category->name }}</td>
                                <td>{{ rupiah($cartBook->book->price) }}</td>
                                <td>
                                    <div class="flex justify-center items-center rounded-md w-9 h-9 bg-accent text-white">
                                        <a href="{{ route('cart.remove', $cartBook->book->slug) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="max-w-xs w-full rounded-lg h-fit border shadow-lg px-5 pt-3 pb-8">
                <h2 class="text-center text-xl font-bold">Ringkasan Pesanan</h2>
                <div class="flex justify-between items-center mt-3 border-b">
                    <span class="text-md">Total Item</span>
                    <span class="text-md font-bold">{{ count($cart) }}</span>
                </div>
                <div class="flex justify-between items-center mt-3 border-b">
                    <span class="text-md">Total</span>
                    <span class="text-md font-bold">{{ rupiah($total) }}</span>
                </div>
                <div class="flex flex-col items-center gap-y-2 mt-5">
                    <a href="{{ route('checkout') }}" class="btn btn-sm btn-accent text-white" @if(count($cart) === 0) disabled @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>
                        Checkout
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-accent text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                        Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
