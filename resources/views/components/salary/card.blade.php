@props([
    'group'
])

@php
    $minFormatted = number_format($group['min'], 0, '.', ',');
    $maxFormatted = number_format($group['max'], 0, '.', ',');
@endphp

<x-panel class="flex flex-col text-center">
    <div class="py-8">
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">
            <a href="{{ route('jobs.index', ['currency' => $group['currency'], 'min' => $group['min'], 'max' => $group['max']]) }}">
                {{ $minFormatted }} - {{ $maxFormatted }} {{ $group['currency'] }}
            </a>
        </h3>

        <div class="pt-4 flex justify-center items-center mt-auto">
            <div>{{ $group['jobs_count'] }} {{ Str::plural('offer', $group['jobs_count']) }}</div>
        </div>
    </div>
</x-panel>
