@props([
    'job'
])

<x-panel class="flex max-md:flex-col  max-md:space-y-4 gap-x-6">
    <div>
        <x-employer.logo :employer="$job->employer"/>
    </div>
    <div class="flex-1 flex flex-col">
        <a href="{{ route('jobs.index', ['employer' => $job->employer->id]) }}" class="self-start text-sm text-gray-400">
            {{ $job->employer->name }}
        </a>
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300 mt-3">
            <a href="/jobs/{{ $job->id }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>
        <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - From {{ $job->salary?->formatted() ?? 'N/A' }}</p>
    </div>
    <div class="max-md:flex max-md:justify-start flex-wrap max-md:gap-2">
        @foreach($job->tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
</x-panel>
