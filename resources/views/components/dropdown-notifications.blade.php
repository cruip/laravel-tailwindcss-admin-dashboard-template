@props([
    'align' => 'right'
])

<div class="relative inline-flex" x-data="{ open: false }">
    <button
        class="w-8 h-8 flex items-center justify-center hover:bg-gray-100 lg:hover:bg-gray-200 dark:hover:bg-gray-700/50 dark:lg:hover:bg-gray-800 rounded-full"
        :class="{ 'bg-gray-200 dark:bg-gray-800': open }"
        aria-haspopup="true"
        @click.prevent="open = !open"
        :aria-expanded="open"                        
    >
        <span class="sr-only">Notifications</span>
        <svg class="fill-current text-gray-500/80 dark:text-gray-400/80" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 0a7 7 0 0 0-7 7c0 1.202.308 2.33.84 3.316l-.789 2.368a1 1 0 0 0 1.265 1.265l2.595-.865a1 1 0 0 0-.632-1.898l-.698.233.3-.9a1 1 0 0 0-.104-.85A4.97 4.97 0 0 1 2 7a5 5 0 0 1 5-5 4.99 4.99 0 0 1 4.093 2.135 1 1 0 1 0 1.638-1.148A6.99 6.99 0 0 0 7 0Z" />
            <path d="M11 6a5 5 0 0 0 0 10c.807 0 1.567-.194 2.24-.533l1.444.482a1 1 0 0 0 1.265-1.265l-.482-1.444A4.962 4.962 0 0 0 16 11a5 5 0 0 0-5-5Zm-3 5a3 3 0 0 1 6 0c0 .588-.171 1.134-.466 1.6a1 1 0 0 0-.115.82 1 1 0 0 0-.82.114A2.973 2.973 0 0 1 11 14a3 3 0 0 1-3-3Z" />                                        
        </svg>        
        <div class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 border-2 border-gray-100 dark:border-gray-900 rounded-full"></div>
    </button>
    <div
        class="origin-top-right z-10 absolute top-full -mr-48 sm:mr-0 min-w-80 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1 {{$align === 'right' ? 'right-0' : 'left-0'}}"                
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
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase pt-1.5 pb-2 px-4">Notifications</div>
        <ul>
            <li class="border-b border-gray-200 dark:border-gray-700/60 last:border-0">
                <a class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-700/20" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                    <span class="block text-sm mb-2">📣 <span class="font-medium text-gray-800 dark:text-gray-100">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                    <span class="block text-xs font-medium text-gray-400 dark:text-gray-500">Feb 12, 2024</span>
                </a>
            </li>
            <li class="border-b border-gray-200 dark:border-gray-700/60 last:border-0">
                <a class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-700/20" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                    <span class="block text-sm mb-2">📣 <span class="font-medium text-gray-800 dark:text-gray-100">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                    <span class="block text-xs font-medium text-gray-400 dark:text-gray-500">Feb 9, 2024</span>
                </a>
            </li>
            <li class="border-b border-gray-200 dark:border-gray-700/60 last:border-0">
                <a class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-700/20" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                    <span class="block text-sm mb-2">🚀<span class="font-medium text-gray-800 dark:text-gray-100">Say goodbye to paper receipts!</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                    <span class="block text-xs font-medium text-gray-400 dark:text-gray-500">Jan 24, 2024</span>
                </a>
            </li>
        </ul>                
    </div>
</div>