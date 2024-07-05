@if ($errors->any())
    <div {{ $attributes }}>
        <div class="px-4 py-2 rounded-lg text-sm bg-red-500 text-white">
            <div class="font-medium">{{ __('Whoops! Something went wrong.') }}</div>
            <ul class="mt-1 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>         
    </div>
@endif
