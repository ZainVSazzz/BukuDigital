<dialog id="deleteModal" class="modal">
    <div class="modal-box flex flex-col items-center">
        <svg class="w-28 h-28 text-error" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <h3 class="font-bold text-lg">Hapus Berita</h3>
        <p class="py-1 text-center">Apakah anda yakin akan menghapus artikel berita <span id="delete-title" class="font-semibold"></span>?</p>
        <div class="mt-3 flex items-center gap-x-1">
            <form method="dialog">
                <button class="btn">Batal</button>
            </form>
            <form id="form-delete" action="" method="post">
                @csrf @method('delete')
                <button type="submit" class="btn btn-error">Hapus</button>
            </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
