@extends('layouts.app')

@section('title', $title ?? 'Error')

@section('content')
    <div class="text-center py-20">
        <div>
            <h1 class="text-6xl font-bold {{ $color ?? 'text-blue-600' }} mb-4">{{ $code ?? 'Error' }}</h1>
            <x-page-heading>{{ $heading ?? 'Something went wrong' }}</x-page-heading>
            <p class="text-gray-400 text-lg mb-8 mt-4">
                {{ $description ?? 'An error occurred while processing your request.' }}
            </p>
            <a href="{{ route('home') }}" class="inline-block px-6 py-3 text-blue-600 hover:text-blue-500 transition-colors duration-300">
                Go to Homepage
            </a>
        </div>
    </div>
@endsection
