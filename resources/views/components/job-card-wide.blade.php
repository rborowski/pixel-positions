@props([
    'job'
])

<x-panel class="flex gap-x-6">
    <div>
        <x-employer-logo/>
    </div>
    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400">Employer Name</a>
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300 mt-3">Title</h3>
        <p class="text-sm text-gray-400 mt-auto">Full Time - From 50,000 USD</p>
    </div>
    <div>
        @foreach($job->tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
</x-panel>
