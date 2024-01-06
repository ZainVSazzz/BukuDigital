<x-app-layout title="{{ $book->title }}">
    <div class="container max-w-6xl mx-auto my-10">
        <div class="flex gap-x-3">
            <div class="w-full lg:w-1/4">
                <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="w-full">
                <div class="my-8"></div>
                <div class="divider my-2"></div>
                <a href="#" target="_blank" class="flex items-center gap-x-2 hover:text-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="25" viewBox="0 0 33 26" fill="none">
                        <path id="Vector" d="M24.5 15.1132C25.673 15.1132 26.9203 15.2319 28.2121 15.4695V17.6968C27.2915 17.4592 26.0442 17.3404 24.5 17.3404C21.6788 17.3404 19.4664 17.8304 17.8182 18.8104V16.301C19.5555 15.5141 21.7827 15.1132 24.5 15.1132ZM17.8182 12.3365C19.7336 11.5495 21.9609 11.1635 24.5 11.1635C25.673 11.1635 26.9203 11.2674 28.2121 11.505V13.7322C27.2915 13.4947 26.0442 13.3759 24.5 13.3759C21.6788 13.3759 19.4664 13.8807 17.8182 14.8459M24.5 9.42618C21.6788 9.42618 19.4664 9.90133 17.8182 10.911V8.44618C19.6445 7.61467 21.8718 7.19891 24.5 7.19891C25.673 7.19891 26.9203 7.3177 28.2121 7.54042V9.84194C27.1133 9.55982 25.8512 9.42618 24.5 9.42618ZM29.697 21.305V4.22921C28.1527 3.73921 26.4155 3.48679 24.5 3.48679C21.4561 3.48679 18.7388 4.22921 16.3333 5.71406V22.7898C18.7388 21.305 21.4561 20.5625 24.5 20.5625C26.267 20.5625 28.0042 20.8001 29.697 21.305ZM24.5 0.51709C27.9894 0.51709 30.7215 1.25951 32.6667 2.74436V24.3638C32.6667 24.5419 32.5924 24.7201 32.4291 24.8835C32.2658 25.0171 32.0876 25.1359 31.9242 25.1359C31.7609 25.1359 31.6421 25.1062 31.553 25.0616C29.6524 24.0371 27.2915 23.5322 24.5 23.5322C21.4561 23.5322 18.7388 24.2747 16.3333 25.7595C14.3436 24.2747 11.6264 23.5322 8.16667 23.5322C5.70182 23.5322 3.34091 24.0668 1.11364 25.121C1.06909 25.1359 1.0097 25.1359 0.935455 25.1656C0.876061 25.1804 0.816667 25.1953 0.742424 25.1953C0.579091 25.1953 0.400909 25.1359 0.237576 25.0171C0.16391 24.9518 0.104716 24.8719 0.0637996 24.7824C0.0228835 24.6929 0.00115124 24.5958 0 24.4974V2.74436C1.9897 1.25951 4.72182 0.51709 8.16667 0.51709C11.6264 0.51709 14.3436 1.25951 16.3333 2.74436C18.323 1.25951 21.0403 0.51709 24.5 0.51709Z" fill="#494949"/>
                    </svg>
                    <span class="text-xl">Preview Buku</span>
                </a>
                <div class="divider my-2"></div>
            </div>
            <div class="w-full lg:w-3/6 ml-2">
                <div class="shrink pl-10">
                    <div class="flex justify-between">
                        <h2 class="font-bold text-3xl">{{ $book->title }}</h2>
                        <div class="pr-10">
                            <div class="flex justify-center items-center w-12 h-12 rounded-full text-white bg-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="my-2 text-lg">Oleh <span class="text-secondary">{{ $book->author }}</span></p>
                    <p class="my-2 text-md flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Dilihat {{ $book->views }} | {{ $soldCount }} Terjual
                    </p>
                    <h2 class="font-bold text-2xl mt-5">Harga <span>{{ rupiah($book->price) }}</span></h2>
                    <div class="divider mb-1"></div>
                    <div class="w-fit">
                        <h3 class="font-bold text-lg text-accent border-b-2 border-accent pb-1.5">Deskripsi Buku</h3>
                    </div>
                    <div class="divider h-0.5 mt-0"></div>
                    <div class="text-justify">
                        {{ $book->description }}
                    </div>
                </div>
            </div>
            <div class="grow">
                <div class="w-full rounded-lg shadow-xl p-3">
                    <h3 class="font-bold text-xl mb-2">Beli buku ini</h3>
                    <div class="flex justify-between items-center">
                        <span>Harga eBook</span>
                        <span class="font-bold">{{ rupiah($book->price) }}</span>
                    </div>
                    <div class="divider my-3"></div>
                    <a href="{{ route('cart.add', $book->slug) }}" class="w-full btn btn-sm btn-warning">Beli sekarang</a>
                </div>
            </div>
        </div>
        <div class="divider mt-10 mb-1"></div>
        <h2 class="text-xl font-bold px-5">Buku Terkait</h2>
        <div class="grid grid-cols-5 gap-5 mt-3">
            @foreach($relatedBooks as $relatedBook)
                <a href="{{ route('book.detail', $relatedBook->slug) }}" class="card card-compact bg-base-100 shadow-xl">
                    <figure class="h-[300px]">
                        <img class="h-full" src="{{ $relatedBook->image_url }}" alt="{{ $relatedBook->title }}" />
                    </figure>
                    <div class="card-body">
                        <div class="tooltip tooltip-bottom before:text-left" data-tip="{{ $relatedBook->title }}">
                            <h2 class="font-bold text-lg text-ellipsis whitespace-nowrap overflow-hidden">{{ $relatedBook->title }}</h2>
                        </div>
                        <span class="block text-center text-rose-950">{{ $relatedBook->category->name }}</span>
                        <span class="block text-center text-rose-700">{{ rupiah($relatedBook->price) }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
