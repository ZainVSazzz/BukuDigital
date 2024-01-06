<x-app-layout title="Login">
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 py-10">
        <div class="w-full sm:max-w-4xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-3xl">
            <!-- Session Status -->
            <h2 class="text-3xl text-center font-bold mb-8">Login</h2>
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="grid grid-cols-2 gap-x-4" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex flex-col px-10">
                    <div class="form-control w-full mb-4">
                        <div class="flex items-center gap-x-2">
                            <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/></svg>
                            <input type="email" name="email" placeholder="Email" aria-label="Email" class="input input-bordered h-10 rounded-none w-full max-w-xs @error('email') input-error @enderror" value="{{ @old('email') }}" required />
                        </div>
                    </div>
                    <div class="form-control w-full mb-4">
                        <div class="flex items-center gap-x-2">
                            <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/></svg>
                            <input type="password" name="password" placeholder="Password" aria-label="Email" class="input input-bordered h-10 rounded-none w-full max-w-xs" required />
                        </div>
                        @error('email')
                            <div class="label ml-8"><span class="text-sm text-error">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="flex flex-col items-center">
                        <button class="btn btn-sm h-10 bg-blue-300 px-5 text-white hover:bg-blue-600 mb-5">Submit</button>
                        <span class="block mb-3">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600">Daftar</a></span>
                        <a href="#" class="text-blue-600 mb-5">Lupa password</a>
                    </div>
                </div>
                <div>
                    <img class="w-full" src="{{ Vite::asset('resources/img/auth.webp') }}" alt="Buku Digital Nusantara">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
