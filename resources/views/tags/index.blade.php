@extends('layouts.app')

@section('title', 'Tags - Pixel Positions')

@section('content')

    @include('partials.search')

    <x-page-heading>Tags</x-page-heading>

    <div class="mt-6 space-x-1 space-y-2">
        @foreach($tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
@endsection
