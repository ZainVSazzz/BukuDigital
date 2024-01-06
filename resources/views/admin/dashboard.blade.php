<x-dashboard-layout page-title="Dashboard">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 my-10">
        <div class="flex gap-x-3 w-full shadow rounded-md p-5 bg-base-100">
            <div class="flex justify-center items-center w-16 h-16 rounded-md bg-primary text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <div class="flex flex-col justify-center">
                <h2 class="text-md font-light mb-1">Total User</h2>
                <h3 class="text-xl font-bold">{{ $usersCount }}</h3>
            </div>
        </div>
        <div class="flex gap-x-3 w-full shadow rounded-md p-5 bg-base-100">
            <div class="flex justify-center items-center w-16 h-16 rounded-md bg-error text-white">
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                </svg>
            </div>
            <div class="flex flex-col justify-center">
                <h2 class="text-md font-light mb-1">Total Buku</h2>
                <h3 class="text-xl font-bold">{{ $booksCount }}</h3>
            </div>
        </div>
        <div class="flex gap-x-3 w-full shadow rounded-md p-5 bg-base-100">
            <div class="flex justify-center items-center w-16 h-16 rounded-md bg-accent text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </div>
            <div class="flex flex-col justify-center">
                <h2 class="text-md font-light mb-1">Total Order</h2>
                <h3 class="text-xl font-bold">{{ $ordersCount }}</h3>
            </div>
        </div>
        <div class="flex gap-x-3 w-full shadow rounded-md p-5 bg-base-100">
            <div class="flex justify-center items-center w-16 h-16 rounded-md bg-secondary text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
            </div>
            <div class="flex flex-col justify-center">
                <h2 class="text-md font-light mb-1">Total Artikel</h2>
                <h3 class="text-xl font-bold">{{ $articlesCount }}</h3>
            </div>
        </div>
    </div>
</x-dashboard-layout>
