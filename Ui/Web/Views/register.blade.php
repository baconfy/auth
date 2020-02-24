@extends('ui::layouts.auth')

@section('title', __('auth::register.title'))

@section('content')
    <p>{{ __('auth::register.welcome') }}</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">{{ __('auth::register.name') }}</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('auth::register.name') }}" required autofocus />
        </div>

        <div class="form-group">
            <label for="email">{{ __('auth::login.email') }}</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth::login.email') }}" required autofocus />
        </div>

        <div class="form-group">
            <label for="password">{{ __('auth::login.password') }}</label>
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth::login.password') }}" required />
        </div>

        <div class="form-group">
            <label for="password-confirm">{{ __('auth::register.confirm') }}</label>
            <input type="password" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="{{ __('auth::register.confirm') }}" required />
        </div>

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
