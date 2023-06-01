<div class="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700 flex items-center">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Sales VS Refunds</h2>
        <div
            class="relative ml-2"
            x-data="{ open: false }"
            @mouseenter="open = true"
            @mouseleave="open = false"
        >
            <button
                class="block"
                href="#0"
                aria-haspopup="true"
                :aria-expanded="open"
                @focus="open = true"
                @focusout="open = false"
                @click.prevent
            >
                <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500" viewBox="0 0 16 16">
                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"/>
                </svg>
            </button>
            <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                <div
                    class="min-w-72 bg-white dark:bg-slate-700 dark:text-slate-100 border border-slate-200 dark:border-slate-600 p-3 rounded shadow-lg overflow-hidden mb-2"
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-out duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak
                >
                    <div class="text-sm">Sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit.
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="px-5 py-3">
        <div class="flex items-start">
            <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">+$6,796</div>
            <div class="text-sm font-semibold text-white px-1.5 bg-amber-500 rounded-full">-34%</div>
        </div>
    </div>
    <div class="grow">
        <canvas id="dashboard-card-09" width="595" height="248"></canvas>
    </div>
</div>