<x-app-layout title="{{ $article->title }}">
    <div class="container max-w-4xl mx-auto my-5">
        <h1 class="text-4xl font-bold text-center">{{ $article->title }}</h1>
        <div class="flex justify-center items-center gap-x-2 my-10">
            <a href="https://www.facebook.com/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="flex justify-center items-center w-10 h-10 rounded text-white bg-[#516eab]">
                <svg class="w-7 h-7 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"></path></svg>
            </a>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(request()->fullUrl()) }}&via={{ urlencode('Buku Digital Nusantara') }}" target="_blank" class="flex justify-center items-center w-10 h-10 rounded text-white bg-[#29c5f6]">
                <svg class="w-7 h-7 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path></svg>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title) }}%20%0A%0A%20{{ request()->fullUrl() }}" target="_blank" class="flex justify-center items-center w-10 h-10 rounded text-white bg-[#7bbf6a]">
                <svg class="w-7 h-7 fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path></svg>
            </a>
        </div>
        <div class="max-w-2xl">
            <img class="my-7" src="{{ $article->image_url }}" alt="{{ $article->title }}">
            <div class="w-full">
                @foreach($article->trixRichText as $content)
                    {!! $content->content !!}
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
