@props(['label', 'name', 'rows' => 5])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'rows' => $rows,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full resize-y',
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}>{{ old($name) }}</textarea>
</x-forms.field>
