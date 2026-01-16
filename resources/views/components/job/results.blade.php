@props([
    'jobs'
])

@if($jobs->isEmpty())
    <div class="text-center py-12">
        <p class="text-gray-400 text-lg mb-2">Oops, no results found</p>
        <p class="text-gray-500">Try changing your search criteria</p>
    </div>
@else
    <div class="space-y-6">
        @foreach($jobs as $job)
            <x-job.card-wide :$job />
        @endforeach
    </div>
    
    @if(method_exists($jobs, 'links'))
        <div class="mt-8">
            {{ $jobs->links() }}
        </div>
    @endif
@endif
