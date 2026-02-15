@extends('layouts.app')

@section('title', 'Verify Email - Pixel Positions')

@section('content')
    <x-page-heading>Verify your email</x-page-heading>

    <div class="max-w-2xl mx-auto space-y-6">
        @if (session('status') === 'verification-link-sent')
            <p class="rounded-lg bg-green-500/20 text-green-400 px-4 py-3">
                A new verification link has been sent to your email address.
            </p>
        @endif

        <p class="text-white/80">
            Thanks for signing up. Before getting started, please verify your email address
            by clicking the link we sent to <strong>{{ auth()->user()?->email }}</strong>.
        </p>

        <p class="text-white/80">
            If you didn't receive the email, we'll gladly send you another.
        </p>

        <x-forms.form method="POST" action="{{ route('verification.send') }}">
            <x-forms.button>Resend verification email</x-forms.button>
        </x-forms.form>
    </div>
@endsection