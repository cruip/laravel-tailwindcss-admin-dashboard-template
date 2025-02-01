
<div class="relative" x-data="{ open: false, selected: 2 }">
    <button
        class="btn justify-between min-w-44 bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100"
        aria-label="Select date range"
        aria-haspopup="true"
        @click.prevent="open = !open"
        :aria-expanded="open" 
    >
        <span class="flex items-center">
            <svg class="fill-current text-gray-400 dark:text-gray-500 shrink-0 mr-2" width="16" height="16" viewBox="0 0 16 16">
                <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                <path d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
            </svg>
            <span x-text="$refs.options.children[selected].children[1].innerHTML"></span>
        </span>
        <svg class="shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500" width="11" height="7" viewBox="0 0 11 7">
            <path d="M5.4 6.8L0 1.4 1.4 0l4 4 4-4 1.4 1.4z" />
        </svg>
    </button>
    <div
        class="z-10 absolute top-full right-0 w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1"                
        @click.outside="open = false"
        @keydown.escape.window="open = false"
        x-show="open"
        x-transition:enter="transition ease-out duration-100 transform"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-out duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak                
    >
        <div class="font-medium text-sm text-gray-600 dark:text-gray-300" x-ref="options">
            <button
                tabindex="0"
                class="flex items-center w-full hover:bg-gray-50 dark:hover:bg-gray-700/20 py-1 px-3 cursor-pointer"
                :class="selected === 0 && 'text-violet-500'"
                @click="selected = 0;open = false"
                @focus="open = true"
                @focusout="open = false"
            >
                <svg class="shrink-0 mr-2 fill-current text-violet-500" :class="selected !== 0 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                </svg>
                <span>Today</span>
            </button>
            <button
                tabindex="0"
                class="flex items-center w-full hover:bg-gray-50 dark:hover:bg-gray-700/20 py-1 px-3 cursor-pointer"
                :class="selected === 1 && 'text-violet-500'"
                @click="selected = 1;open = false"
                @focus="open = true"
                @focusout="open = false"
            >
                <svg class="shrink-0 mr-2 fill-current text-violet-500" :class="selected !== 1 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                </svg>
                <span>Last 7 Days</span>
            </button>
            <button
                tabindex="0"
                class="flex items-center w-full hover:bg-gray-50 dark:hover:bg-gray-700/20 py-1 px-3 cursor-pointer"
                :class="selected === 2 && 'text-violet-500'"
                @click="selected = 2;open = false"
                @focus="open = true"
                @focusout="open = false"                                        
            >
                <svg class="shrink-0 mr-2 fill-current text-violet-500" :class="selected !== 2 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                </svg>
                <span>Last Month</span>
            </button>
            <button
                tabindex="0"
                class="flex items-center w-full hover:bg-gray-50 dark:hover:bg-gray-700/20 py-1 px-3 cursor-pointer"
                :class="selected === 3 && 'text-violet-500'"
                @click="selected = 3;open = false"
                @focus="open = true"
                @focusout="open = false"                                        
            >
                <svg class="shrink-0 mr-2 fill-current text-violet-500" :class="selected !== 3 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                </svg>
                <span>Last 12 Months</span>
            </button>
            <button
                tabindex="0"
                class="flex items-center w-full hover:bg-gray-50 dark:hover:bg-gray-700/20 py-1 px-3 cursor-pointer"
                :class="selected === 4 && 'text-violet-500'"
                @click="selected = 4;open = false"
                @focus="open = true"
                @focusout="open = false"                                        
            >
                <svg class="shrink-0 mr-2 fill-current text-violet-500" :class="selected !== 4 && 'invisible'" width="12" height="9" viewBox="0 0 12 9">
                    <path d="M10.28.28L3.989 6.575 1.695 4.28A1 1 0 00.28 5.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28.28z" />
                </svg>
                <span>All Time</span>
            </button>
        </div>
    </div>
</div>