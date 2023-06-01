<!-- Search button -->
<div x-data="{ searchOpen: false }">
    <!-- Button -->
    <button
        class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600/80 rounded-full"
        :class="{ 'bg-slate-200': searchOpen }"
        @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});"
        aria-controls="search-modal"
    >
        <span class="sr-only">Search</span>
        <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path class="fill-current text-slate-500 dark:text-slate-400" d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
            <path class="fill-current text-slate-400 dark:text-slate-500" d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
        </svg>
    </button>
    <!-- Modal backdrop -->
    <div
        class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 transition-opacity"
        x-show="searchOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        aria-hidden="true"
        x-cloak
    ></div>
    <!-- Modal dialog -->
    <div
        id="search-modal"
        class="fixed inset-0 z-50 overflow-hidden flex items-start top-20 mb-4 justify-center px-4 sm:px-6"
        role="dialog"
        aria-modal="true"
        x-show="searchOpen"
        x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        x-cloak
    >
        <div
            class="bg-white dark:bg-slate-800 border border-transparent dark:border-slate-700 overflow-auto max-w-2xl w-full max-h-full rounded shadow-lg"
            @click.outside="searchOpen = false"
            @keydown.escape.window="searchOpen = false"
        >   
            <!-- Search form -->
            <form class="border-b border-slate-200 dark:border-slate-700">
                <div class="relative">
                    <label for="modal-search" class="sr-only">Search</label>
                    <input id="modal-search" class="w-full dark:text-slate-300 bg-white dark:bg-slate-800 border-0 focus:ring-transparent placeholder-slate-400 dark:placeholder-slate-500 appearance-none py-3 pl-10 pr-4" type="search" placeholder="Search Anything…" x-ref="searchInput" />
                    <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 dark:text-slate-500 group-hover:text-slate-500 dark:group-hover:text-slate-400 ml-4 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                        </svg>
                    </button>
                </div>
            </form>
            <div class="py-4 px-2">
                <!-- Recent searches -->
                <div class="mb-3 last:mb-0">
                    <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase px-2 mb-2">Recent searches</div>
                    <ul class="text-sm">
                        <li>
                            <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                    <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                </svg>
                                <span>Form Builder - 23 hours on-demand video</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                    <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                </svg>
                                <span>Access Mosaic on mobile and TV</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                    <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                </svg>
                                <span>Product Update - Q4 2021</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                    <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                </svg>
                                <span>Master Digital Marketing Strategy course</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                    <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                </svg>
                                <span>Dedicated forms for products</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                    <path d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z" />
                                </svg>
                                <span>Product Update - Q4 2021</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Recent pages -->
                <div class="mb-3 last:mb-0">
                    <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase px-2 mb-2">Recent pages</div>
                    <ul class="text-sm">
                        <li>
                            <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                    <path d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z" />
                                </svg>
                                <span><span class="font-medium">Messages</span> - <span class="text-slate-600 dark:text-slate-400 group-hover:text-white">Conversation / … / Mike Mills</span></span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center p-2 text-slate-800 dark:text-slate-100 hover:text-white hover:bg-indigo-500 rounded group" href="#0" @click="searchOpen = false" @focus="searchOpen = true" @focusout="searchOpen = false">
                                <svg class="w-4 h-4 fill-current text-slate-400 dark:text-slate-500 group-hover:text-white group-hover:text-opacity-50 shrink-0 mr-3" viewBox="0 0 16 16">
                                    <path d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z" />
                                </svg>
                                <span><span class="font-medium">Messages</span> - <span class="text-slate-600 dark:text-slate-400 group-hover:text-white">Conversation / … / Eva Patrick</span></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>                    
</div>