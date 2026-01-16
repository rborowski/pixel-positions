@extends('layouts.app')

@section('title', 'Pixel Positions')

@section('content')

    @include('partials.search')

    <section class="pt-10">
        <x-section-heading>Featured Jobs</x-section-heading>

        <div class="grid lg:grid-cols-3 gap-8">
            @foreach($featuredJobs as $job)
                <x-job.card :$job />
            @endforeach
        </div>
        
        <div class="mt-8 text-center">
            <a href="{{ route('jobs.index') }}" class="inline-block px-6 py-3 bg-blue-800 rounded-xl font-bold hover:bg-blue-700 transition-colors duration-300">
                Find out more
            </a>
        </div>

    </section>
    <section>
        <x-section-heading>Tags</x-section-heading>

        <div class="space-x-1 space-y-2">
            @foreach($tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>
    </section>
    <section>
        <x-section-heading>Recent Jobs</x-section-heading>

        <x-job.results :$jobs />
        
        <div class="mt-8 text-center">
            <a href="{{ route('jobs.index') }}" class="inline-block px-6 py-3 bg-blue-800 rounded-xl font-bold hover:bg-blue-700 transition-colors duration-300">
                Find out more
            </a>
        </div>

    </section>
@endsection
