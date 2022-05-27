@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <ul>
            <li class="paginate">
                <i class="fas fa-chevron-left"></i>
            </li>
        </ul>
    @else
        <ul>
            <li>
                <a class="paginate" href="{{ $paginator->previousPageUrl() }}">
                    Anterior&nbsp;&nbsp;<i class="fas fa-chevron-right"></i>
                </a>
            </li>
        </ul>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <ul>
                <li class="paginate">
                    {{ $element }}
                </li>
            </ul>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <ul>
                        <li class="paginate_active">
                            {{ $page }}
                        </li>
                    </ul>
                @else
                    <ul>
                        <li>
                            <a class="paginate" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    </ul>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <ul>
            <li>
                <a class="paginate" href="{{ $paginator->nextPageUrl() }}">
                    Siguiente&nbsp;&nbsp;<i class="fas fa-chevron-right"></i>
                </a>
            </li>
        </ul>
    @else
        <ul>
            <li class="paginate">
                <i class="fas fa-chevron-right"></i>
            </li>
        </ul>
    @endif
@endif
