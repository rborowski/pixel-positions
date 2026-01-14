@extends('layouts.app')

@section('title', 'Log in - Pixel Positions')

@section('content')
    <x-page-heading>Log in</x-page-heading>

    <x-forms.form method="POST" action="/login" >

        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <x-forms.button>Log in</x-forms.button>
    </x-forms.form>
@endsection
