@extends('ui::layouts.auth')

@section('title', __('auth::confirm-password.title'))

@section('content')
    <p>{{ __('auth::confirm-password.welcome') }}</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-label-group">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth::login.password') }}" required autofocus />
            <label for="password">{{ __('auth::login.password') }}</label>
        </div>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <button type="submit" class="btn btn-primary btn-block btn-login mb-2">
            {{ __('auth::confirm-password.title') }}
        </button>

        @if (Route::has('password.request'))
            <div class="text-center"><a class="small" href="{{ route('password.request') }}">{{ __('auth::login.forgot-password') }}</a></div>
        @endif
    </form>
@endsection
