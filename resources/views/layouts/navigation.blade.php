<nav x-data="{ open: false }" class="shadow-lg bg-[#f8f9fa] border-b border-gray-100 sticky top-0 z-10">
    <!-- Primary Navigation Menu -->
    <div class="w-full px-4 sm:px-6 lg:px-6">
        <div class="flex justify-between items-center h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img class="h-12" src="{{ Vite::asset('resources/img/logo.png') }}" alt="Buku Digital Nusantara">
                    </a>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-5 py-3 sm:-my-px sm:flex">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Beranda</x-nav-link>
                <x-nav-link :href="route('book')" :active="request()->routeIs('book*')">Produk</x-nav-link>
                <x-nav-link :href="route('article')" :active="request()->routeIs('article*')">Berita</x-nav-link>
                <x-nav-link href="#tentang-kami">Kontak</x-nav-link>
                <x-nav-link href="#kontak-kami">Tentang Kami</x-nav-link>
            </div>

            <!-- Settings Dropdown -->
            @auth
                <div class="flex items-center gap-x-3">
                    @if($cart_count === 0)
                        <a href="{{ route('cart') }}" class="z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M8 18C6.9 18 6.01 18.9 6.01 20C6.01 21.1 6.9 22 8 22C9.1 22 10 21.1 10 20C10 18.9 9.1 18 8 18ZM2 2V4H4L7.6 11.59L6.25 14.04C6.09 14.32 6 14.65 6 15C6 16.1 6.9 17 8 17H20V15H8.42C8.28 15 8.17 14.89 8.17 14.75L8.2 14.63L9.1 13H16.55C17.3 13 17.96 12.59 18.3 11.97L21.88 5.48C21.96 5.34 22 5.17 22 5C22 4.45 21.55 4 21 4H6.21L5.27 2H2ZM18 18C16.9 18 16.01 18.9 16.01 20C16.01 21.1 16.9 22 18 22C19.1 22 20 21.1 20 20C20 18.9 19.1 18 18 18Z" fill="#494949"/>
                            </svg>
                        </a>
                    @else
                        <div class="indicator">
                            <span class="indicator-item badge badge-sm badge-error">{{ $cart_count }}</span>
                            <a href="{{ route('cart') }}" class="z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M8 18C6.9 18 6.01 18.9 6.01 20C6.01 21.1 6.9 22 8 22C9.1 22 10 21.1 10 20C10 18.9 9.1 18 8 18ZM2 2V4H4L7.6 11.59L6.25 14.04C6.09 14.32 6 14.65 6 15C6 16.1 6.9 17 8 17H20V15H8.42C8.28 15 8.17 14.89 8.17 14.75L8.2 14.63L9.1 13H16.55C17.3 13 17.96 12.59 18.3 11.97L21.88 5.48C21.96 5.34 22 5.17 22 5C22 4.45 21.55 4 21 4H6.21L5.27 2H2ZM18 18C16.9 18 16.01 18.9 16.01 20C16.01 21.1 16.9 22 18 22C19.1 22 20 21.1 20 20C20 18.9 19.1 18 18 18Z" fill="#494949"/>
                                </svg>
                            </a>
                        </div>
                    @endif

                    <div class="dropdown dropdown-end mx-4">
                        <label tabindex="0" class="flex items-center flex-nowrap cursor-pointer w-full avatar">
                            <div class="w-10 rounded-full bg-base-200">
                                <img class="" src="{{ Vite::asset('resources/img/avatar.webp') }}" alt="profile" />
                            </div>
                        </label>
                        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-48">
                            <span class="block text-center px-4 my-2 text-sm font-bold">{{ Auth::user()->is_admin ? 'ADMIN' : 'PEMBACA' }}</span>
                            <div class="divider mt-0 mb-0"></div>
                            <li class="justify-between">
                                <a href="{{ route('dashboard') }}" class="flex items-center gap-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                    </svg> Dashboard
                                </a>
                            </li>
                            <li class="justify-between">
                                <a href="{{ route('my-book') }}" class="flex items-center gap-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg> Buku Saya
                                </a>
                            </li>
                            <li class="justify-between">
                                <a href="{{ route('transaction') }}" class="flex items-center gap-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg> Riwayat Transaksi
                                </a>
                            </li>
                            <li class="justify-between">
                                <a href="{{ route('profile') }}" class="flex items-center gap-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg> Profile
                                </a>
                            </li>
                            <div class="divider mt-0 mb-0"></div>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="flex items-center gap-x-2 text-error" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                        </svg>
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center space-x-3">
                    <a href="{{ route('register') }}" class="text-xl font-bold text-black hover:text-cyan-500">Daftar</a>
                    <a href="{{ route('login') }}" class="text-xl font-bold text-black hover:text-cyan-500">Masuk</a>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">Beranda</x-responsive-nav-link>
            <x-responsive-nav-link href="#">Produk</x-responsive-nav-link>
            <x-responsive-nav-link href="#">Berita</x-responsive-nav-link>
            <x-responsive-nav-link href="#">Kontak</x-responsive-nav-link>
            <x-responsive-nav-link href="#">Tentang Kami</x-responsive-nav-link>
        </div>

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">John Doe</div>
                    <div class="font-medium text-sm text-gray-500">John Doe</div>
                </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
            </div>
        @endauth
    </div>
</nav>
