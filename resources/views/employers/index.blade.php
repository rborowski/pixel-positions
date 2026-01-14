@extends('layouts.app')

@section('title', 'Employers - Pixel Positions')

@section('content')

    @include('partials.search')

    <section class="pt-10">
        <x-page-heading>Employers</x-page-heading>

        <div class="grid lg:grid-cols-3 gap-8 mt-6">
            @foreach($employers as $employer)
                <x-employer.card :$employer />
            @endforeach
        </div>
    </section>
@endsection
