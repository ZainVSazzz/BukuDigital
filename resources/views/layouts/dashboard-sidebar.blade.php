<div class="drawer-side z-30 shadow-lg">
    <label for="left-sidebar-drawer" class="drawer-overlay"></label>
    <ul class="menu pt-2 w-80 bg-base-100 min-h-full text-base-content">
        <button class="btn btn-ghost bg-base-300  btn-circle z-50 top-0 right-0 mt-4 mr-2 absolute lg:hidden" onclick="document.getElementById('left-sidebar-drawer').click()">
            <svg class="w-5 h-5 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <li class="mb-2 font-semibold text-xl">
            <a href="{{ route('home') }}" ><img class="mask mask-squircle w-16" src="{{ Vite::asset('resources/img/footer-logo.png') }}" alt="Buku Digital Nusantara Logo"/>BDN</a>
        </li>
        <h2 class="menu-title">Dashboard</h2>
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'font-semibold bg-base-200' : 'font-normal' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg> Dashboard
                @if(request()->routeIs('dashboard'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary " aria-hidden="true"></span>
                @endif
            </a>
        </li>
        @if(auth()->user()->is_admin)
            <li>
                <a href="{{ route('dashboard.user') }}" class="{{ request()->routeIs('dashboard.user') ? 'font-semibold bg-base-200' : 'font-normal' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg> Dashboard Pembaca
                    @if(request()->routeIs('dashboard.user'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary " aria-hidden="true"></span>
                    @endif
                </a>
            </li>
            <h2 class="menu-title">Admin</h2>
            <ul>
                <li>
                    <a href="{{ route('admin.user') }}" class="{{ request()->routeIs('admin.user') ? 'font-semibold bg-base-200' : 'font-normal' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg> Users
                        @if(request()->routeIs('admin.user'))
                            <span class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary " aria-hidden="true"></span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.book') }}" class="{{ request()->routeIs('admin.book*') ? 'font-semibold bg-base-200' : 'font-normal' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg> Books
                        @if(request()->routeIs('admin.book*'))
                            <span class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary " aria-hidden="true"></span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.article') }}" class="{{ request()->routeIs('admin.article*') ? 'font-semibold bg-base-200' : 'font-normal' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg> News
                        @if(request()->routeIs('admin.article*'))
                            <span class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary " aria-hidden="true"></span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.order') }}" class="{{ request()->routeIs('admin.order*') ? 'font-semibold bg-base-200' : 'font-normal' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span>Orders</span>
                        @if($order_waiting_count !== 0)
                            <span class="badge badge-primary">{{ $order_waiting_count }}</span>
                        @endif
                        @if(request()->routeIs('admin.order*'))
                            <span class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary " aria-hidden="true"></span>
                        @endif
                    </a>
                </li>
            </ul>
        @endif

        <!-- Readers Menu -->
        <h2 class="menu-title">Pembaca</h2>
        <ul>
            <li>
                <a href="{{ route('my-book') }}" class="{{ request()->routeIs('my-book') ? 'font-semibold bg-base-200' : 'font-normal' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg> Buku Saya
                    @if(request()->routeIs('my-book'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary " aria-hidden="true"></span>
                    @endif
                </a>
            </li>
            <li>
                <a href="{{ route('transaction') }}" class="{{ request()->routeIs('transaction*') ? 'font-semibold bg-base-200' : 'font-normal' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg> Riwayat Pembelian
                    @if(request()->routeIs('transaction*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-md rounded-br-md bg-primary " aria-hidden="true"></span>
                    @endif
                </a>
            </li>
        </ul>
    </ul>
</div>
