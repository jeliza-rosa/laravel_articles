@if ($paginator->hasPages())

    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between blog-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
                <a class="btn btn-outline-secondary disabled" href="#">@lang('pagination.previous')</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-outline-primary">
                @lang('pagination.previous')
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-outline-primary">
                @lang('pagination.next')
            </a>
        @else
            <a class="btn btn-outline-secondary disabled" href="#">@lang('pagination.next')</a>
        @endif
    </nav>
@endif
