<x-app-layout title="Home">
    <div id="hero" class="flex justify-center items-center w-full">
        <div class="w-fit py-24">
            <h1 class="uppercase text-center text-4xl font-bold text-black"><span class="bg-white">Buku</span> <br> <span class="bg-white">Digital Nusantara</span></h1>
            <h2 class="uppercase text-center text-lg font-bold mt-3 px-8 rounded-full text-white bg-gray-500">Literasi dan Informasi Dalam Genggaman</h2>
        </div>
    </div>
    <div class="w-full max-w-3xl mx-auto -mt-14 rounded-lg border-4 border-gray-500 bg-white">
        <h3 class="text-center text-2xl font-bold text- my-2">Temukan buku sesuai minat dan kebutuhan kamu !</h3>
        <form action="{{ route('book') }}" class="flex space-x-5 mx-3 my-5">
            <select name="category" class="select select-bordered w-full max-w-40 bg-[#fff3cd]" aria-label="Kategori">
                <option disabled selected>Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <select name="price" class="select select-bordered w-full max-w-40 bg-[#fff3cd]" aria-label="Harga">
                <option disabled selected>Harga</option>
                <option value="lte_50000"><50.000</option>
                <option value="lte_100000"><100.000</option>
                <option value="gte_100000">>100.000</option>
            </select>
            <div class="flex items-center w-full">
                <input type="text" name="search" placeholder="Search..." class="input input-bordered w-full rounded-r-none bg-[#fff3cd] placeholder-inherit" aria-label="Search" required />
                <button class="btn btn-outline btn-info rounded-l-none">Search</button>
            </div>
        </form>
    </div>
    <div class="mt-10">
        <h2 class="text-center text-3xl font-bold">Produk Kami</h2>
        <h3 class="text-center text-xl font-bold">Kami menjual buku-buku berkualitas dan terpercaya !</h3>
    </div>
    <div class="flex flex-col items-center container mx-auto mt-3" x-data="">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
            @foreach($latestBooks as $book)
                <a href="{{ route('book.detail', $book->slug) }}" class="card card-compact bg-base-100 shadow-xl">
                    <figure class="h-[300px]">
                        <img class="h-full" src="{{ $book->image_url }}" alt="{{ $book->title }}" />
                    </figure>
                    <div class="card-body">
                        <div class="tooltip tooltip-bottom before:text-left" data-tip="{{ $book->title }}">
                            <h2 class="font-bold text-lg text-ellipsis whitespace-nowrap overflow-hidden">{{ $book->title }}</h2>
                        </div>
                        <span class="block text-center text-rose-950">{{ $book->category->name }}</span>
                        <span class="block text-center text-rose-700">{{ rupiah($book->price) }}</span>
                    </div>
                </a>
            @endforeach
        </div>

        <a href="{{ route('book') }}" class="mt-6 btn btn-warning">Lihat Produk Lainya</a>
    </div>

    <div class="my-12"></div>
</x-app-layout>
