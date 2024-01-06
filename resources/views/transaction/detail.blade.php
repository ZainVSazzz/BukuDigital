<x-dashboard-layout page-title="Konfirmasi Pembayaran">
    <div class="container mx-auto py-10">
        <div class="flex gap-5">
            <div class="max-w-[250px] w-full">
                <div class="rounded-lg p-5 bg-white">
                    <h2 class="font-bold text-center mb-3">Order Summary</h2>
                    <div class="w-full">
                        <h3 class="text-sm">Nomor Invoice</h3>
                        <span class="font-bold text-lg">{{ $order->invoice }}</span>

                        <h3 class="text-sm mt-5">Total harga</h3>
                        <span class="font-bold text-lg">{{ rupiah($order->sub_total) }}</span>

                        <h3 class="text-sm mt-5">Kode unik</h3>
                        <span class="font-bold text-lg">{{ $order->unique_code }}</span>

                        <h3 class="text-sm mt-5">Jumlah yang harus dibayar</h3>
                        <span class="font-bold text-xl text-error">{{ rupiah($order->total_price) }}</span>
                    </div>
                </div>
            </div>
            <form class="w-full" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-5 bg-white rounded-lg">
                    <h2>Lakukan pembayaran sejumlah {{ rupiah($order->total_price) }} melalui bank berikut:</h2>
                    <div class="grid grid-cols-2 gap-5 mt-5">
                        @foreach($banks as $bank)
                            <div class="flex gap-x-3">
                                <img class="w-24" src="{{ asset($bank->image) }}" alt="{{ $bank->name }}">
                                <div class="flex flex-col justify-center">
                                    <span class="text-xs">{{ $bank->account_name }}</span>
                                    <span class="text-sm font-semibold">{{ $bank->account_number }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <h2 class="mt-10">Konfirmasi Pembayaran</h2>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="form-control w-full max-w-xs">
                            <div class="label"><span class="label-text">Bank Tujuan</span></div>
                            <select class="select select-bordered" name="bank_id" required>
                                <option disabled selected value="">Pilih Bank</option>
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label"><span class="label-text">Nama Bank Pengirim</span></div>
                            <input type="text" name="bank_name" placeholder="Type here" class="input input-bordered w-full max-w-xs" required />
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label"><span class="label-text">Nama Pengirim</span></div>
                            <input type="text" name="bank_account_name" placeholder="Type here" class="input input-bordered w-full max-w-xs" required />
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label"><span class="label-text">Nomor Rekening Pengirim</span></div>
                            <input type="number" name="bank_account_number" placeholder="Type here" class="input input-bordered w-full max-w-xs" required />
                        </label>
                        <label class="col-span-2 form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Bukti Transfer</span>
                            </div>
                            <input type="file" name="image" accept="image/*,application/pdf" class="file-input file-input-bordered w-full max-w-xs" />
                        </label>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
