@extends('layouts.app')

@section('title', $title ?? 'Search results')

@section('content')
    @if(!isset($hideSearch))
        @include('partials.search')
    @endif
    <x-page-heading>{{ $title ?? 'Results' }}</x-page-heading>

    <div class="space-y-6">
        @foreach($jobs as $job)
            <x-job.card-wide :$job />
        @endforeach
    </div>
@endsection

