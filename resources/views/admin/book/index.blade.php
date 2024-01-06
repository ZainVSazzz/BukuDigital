<x-dashboard-layout page-title="Books">
    @include('admin.book.delete')
    <div class="card w-full p-6 bg-base-100 shadow-xl mt-2">
        <div class="text-xl font-semibold inline-block">
            All Books
            <form class="inline-block float-right">
                <div class="inline-block mr-2">
                    <div class="input-group  relative flex flex-wrap items-stretch w-full">
                        <input type="search" name="search" aria-label="Search" placeholder="Cari judul buku" class="input input-sm input-bordered w-full max-w-xs" value="{{ request('search') }}" required />
                    </div>
                </div>
                <button class="btn btn-primary btn-sm">Search</button>
                <a href="{{ route('admin.book.create') }}" class="btn btn-secondary btn-sm">Add Book</a>
            </form>
        </div>
        <div class="divider mt-2"></div>
        @if(session('success'))
            <div class="w-full my-2">
                <div role="alert" class="alert alert-success" x-data="{ show: true }" x-show="show">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                    <div>
                        <button @click="show = !show">x</button>
                    </div>
                </div>
            </div>
        @endif
        <div class='h-full w-full pb-6 bg-base-100'>
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books->items() as $book)
                        <tr>
                            <td>
                                <div class="flex items-center gap-x-3">
                                    <div class="w-20">
                                        <img class="w-full" src="{{ $book->image_url }}" alt="{{ $book->title }}">
                                    </div>
                                    <div class="font-bold text-wrap">{{ $book->title }}</div>
                                </div>
                            </td>
                            <td>{{ $book->category->name }}</td>
                            <td class="text-nowrap">{{ $book->author }}</td>
                            <td class="text-nowrap">{{ rupiah($book->price) }}</td>
                            <td>
                                <div class="flex gap-x-1 items-center">
                                    <div class="tooltip tooltip-top" data-tip="Show File">
                                        <a href="{{ route('admin.book.file', [$book->slug, Str::random(8)]) }}" target="_blank" class="btn btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="tooltip tooltip-top" data-tip="Edit">
                                        <a href="{{ route('admin.book.edit', $book->slug) }}" class="btn btn-sm btn-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="tooltip tooltip-top" data-tip="Delete">
                                        <button class="btn btn-sm btn-warning" onclick="confirmDelete('{{ $book->title }}', '{{ $book->slug }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-5">
                {{ $books->links('components.admin-pagination') }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const deleteForm = document.getElementById('form-delete')
            const deleteTitle = document.getElementById('delete-title')

            function confirmDelete(title, slug) {
                deleteForm.setAttribute('action', '{{ route('admin.book') }}/' + slug)
                deleteTitle.innerText = title
                deleteModal.showModal()
            }
        </script>
    @endpush
</x-dashboard-layout>
