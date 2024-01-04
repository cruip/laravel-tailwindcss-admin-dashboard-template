@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium mb-1']) }}>
    {{ $value ?? $slot }}
</label>
