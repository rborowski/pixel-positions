@php
use App\Models\Job;
use App\Models\Salary;
@endphp
@extends('layouts.app')

@section('title', 'Create a Job - Pixel Positions')

@section('content')
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary Amount" name="salary_amount" type="number" placeholder="50000"/>
        <x-forms.select label="Currency" name="salary_currency">
            @foreach(Salary::currencies() as $currency)
                <x-forms.option :value="$currency" name="salary_currency">{{ $currency }}</x-forms.option>
            @endforeach
        </x-forms.select>
        <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida"/>

        <x-forms.textarea label="Description" name="description" rows="10"
                          placeholder="Enter job description..."></x-forms.textarea>

        <x-forms.select label="Schedule" name="schedule">
            @foreach(Job::schedules() as $schedule)
                <x-forms.option :value="$schedule" name="schedule">{{ $schedule }}</x-forms.option>
            @endforeach
        </x-forms.select>

        <x-forms.input label="Link" name="link" placeholder="https://acme.com/jobs/ceo-wanted"/>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>

        <x-forms.divider/>

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="frontend,php,backend"/>

        <x-forms.button>Publish</x-forms.button>

    </x-forms.form>
@endsection
