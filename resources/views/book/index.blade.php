<x-app-layout title="Katalog Buku">
    <div class="container max-w-6xl mx-auto" x-data="books">
        <div class="flex my-10">
            <div class="max-w-xs w-full">
                <div class="px-5">
                    <h2 class="text-xl font-bold">Kategori</h2>
                    <ul class="max-h-[400px] overflow-y-scroll pr-3">
                        @foreach($categories as $category)
                            <li class="flex justify-between items-center my-4">
                                <span>{{ $category->name }}</span>
                                <input type="checkbox" value="{{ $category->id }}" x-model="category_id" @change="filter" class="checkbox checkbox-sm checkbox-accent" />
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="px-5 mt-8">
                    <h2 class="text-xl font-bold">Harga</h2>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Minimum</span>
                        </div>
                        <input type="text" x-model="minimum_price" @keyup.debounce="filter" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                    </label>
                    <div class="my-3"></div>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Maximum</span>
                        </div>
                        <input type="text" x-model="maximum_price" @keyup.debounce="filter" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                    </label>
                </div>
                <div class="flex justify-end px-5 mt-3">
                    <button class="btn btn-outline btn-sm btn-primary" @click="reset">Reset</button>
                </div>
            </div>
            <div class="w-full px-5">
                <div class="flex justify-between items-center mb-3">
                    <span class="block">Menampilkan <span x-text="showing"></span> dari <span x-text="total"></span> buku</span>
                    <input type="text" x-model="search" @keyup.debounce="filter" placeholder="Search here" class="input input-sm input-bordered w-full max-w-xs" />
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 my-5">
                    <template x-for="book in data">
                        <a :href="'{{ route('book') }}/' + book.slug" class="card card-compact bg-base-100 shadow-xl">
                            <figure class="h-[250px]">
                                <img class="h-full" src="" :src="book.image_url" :alt="book.title" />
                            </figure>
                            <div class="card-body">
                                <div class="tooltip tooltip-bottom before:text-left" :data-tip="book.title">
                                    <h2 class="font-bold text-lg text-ellipsis whitespace-nowrap overflow-hidden" x-text="book.title"></h2>
                                </div>
                                <span class="block text-center text-rose-950" x-text="book.category.name"></span>
                                <span class="block text-center text-rose-700" x-text="book.price_rupiah"></span>
                            </div>
                        </a>
                    </template>
                </div>

                <div id="infinite-scroll-trigger" class="text-center my-10">
                    <span class="loading loading-spinner loading-md" x-show="loading"></span>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('books', () => ({
                    data: [],
                    page: 0,
                    last_page: null,
                    showing: 0,
                    total: 0,
                    search: '',
                    category_id: [],
                    minimum_price: null,
                    maximum_price: null,
                    loading: false,
                    triggerElement: null,
                    init() {
                        this.initUrl()
                        this.infiniteScroll()
                    },
                    initUrl() {
                        const query = new URLSearchParams(location.search)
                        if (query.get('search') !== null) {
                            this.search = query.get('search')
                        }

                        if (query.get('min_price') !== null) {
                            this.minimum_price = query.get('min_price')
                        }

                        if (query.get('max_price') !== null) {
                            this.maximum_price = query.get('max_price')
                        }

                        if (query.get('category') !== null) {
                            this.category_id.push(query.get('category'))
                        }
                    },
                    filter() {
                        console.log('changed')
                        this.data = []
                        this.page = 0
                        this.last_page = 0
                        this.historyPush()

                        setTimeout(() => {
                            if (this.data.length === 0) {
                                this.fetchData()
                            }
                        }, 100)
                    },
                    historyPush() {
                        const url = new URL(window.location.href)
                        if (this.search !== '') {
                            url.searchParams.set('search', this.search)
                        } else {
                            url.searchParams.delete('search')
                        }

                        if (this.category_id.length !== 0) {
                            url.searchParams.set('categories', this.category_id)
                        } else {
                            url.searchParams.delete('categories')
                            url.searchParams.delete('category')
                        }

                        if (this.maximum_price !== '' || this.maximum_price !== null) {
                            url.searchParams.set('max_price', this.maximum_price)
                        } else {
                            url.searchParams.delete('max_price')
                        }

                        if (this.minimum_price !== '' || this.minimum_price !== null) {
                            url.searchParams.set('min_price', this.minimum_price)
                        } else {
                            url.searchParams.delete('min_price')
                        }

                        history.pushState(null, document.title, url.toString())
                    },
                    reset() {
                        this.search = null
                        this.category_id = []
                        this.minimum_price = null
                        this.maximum_price = null
                        this.filter()
                    },
                    fetchData() {
                        if (this.page !== 0 && this.page >= this.last_page) {
                            return
                        }

                        this.loading = true
                        axios({
                            method: 'get',
                            url: '{{ route('book.query') }}',
                            params: {
                                page: this.page + 1,
                                search: this.search,
                                categories: this.category_id,
                                min_price: this.minimum_price,
                                max_price: this.maximum_price
                            }
                        }).then(resp => {
                            this.data = this.data.concat(resp.data.data)
                            this.page = resp.data.current_page
                            this.last_page = resp.data.last_page

                            this.showing = ((resp.data.current_page - 1) * resp.data.per_page) + (resp.data.to - resp.data.from + 1)
                            this.total = resp.data.total
                        }).finally(() => this.loading = false)
                    },
                    infiniteScroll() {
                        const ctx = this
                        this.triggerElement = document.querySelector('#infinite-scroll-trigger')

                        if (!('IntersectionObserver' in window) ||
                            !('IntersectionObserverEntry' in window) ||
                            !('isIntersecting' in window.IntersectionObserverEntry.prototype) ||
                            !('intersectionRatio' in window.IntersectionObserverEntry.prototype))
                        {
                            // Loading polyfill since IntersectionObserver is not available
                            this.isObserverPolyfilled = true

                            // Storing function in window so we can wipe it when reached last page
                            window.alpineInfiniteScroll = {
                                scrollFunc() {
                                    const position = ctx.triggerElement.getBoundingClientRect()

                                    if(position.top < window.innerHeight && position.bottom >= 0) {
                                        ctx.fetchData()
                                    }
                                }
                            }

                            window.addEventListener('scroll', window.alpineInfiniteScroll.scrollFunc)
                        } else {
                            // We can access IntersectionObserver
                            this.observer = new IntersectionObserver(function(entries) {
                                if(entries[0].isIntersecting === true) {
                                    ctx.fetchData()
                                }
                            }, { threshold: [0] })

                            this.observer.observe(this.triggerElement)
                        }
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
