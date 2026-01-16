@php
    $defaults = [
        'class' => 'max-w-2xl mx-auto space-y-6',
        'method' => 'GET'
    ];
@endphp

<form {{ $attributes->merge($defaults) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>
