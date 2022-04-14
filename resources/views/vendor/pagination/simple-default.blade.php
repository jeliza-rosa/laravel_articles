@if ($paginator->hasPages())
    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Order</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

    <nav class="blog-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="btn btn-outline-secondary disabled" href="#">Order</a>
        @else
            <a class="btn btn-outline-primary" href="#">Order</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="btn btn-outline-primary" href="#">Newer</a>
        @else
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        @endif
    </nav>
@endif
