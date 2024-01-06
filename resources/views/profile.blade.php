<x-dashboard-layout page-title="Profile">
    <div class="container mx-auto">
        <div class="flex gap-x-5">
            <div class="w-fit h-fit bg-base-100 px-5 py-1 rounded shadow-lg">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center rounded-full bg-base-200">
                        <img class="rounded-full w-full" src="{{ Vite::asset('resources/img/avatar.webp') }}" alt="profile" />
                    </div>
                    <span class="block my-5">
                        <span class="font-bold">{{ $user->name }}</span> / <span>{{ $user->is_admin ? 'Admin' : 'Pembaca' }}</span>
                    </span>
                </div>
            </div>
            <form class="w-full bg-base-100 px-7 py-5 rounded shadow-lg" method="post">
                @csrf @method('put')
                <h2 class="font-semibold text-lg">Hi, {{ $user->name }}</h2>
                <span class="block text-sm mt-2">Ubah informasi tentang diri Anda di disini.</span>

                @if(session('success'))
                    <div role="alert" class="alert alert-success mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div role="alert" class="alert alert-error mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>Error! Terjadi kesalahan.</span>
                    </div>
                @endif

                <div class="mt-10">
                    <h2 class="font-semibold text-lg">Data Diri</h2>
                    <div class="divider my-1"></div>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Nama</span>
                            </div>
                            <input type="text" name="name" placeholder="Type here" class="input input-bordered w-full max-w-xs @error('name') input-error @enderror" value="{{ old('name') ?? $user->name }}" required />
                            @error('name')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Nomor HP</span>
                            </div>
                            <input type="text" name="phone" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ old('phone') ?? $user->phone }}" {{ $user->is_admin ? '' : 'required' }} />
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Email</span>
                            </div>
                            <input type="email" name="email" placeholder="Type here" class="input input-bordered w-full max-w-xs @error('email') input-error @enderror" value="{{ old('email') ?? $user->email }}" required />
                            @error('email')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Alamat</span>
                            </div>
                            <input type="text" name="address" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ old('address') ?? $user->address }}" {{ $user->is_admin ? '' : 'required' }} />
                        </label>
                    </div>
                </div>
                <div class="mt-10">
                    <h2 class="font-semibold text-lg">Keamanan</h2>
                    <div class="divider my-1"></div>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Password</span>
                            </div>
                            <input type="password" name="password" placeholder="Type here" class="input input-bordered w-full max-w-xs @error('password') input-error @enderror" />
                            @error('password')
                                <div class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Konfirmasi Password</span>
                            </div>
                            <input type="password" name="password_confirmation" placeholder="Type here" class="input input-bordered w-full max-w-xs @error('password') input-error @enderror" />
                        </label>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
