<x-app-layout title="Berita">
    <div class="container max-w-4xl mx-auto my-5">
        <h2 class="text-xl font-bold mb-3">Berita dan Informasi</h2>
        <div class="grid grid-cols-1 gap-5">
            @foreach($articles as $article)
                <a href="{{ route('article.show', $article->slug) }}" class="card card-side bg-base-100 shadow-xl">
                    <figure class="w-1/3"><img class="h-full" src="{{ $article->image_url }}" alt="{{ $article->title }}"/></figure>
                    <div class="card-body w-2/3">
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <p class="text-sm">{{ Str::limit(strip_tags($article->trixRichText->first()->content), 150) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="w-full my-5">
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
