@if ($errors->any())
    <div {{ $attributes }}>
        <div class="px-4 py-2 rounded-sm text-sm bg-rose-100 border border-rose-200 text-rose-600">
            <div class="font-medium">{{ __('Whoops! Something went wrong.') }}</div>
            <ul class="mt-1 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>         
    </div>
@endif
