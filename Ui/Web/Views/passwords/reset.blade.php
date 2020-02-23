@extends('ui::layouts.auth')

@section('title', __('auth::reset.title'))

@section('content')
    <p>{{ __('auth::reset.welcome') }}</p>

    <form method="POST" action="{{ route('password.update') }}">
        <input type="hidden" name="token" value="{{ $token }}">
        @csrf

        <div class="form-group">
            <label for="email">{{ __('auth::login.email') }}</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth::login.email') }}" value="{{ $email ?? old('email') }}" required >
        </div>

        <div class="form-group">
            <label for="password">{{ __('auth::login.password') }}</label>
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth::login.password') }}" required autofocus />
        </div>

        <div class="form-group">
            <label for="password-confirm">{{ __('auth::register.confirm') }}</label>
            <input type="password" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="{{ __('auth::register.confirm') }}" required/>
        </div>

        <button class="btn btn-primary btn-block btn-login mb-2" type="submit">{{ __('auth::reset.action') }}</button>

        @if (Route::has('login'))
            <div class="text-center"><a class="small" href="{{ route('login') }}">{{ __('auth::register.already-account') }}</a></div>
        @endif
    </form>
@endsection