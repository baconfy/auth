@extends('ui::layouts.auth')

@section('title', __('auth::login.title'))

@section('content')
    <p>{{ __('auth::login.welcome') }}</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group @error('email') is-invalid @enderror">
            <label for="email">{{ __('auth::login.email') }}</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="email@domain.com" autofocus>
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <div class="form-group  @error('password') is-invalid @enderror">
            <label for="password">{{ __('auth::login.password') }}</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="" />
        </div>

        @error('password')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <div class="custom-control custom-switch mb-2">
            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
            <label class="custom-control-label" for="remember">{{ __('auth::login.remember-password') }}</label>
        </div>

        <button class="btn btn-primary btn-block btn-login" type="submit">{{ __('auth::login.action') }}</button>

        <div class="divider div-transparent"></div>

        @if (Route::has('password.request'))
            <div class="text-center"><a class="small" href="{{ route('password.request') }}">{{ __('auth::login.forgot-password') }}</a></div>
        @endif

        @if (Route::has('register'))
            <div class="text-center"><a class="small" href="{{ route('register') }}">{{ __('auth::login.new-account') }}</a></div>
        @endif
    </form>

    @if (Route::has('social-login'))
        <div class="divider div-transparent div-dot"></div>

        <p class="text-center">or login with</p>

        <div class="row gutter">
            <a href="#" class="btn btn-facebook col"><i class="fab fa-facebook-f mr-2"></i> Facebook</a>
            <a href="#" class="btn btn-google col"><i class="fab fa-google mr-2"></i> Google</a>
        </div>
    @endif
@endsection
