@props(['value'])

<label {{ $attributes->merge(['class' => 'text-uppercase']) }}>
    {{ $value ?? $slot }}
</label>
