@if ($paginator->hasPages())
    <div class="flex flex-col items-end">
        <nav role="navigation" aria-label="{!! __('Pagination Navigation') !!}" class="mb-4 sm:mb-0 sm:order-1">
            <ul class="flex justify-center">
                {{-- Previous Page Link --}}
                <li class="ml-3 first:ml-0">
                    @if ($paginator->onFirstPage())
                        <span class="btn bg-white border-slate-200 text-slate-300 cursor-not-allowed">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn bg-white border-slate-200 hover:border-slate-300 text-indigo-500">
                            {!! __('pagination.previous') !!}
                        </a>
                    @endif
                </li>

                {{-- Next Page Link --}}
                <li class="ml-3 first:ml-0">
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn bg-white border-slate-200 hover:border-slate-300 text-indigo-500">
                            {!! __('pagination.next') !!}
                        </a>
                    @else
                        <span class="btn bg-white border-slate-200 text-slate-300 cursor-not-allowed">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
@endif
