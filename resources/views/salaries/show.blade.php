@extends('layouts.app')

@section('title', $title)

@section('content')

    @include('partials.search')

    <x-page-heading>{{ $title }}</x-page-heading>

    {{-- TODO: slider --}}

    <x-job.results :$jobs />
@endsection
