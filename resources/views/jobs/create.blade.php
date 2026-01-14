@extends('layouts.app')

@section('title', 'Create a Job - Pixel Positions')

@section('content')
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary Amount" name="salary_amount" type="number" placeholder="50000"/>
        <x-forms.select label="Currency" name="salary_currency">
            <option value="PLN">PLN</option>
            <option value="EUR">EUR</option>
            <option value="USD">USD</option>
            <option value="CHF">CHF</option>
        </x-forms.select>
        <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida"/>

        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
            <option>Freelance</option>
        </x-forms.select>

        <x-forms.input label="Link" name="link" placeholder="https://acme.com/jobs/ceo-wanted"/>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="frontend,php,backend"/>

        <x-forms.button>Publish</x-forms.button>

    </x-forms.form>
@endsection
