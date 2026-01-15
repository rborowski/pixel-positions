@props([
    'job'
])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">
        <a href="{{ route('jobs.index', ['employer' => $job->employer->id]) }}">
            {{ $job->employer->name }}
        </a>
    </div>
    <div class="py-8">
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">
            <a href="/jobs/{{ $job->id }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>
        <p class="text-sm mt-4">{{ $job->schedule }} - From {{ $job->salary?->formatted() ?? 'N/A' }}</p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($job->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach
        </div>

        <x-employer.logo :employer="$job->employer" :width="42" :height="42" />
    </div>
</x-panel>
