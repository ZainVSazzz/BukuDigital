<x-app-layout title="Register">
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 py-10">
        <div class="w-full sm:max-w-4xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-3xl">
            <!-- Session Status -->
            <h2 class="text-3xl text-center font-bold mb-8">Register</h2>
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="grid grid-cols-2 gap-x-2" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="flex flex-col px-10">
                    <div class="form-control w-full mb-4">
                        <div class="flex items-center gap-x-2">
                            <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>
                            <input type="text" name="name" placeholder="Nama Lengkap" aria-label="Nama Lengkap" class="input input-bordered h-10 rounded-none w-full max-w-xs @error('name') input-error @enderror" value="{{ old('name') }}" required />
                        </div>
                        @error('name')
                            <div class="label ml-8"><span class="text-sm text-error">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="form-control w-full mb-4">
                        <div class="flex items-center gap-x-2">
                            <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/></svg>
                            <input type="email" name="email" placeholder="Email" aria-label="Email" class="input input-bordered h-10 rounded-none w-full max-w-xs @error('email') input-error @enderror" value="{{ old('email') }}" required />
                        </div>
                        @error('email')
                            <div class="label ml-8"><span class="text-sm text-error">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="form-control w-full mb-4">
                        <div class="flex items-center gap-x-2">
                            <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg>
                            <input type="number" name="phone" placeholder="Nomor HP" aria-label="Nomor HP" class="input input-bordered h-10 rounded-none w-full max-w-xs @error('phone') input-error @enderror" value="{{ old('phone') }}" required />
                        </div>
                        @error('phone')
                            <div class="label ml-8"><span class="text-sm text-error">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="form-control w-full mb-4">
                        <div class="flex items-center gap-x-2">
                            <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            <input type="text" name="address" placeholder="Alamat" aria-label="Alamat" class="input input-bordered h-10 rounded-none w-full max-w-xs @error('address') input-error @enderror" value="{{ old('address') }}" required />
                        </div>
                        @error('address')
                            <div class="label ml-8"><span class="text-sm text-error">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="form-control w-full mb-2">
                        <div class="flex items-center gap-x-2">
                            <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/></svg>
                            <input type="password" name="password" placeholder="Password" aria-label="Email" class="input input-bordered h-10 rounded-none w-full max-w-xs @error('password') input-error @enderror" required />
                        </div>
                    </div>
                    <div class="form-control w-full mb-2">
                        <div class="flex items-center gap-x-2">
                            <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/></svg>
                            <input type="password" name="password_confirmation" placeholder="Password Confirmation" aria-label="Email" class="input input-bordered h-10 rounded-none w-full max-w-xs @error('password') input-error @enderror" required />
                        </div>
                        @error('password')
                            <div class="label ml-8"><span class="text-sm text-error">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="flex flex-col items-center">
                        <label class="label cursor-pointer mb-2">
                            <input type="checkbox" class="checkbox checkbox-xs" required />
                            <a href="{{ route('privasi') }}" class="ml-2 text-blue-600">Persyaratan layanan</a>
                        </label>
                        <button class="btn btn-sm h-10 bg-blue-300 px-5 text-white hover:bg-blue-600 mb-5">Submit</button>
                        <span class="block mb-3">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600">Login</a></span>
                    </div>
                </div>
                <div class="flex justify-center items-start">
                    <img class="w-full mt-12" src="{{ Vite::asset('resources/img/auth.webp') }}" alt="Buku Digital Nusantara">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
