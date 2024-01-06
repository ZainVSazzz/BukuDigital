<x-app-layout title="Checkout">
    <div class="container mx-auto">
        <form class="flex gap-x-3 my-10" method="post">
            @csrf
            <div class="w-full rounded-lg border shadow-lg px-5 py-3">
                <h2 class="text-xl font-bold">Pilih Metode Pembayaran</h2>
                <h3 class="text-lg font-bold mt-5">Transfer Manual</h3>
                <div class="grid grid-cols-3 gap-10">
                    @foreach($banks as $bank)
                        <div class="form-control">
                            <label class="label justify-start gap-x-3 cursor-pointer">
                                <input type="radio" name="bank" class="radio checked:bg-red-500" value="{{ $bank->id }}" required />
                                <span class="label-text">
                                    <img class="w-20" src="{{ asset($bank->image) }}" alt="{{ $bank->name }}">
                                </span>
                            </label>
                        </div>
                    @endforeach
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
                    <button type="submit" class="btn btn-sm btn-accent text-white" @if(count($cart) === 0) disabled @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>
                        Bayar
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
