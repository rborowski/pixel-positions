@extends('layouts.app')

@section('title', 'Salaries - Pixel Positions')

@section('content')

    @include('partials.search')

    <section class="pt-10">
        <x-page-heading>Salaries of offered jobs</x-page-heading>

        @foreach($salaryGroups as $currency => $groups)
            <div class="mt-8">
                <x-section-heading>{{ $currency }}</x-section-heading>
                <div class="grid lg:grid-cols-3 gap-8 mt-6">
                    @foreach($groups as $group)
                        <x-salary.card :group="$group" />
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
@endsection
