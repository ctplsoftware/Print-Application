@extends('layouts.app')
@section('content')
<div class="card container center p-4">
    <h2 class="text-2xl font-bold mb-4">{{ __('Forgot Your Password?') }}</h2>
    <p class="text-gray-600 mb-4">
        {{ __('No problem. Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.') }}
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="max-w-sm mx-auto">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email Address') }}</label>
            <input id="email" class="form-input mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <button type="submit" class="btn btn-primary ">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</div>
@endsection
<style>
    .form-input:focus {
        border-color: #4F46E5;
        box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
    }
</style>
