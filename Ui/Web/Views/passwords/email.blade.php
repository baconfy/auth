@extends('ui::layouts.auth')

@section('title', __('auth::email.title'))

@section('content')
    <p>{{ __('auth::email.welcome') }}</p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group @error('email') is-invalid @enderror">
            <label for="email">{{ __('auth::login.email') }}</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="{{ __('auth::login.email') }}" autofocus>
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <button class="btn btn-primary btn-block btn-login mb-2" type="submit">{{ __('auth::email.action') }}</button>

        @if (Route::has('login'))
            <div class="text-center"><a class="small" href="{{ route('login') }}">{{ __('auth::register.already-account') }}</a></div>
        @endif
    </form>
@endsection