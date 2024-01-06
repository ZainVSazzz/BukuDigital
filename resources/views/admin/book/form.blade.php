<x-dashboard-layout page-title="Add Book">
    <div class="card w-full p-6 bg-base-100 shadow-xl mt-2">
        <form action="{{ route('admin.book') . ($book ? '/' . $book->slug : '') }}" method="post" enctype="multipart/form-data" x-data="bookForm()">
            @csrf @if($book) @method('put') @endif
            <div class="flex gap-x-5">
                <section class="container w-1/3 mx-auto items-center">
                    <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                        <div class="px-4 py-6">
                            <div class="relative p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <img id="image-preview" @if($book) src="{{ $book?->image_url }}" @endif class="absolute left-0 right-0 mx-auto origin-center inset-0 h-full">
                                <input id="image" type="file" name="image" class="hidden" accept="image/*" @change="imagePreview(event)" />
                                <label for="image" class="cursor-pointer" id="image-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload image</h5>
                                    <p class="font-normal text-sm text-gray-400 md:px-6">Choose image size should be less than <b class="text-gray-600">2mb</b></p>
                                    <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="grid grid-cols-2 gap-3 w-2/3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Judul Buku</span>
                        </div>
                        <input type="text" name="title" placeholder="Judul Buku" class="input input-bordered w-full max-w-xs" value="{{ $book?->title ?? old('title') }}" required/>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Kategori</span>
                        </div>
                        <select class="select select-bordered" name="category_id" required>
                            <option disabled {{ $book ? '' : 'selected' }}>Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $book?->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Penulis / Penerbit</span>
                        </div>
                        <input type="text" name="author" placeholder="Penerbit" class="input input-bordered w-full max-w-xs" value="{{ $book?->author ?? old('author') }}" required/>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Harga</span>
                        </div>
                        <input type="number" name="price" placeholder="50000" class="input input-bordered w-full max-w-xs" value="{{ $book?->price ?? old('price') }}" required/>
                    </label>
                    <div class="col-span-2">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">File</span>
                            </div>
                            <input type="file" accept=".pdf" name="book_file" class="file-input file-input-bordered w-full" {{ $book ? '' : 'required' }} />
                            @if($book)
                                <div class="label">
                                    <span class="label-text-alt flex items-center gap-x-1 text-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                        </svg>
                                        <a href="{{ route('admin.book.file', [$book->slug, Str::random(8)]) }}" target="_blank">Lihat file</a>
                                    </span>
                                </div>
                            @endif
                        </label>
                    </div>
                </div>
            </div>
            <div class="w-full mt-3">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Deskripsi</span>
                    </div>
                    <textarea name="description" class="textarea textarea-bordered h-24" placeholder="Bio">{{ $book?->description ?? old('description') }}</textarea>
                </label>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            const imageInput = document.getElementById('image')
            const imageLabel = document.getElementById('image-label')
            const imagePreview = document.getElementById('image-preview')

            imageInput.addEventListener('click', (event) => {
                event.stopPropagation();
            });

            function bookForm() {
                return {
                    imagePreviewEvent: {{ $book ? 'true' : 'false' }},
                    init() {
                        if (this.imagePreviewEvent) {
                            imagePreview.addEventListener('click', () => {
                                imageInput.click();
                            });
                        }
                    },
                    imagePreview(event) {
                        if (event.target.files.length > 0) {
                            imagePreview.src = URL.createObjectURL(event.target.files[0]);
                            imagePreview.style.display = 'block';
                            imageLabel.classList.add('opacity-0')

                            if (!this.imagePreviewEvent) {
                                imagePreview.addEventListener('click', () => {
                                    imageInput.click();
                                });

                                this.imagePreviewEvent = true
                            }
                        }
                    }
                }
            }
        </script>
    @endpush
</x-dashboard-layout>
