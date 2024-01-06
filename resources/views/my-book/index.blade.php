<x-dashboard-layout page-title="Buku Saya">
    <div class="container mx-auto">
        <div class="rounded-lg p-6 bg-base-100 shadow-xl mt-2">
            <div class="flex justify-between items-center">
                <div class="text-md inline-block">Buku Saya</div>
                <form class="inline-block float-right">
                    <div class="inline-block mr-2">
                        <div class="input-group  relative flex flex-wrap items-stretch w-full">
                            <input type="search" name="search" aria-label="Search" placeholder="Cari judul buku" class="input input-sm input-bordered w-full max-w-xs" value="{{ request('search') }}" required />
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">Search</button>
                </form>
            </div>
            <div class="divider mt-2"></div>
            <div class="overflow-x-auto w-full">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Penerbit</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($myBooks) === 0)
                        <tr><td colspan="3" class="text-center">Anda belum melakukan pembelian buku.</td></tr>
                    @endif
                    @foreach($myBooks as $myBook)
                        <tr>
                            <td>{{ $myBook->book->title }}</td>
                            <td>{{ $myBook->book->author }}</td>
                            <td>
                                <a href="{{ route('my-book.view', $myBook->id) }}" class="btn btn-sm btn-accent">
                                    Baca Buku
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $myBooks->links('components.admin-pagination') }}
            </div>
        </div>
    </div>
</x-dashboard-layout>
