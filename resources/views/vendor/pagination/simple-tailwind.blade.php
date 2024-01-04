@if ($paginator->hasPages())
    <div class="flex flex-col items-end">
        <nav role="navigation" aria-label="{!! __('Pagination Navigation') !!}" class="mb-4 sm:mb-0 sm:order-1">
            <ul class="flex justify-center">
                {{-- Previous Page Link --}}
                <li class="ml-3 first:ml-0">
                    @if ($paginator->onFirstPage())
                        <span class="btn bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 text-slate-300 dark:text-slate-600">
                            {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 text-indigo-500">
                            {!! __('pagination.previous') !!}
                        </a>
                    @endif
                </li>

                {{-- Next Page Link --}}
                <li class="ml-3 first:ml-0">
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 text-indigo-500">
                            {!! __('pagination.next') !!}
                        </a>
                    @else
                        <span class="btn bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 text-slate-300 dark:text-slate-600">
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
@endif
