<div class="flex flex-col col-span-full sm:col-span-6 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60 flex items-center">
            <h2 class="font-semibold text-gray-800 dark:text-gray-100">Real Time Value</h2>
        <div class="relative ml-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
            <button
                class="block"
                aria-haspopup="true"
                :aria-expanded="open"
                @focus="open = true"
                @focusout="open = false" @click.prevent
            >
                <svg class="fill-current text-gray-400 dark:text-gray-500" width="16" height="16" viewBox="0 0 16 16">
                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5Z" />
                </svg>
            </button>
            <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                <div
                    class="bg-white dark:bg-gray-800 dark:text-gray-100 border border-gray-200 dark:border-gray-700/60 px-3 py-2 rounded-lg shadow-lg overflow-hidden mb-2"
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-out duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak
                >
                    <div class="text-xs text-center whitespace-nowrap">Built with <a class="underline" @focus="open = true" @focusout="open = false" href="https://www.chartjs.org/" target="_blank">Chart.js</a></div>
                </div>
            </div>
        </div>
    </header>
    <div class="px-5 py-3">
        <div class="flex items-start">
            <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2 tabular-nums">$<span id="dashboard-card-05-value">57.81</span></div>
            <div id="dashboard-card-05-deviation" class="text-sm font-medium px-1.5 rounded-full"></div>
        </div>
    </div>
    <div class="grow">
        <canvas id="dashboard-card-05" width="595" height="248"></canvas>
    </div>
</div>