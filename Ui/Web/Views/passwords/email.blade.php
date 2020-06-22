@extends('ui::layouts.auth')

@section('title', __('auth::email.title'))
@section('welcome', __('auth::email.welcome'))

@section('content')
    <section class="mt-1">
        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="form" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="input @error('email') border-red-500 @enderror">
                <label class="@error('email') text-red-500 @enderror" for="email">{{ __('auth::login.email') }}</label>
                <input id="email" type="email" class="@error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                @error('email')<p>{{ $message }}</p>@enderror
            </div>

            <button class="block w-full rounded bg-primary text-white p-3 mt-4 mb-8" type="submit">{{ __('auth::email.action') }}</button>
        </form>

        <div class="divider"></div>

        <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
            {{ __('auth::register.already-account') }} <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">{{ __('auth::register.back-action') }}</a>
        </p>
    </section>
@endsection
