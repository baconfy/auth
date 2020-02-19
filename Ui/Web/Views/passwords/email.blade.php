@extends('ui::layouts.auth')

@section('title', __('auth::email.title'))

@section('content')
    <p>{{ __('auth::email.welcome') }}</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-label-group">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth::login.email') }}" required autofocus>
            <label for="email">{{ __('auth::login.email') }}</label>
        </div>

        <button class="btn btn-primary btn-block btn-login mb-2" type="submit">{{ __('auth::email.action') }}</button>

        @if (Route::has('login'))
            <div class="text-center"><a class="small" href="{{ route('login') }}">{{ __('auth::register.already-account') }}</a></div>
        @endif
    </form>
@endsection