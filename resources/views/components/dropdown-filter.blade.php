@props([
    'align' => 'right'
])

<div class="relative inline-flex" x-data="{ open: false }">
    <button
        class="btn bg-white dark:bg-slate-800 border-slate-200 hover:border-slate-300 dark:border-slate-700 dark:hover:border-slate-600 text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300"
        aria-haspopup="true"
        @click.prevent="open = !open"
        :aria-expanded="open"
    >
        <span class="sr-only">Filter</span><wbr>
        <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
            <path d="M9 15H7a1 1 0 010-2h2a1 1 0 010 2zM11 11H5a1 1 0 010-2h6a1 1 0 010 2zM13 7H3a1 1 0 010-2h10a1 1 0 010 2zM15 3H1a1 1 0 010-2h14a1 1 0 010 2z" />
        </svg>
    </button>
    <div
        class="origin-top-right z-10 absolute top-full left-0 right-auto min-w-56 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 pt-1.5 rounded shadow-lg overflow-hidden mt-1 {{$align === 'right' ? 'md:left-auto md:right-0' : 'md:left-0 md:right-auto'}}"                
        @click.outside="open = false"
        @keydown.escape.window="open = false"
        x-show="open"
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-out duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak                
    >
        <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase pt-1.5 pb-2 px-3">Filters</div>
        <ul class="mb-4">
            <li class="py-1 px-3">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" checked />
                    <span class="text-sm font-medium ml-2">Direct VS Indirect</span>
                </label>
            </li>
            <li class="py-1 px-3">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" checked />
                    <span class="text-sm font-medium ml-2">Real Time Value</span>
                </label>
            </li>
            <li class="py-1 px-3">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" checked />
                    <span class="text-sm font-medium ml-2">Top Channels</span>
                </label>
            </li>
            <li class="py-1 px-3">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" />
                    <span class="text-sm font-medium ml-2">Sales VS Refunds</span>
                </label>
            </li>
            <li class="py-1 px-3">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" />
                    <span class="text-sm font-medium ml-2">Last Order</span>
                </label>
            </li>
            <li class="py-1 px-3">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" />
                    <span class="text-sm font-medium ml-2">Total Spent</span>
                </label>
            </li>
        </ul>
        <div class="py-2 px-3 border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-700/20">
            <ul class="flex items-center justify-between">
                <li>
                    <button class="btn-xs bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 text-slate-500 dark:text-slate-300 hover:text-slate-600 dark:hover:text-slate-200">Clear</button>
                </li>
                <li>
                    <button class="btn-xs bg-indigo-500 hover:bg-indigo-600 text-white" @click="open = false" @focusout="open = false">Apply</button>
                </li>
            </ul>
        </div>
    </div>
</div>