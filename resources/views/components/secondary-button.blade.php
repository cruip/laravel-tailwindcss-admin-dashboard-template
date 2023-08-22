<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 text-slate-600 dark:text-slate-300']) }}>
    {{ $slot }}
</button>
