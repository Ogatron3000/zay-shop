@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-lg justify-content-end">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0"
                          aria-disabled="true"
                          aria-label="@lang('pagination.previous')">
                        &lsaquo;
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                       href="{{ $paginator->previousPageUrl() }}"
                       rel="prev"
                       aria-label="@lang('pagination.previous')">
                        &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item disabled">
                                <span class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                       href="{{ $paginator->previousPageUrl() }}"
                       rel="next"
                       aria-label="@lang('pagination.next')">
                        &rsaquo;
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0"
                          aria-disabled="true"
                          aria-label="@lang('pagination.next')">
                        &rsaquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
