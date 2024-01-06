@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center sm:justify-between">
        {{-- Small Screen --}}
        <div class="join sm:hidden">
            @if ($paginator->onFirstPage())
                <button class="join-item btn btn-sm btn-disabled">«</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn btn-sm">«</a>
            @endif
            <button class="join-item btn btn-sm">Page {{ $paginator->currentPage() }}</button>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn btn-sm">»</a>
            @else
                <button class="join-item btn btn-sm btn-disabled">»</button>
            @endif
        </div>

        {{-- Large Screen --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
            <div>
                <div class="join">
                    @if ($paginator->onFirstPage())
                        <button class="join-item btn btn-sm btn-disabled">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn btn-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    @foreach($elements as $element)
                        @if(is_string($element))
                            <button class="join-item btn btn-sm btn-disabled">...</button>
                        @endif

                        @if(is_array($element))
                            @foreach($element as $page => $url)
                                @if($page == $paginator->currentPage())
                                    <button class="join-item btn btn-sm btn-active">{{ $page }}</button>
                                @else
                                    <a href="{{ $url }}" class="join-item btn btn-sm">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn btn-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <button class="join-item btn btn-sm btn-disabled">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endif
