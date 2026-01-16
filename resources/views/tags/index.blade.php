@extends('layouts.app')

@section('title', 'Tags - Pixel Positions')

@section('content')

    @include('partials.search')

    <x-page-heading>Tags</x-page-heading>

    <div class="mt-6 gap-2  flex justify-center flex-wrap">
        @foreach($tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
@endsection
