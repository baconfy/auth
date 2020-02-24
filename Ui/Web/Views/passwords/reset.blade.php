@extends('ui::layouts.auth')

@section('title', __('auth::reset.title'))

@section('content')
    <p>{{ __('auth::reset.welcome') }}</p>

    <form method="POST" action="{{ route('password.update') }}">
        <input type="hidden" name="token" value="{{ $token }}">
        @csrf

        <div class="form-group @error('email') is-invalid @enderror">
            <label for="email">{{ __('auth::login.email') }}</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="{{ __('auth::login.email') }}" value="{{ $email ?? old('email') }}" >
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <div class="form-group @error('password') is-invalid @enderror">
            <label for="password">{{ __('auth::login.password') }}</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="{{ __('auth::login.password') }}" autofocus />
        </div>

        @error('password')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <div class="form-group @error('password_confirmation') is-invalid @enderror">
            <label for="password-confirm">{{ __('auth::register.confirm') }}</label>
            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="{{ __('auth::register.confirm') }}" />
        </div>

        @error('password_confirmation')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <button class="btn btn-primary btn-block btn-login mb-2" type="submit">{{ __('auth::reset.action') }}</button>

        @if (Route::has('login'))
            <div class="text-center"><a class="small" href="{{ route('login') }}">{{ __('auth::register.already-account') }}</a></div>
        @endif
    </form>
@endsection