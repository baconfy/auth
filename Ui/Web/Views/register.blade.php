@extends('ui::layouts.auth')

@section('title', __('auth::register.title'))
@section('welcome', __('auth::register.welcome'))

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group @error('name') is-invalid @enderror">
            <label for="name">{{ __('auth::register.name') }}</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="{{ __('auth::register.name') }}" autofocus />
        </div>
        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <div class="form-group @error('email') is-invalid @enderror">
            <label for="email">{{ __('auth::login.email') }}</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="{{ __('auth::login.email') }}" />
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <div class="form-group @error('password') is-invalid @enderror">
            <label for="password">{{ __('auth::login.password') }}</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="{{ __('auth::login.password') }}" />
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

        @if (Route::has('terms') && Route::has('privacy'))
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input" name="agreement" id="agreement" {{ old('agreement') ? 'checked' : '' }} />
                <label class="custom-control-label" for="remember">{!! __('auth::register.agreement', ['terms' => route('terms'), 'privacy' => route('privacy')]) !!}</label>
            </div>
        @endif

        <button class="btn btn-primary btn-block btn-login mb-2" type="submit">{{ __('auth::register.action') }}</button>

        <div class="divider div-transparent"></div>

        @if (Route::has('login'))
            <div class="text-center"><a class="small" href="{{ route('login') }}">{{ __('auth::register.already-account') }}</a></div>
        @endif
    </form>
@endsection
