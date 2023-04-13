@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center m-2">
        <div class="d-flex justify-content-center flex-fill d-sm-none">
            <ul class="pagination text-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Önceki</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Önceki</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Sonraki</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Sonraki</span>
                    </li>
                @endif
            </ul>
        </div>

    
    </nav>
@endif
