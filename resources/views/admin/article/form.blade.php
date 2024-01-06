<x-dashboard-layout page-title="{{ $article ? 'Edit News' : 'Add News' }}">
    <div class="card w-full p-6 bg-base-100 shadow-xl mt-2">
        <form action="{{ $article ? route('admin.article.update', $article->slug) : route('admin.article') }}" method="post" enctype="multipart/form-data" x-data="bookForm()">
            @csrf @if($article) @method('put') @endif
            <section class="max-w-xs items-center">

                <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                    <div class="px-4 py-6">
                        <div class="relative p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                            <img id="image-preview" @if($article) src="{{ $article?->image_url }}" @endif class="absolute left-0 right-0 mx-auto origin-center inset-0 h-full">
                            <input id="image" type="file" name="image" class="hidden" accept="image/*" @change="imagePreview(event)" {{ $article ? '' : 'required' }} />
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
            <label class="form-control w-full my-3">
                <div class="label">
                    <span class="label-text">Judul Berita</span>
                </div>
                <input type="text" name="title" placeholder="Judul Berita" class="input input-bordered w-full max-w-ld" value="{{ $article?->title ?? old('title') }}" required/>
            </label>
            <div class="form-control w-full mt-5">
                @if ($article)
                    {!! $article->trix('content') !!}
                @else
                    @trix(\App\Models\Article::class, 'content')
                @endif
            </div>
            <div class="w-full mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
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
                    imagePreviewEvent: {{ $article ? 'true' : 'false' }},
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
