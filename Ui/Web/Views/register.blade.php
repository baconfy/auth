@extends('ui::layouts.auth')

@section('title', __('auth::register.title'))

@section('content')
    <p>{{ __('auth::register.welcome') }}</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-label-group">
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('auth::register.name') }}" required autofocus>
            <label for="email">{{ __('auth::register.name') }}</label>
        </div>

        <div class="form-label-group">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('auth::login.email') }}" required autofocus>
            <label for="email">{{ __('auth::login.email') }}</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth::guest.login.password') }}" required/>
            <label for="password">{{ __('auth::login.password') }}</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="{{ __('auth::register.confirm') }}" required/>
            <label for="password-confirm">{{ __('auth::register.confirm') }}</label>
        </div>


        <button class="btn btn-primary btn-block btn-login mb-2" type="submit">{{ __('auth::register.action') }}</button>

        @if (Route::has('login'))
            <div class="text-center"><a class="small" href="{{ route('login') }}">{{ __('auth::register.already-account') }}</a></div>
        @endif
    </form>
@endsection
