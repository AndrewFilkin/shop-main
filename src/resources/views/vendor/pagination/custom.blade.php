@if ($paginator->hasPages())
    <ul class="pagination pagination-lg justify-content-end">

        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark"
                   href="#"><span>&#8592;</span></a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark"
                   href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   aria-label="@lang('pagination.previous')"><span>&#8592;</span></a>
            </li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item disabled"
                            aria-current="page"><span></span>
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0"
                               href="{{ $url }}"
                               tabindex="-1">{{ $page }}</a></li>
                    @else
                        <li><a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0"
                               href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span>&#8594;</span></a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark"
                   href="#"><span>&#8594;</span></a>
            </li>
        @endif
    </ul>
@endif



