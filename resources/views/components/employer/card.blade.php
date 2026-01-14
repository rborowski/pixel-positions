@props([
    'employer'
])

<x-panel class="flex flex-col text-center">
    <div class="py-8">

        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">
            <a href="{{ route('jobs.index', ['employer' => $employer->id]) }}">
                {{ $employer->name }}
            </a>
        </h3>

        <div class="pt-4 flex justify-center items-center mt-auto">
            <x-employer.logo :employer="$employer"/>
        </div>
    </div>
</x-panel>
