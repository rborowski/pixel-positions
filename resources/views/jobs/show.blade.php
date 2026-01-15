@extends('layouts.app')

@section('title', $job->title . ' Job - Pixel Positions')

@section('content')
    <div class="p-4 bg-white/5 rounded-xl border border-blue-600 hover:border-blue-500 group transition-colors duration-300">
        <div class="flex md:grid-cols-2 max-md:flex-col">
            <div class="max-md:mx-auto">
                <x-employer.logo :employer="$job->employer" width="200"/>
            </div>
            <div class="flex flex-col justify-between w-full md:ml-3 max-md:mt-6">
                <div>
                    <a href="{{ route('jobs.index', ['employer' => $job->employer->id]) }}"
                       class="hover:text-blue-500 transition-colors duration-300"
                    >
                        {{ $job->employer->name }}
                    </a>
                    <h3 class="group-hover:text-blue-500 text-blue-600 text-3xl font-bold transition-colors duration-300">
                        {{ $job->title }}
                    </h3>
                    <p class="text-lg mt-2">From: {{ $job->salary->formatted() }}</p>
                </div>
                <div class="flex justify-between mt-3">
                    <div>
                        <a href="{{ $job->link }}" class="mt-4 hover:text-blue-500 transition-colors duration-300">
                            View original job offer
                        </a>
                    </div>
                    <div class="gap-x-1">
                        @foreach($job->tags as $tag)
                            <x-tag :$tag size="small" />
                      @endforeach
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>

    <article class="text-justify font-light font-stretch-expanded leading-7">
        {!! nl2br(e($job->description)) !!}
    </article>

    <div class="mt-6">
        <a href="{{ route('jobs.index') }}" class="text-blue-600 hover:text-blue-500 transition-colors duration-300">Go back to the job list</a>
    </div>

@endsection
