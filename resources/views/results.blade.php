@extends('layouts.app')

@section('title', $title ?? 'Search results')

@section('content')
    @if(!isset($hideSearch))
        @include('partials.search')
    @endif
    <x-page-heading>{{ $title ?? 'Results' }}</x-page-heading>

    <x-job.results :$jobs />
@endsection

