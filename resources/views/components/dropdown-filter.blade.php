@props([
    'align' => 'right'
])

<div class="relative inline-flex" x-data="{ open: false }">
    <button
        class="btn px-2.5 bg-white dark:bg-gray-800 border-gray-200 hover:border-gray-300 dark:border-gray-700/60 dark:hover:border-gray-600 text-gray-400 dark:text-gray-500"
        aria-haspopup="true"
        @click.prevent="open = !open"
        :aria-expanded="open"
    >
        <span class="sr-only">Filter</span><wbr>
        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
            <path d="M0 3a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1ZM3 8a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1ZM7 12a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Z" />
        </svg>
    </button>
    <div
        class="origin-top-right z-10 absolute top-full left-0 right-auto min-w-56 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 pt-1.5 rounded-lg shadow-lg overflow-hidden mt-1 {{$align === 'right' ? 'md:left-auto md:right-0' : 'md:left-0 md:right-auto'}}"                
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
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase pt-1.5 pb-2 px-3">Filters</div>
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
        <div class="py-2 px-3 border-t border-gray-200 dark:border-gray-700/60 bg-gray-50 dark:bg-gray-700/20">
            <ul class="flex items-center justify-between">
                <li>
                    <button class="btn-xs bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-red-500">Clear</button>
                </li>
                <li>
                    <button class="btn-xs bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="open = false" @focusout="open = false">Apply</button>
                </li>
            </ul>
        </div>
    </div>
</div>