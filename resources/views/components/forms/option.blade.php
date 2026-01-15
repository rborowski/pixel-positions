@props(['value', 'selected' => false, 'name' => null])

@php
    $defaults = [
        'value' => $value,
        'class' => 'text-gray-400 bg-bgblack',
    ];
    
    if ($selected || ($name && old($name) === $value)) {
        $defaults['selected'] = true;
    }
@endphp

<option {{ $attributes->merge($defaults) }}>
    {{ $slot }}
</option>
