@extends('ui::layouts.auth')

@section('title', __('auth::login.title'))
@section('welcome', __('auth::login.welcome'))

@section('content')
    <section class="block mt-1">
        <form class="w-full" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-4 border rounded w-full bg-white p-3 @error('email') border-red-500 @enderror">
                <label class="block text-gray-500 text-xs font-semibold mb-1 @error('email') text-red-500 @enderror" for="email">{{ __('auth::login.email') }}</label>
                <input class="w-full text-gray-700 outline-none" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
            </div>
            @error('email')<p class="text-red-500 text-xs italic p-1 mb-4">{{ $message }}</p>@enderror

            <div class="mt-4 border rounded w-full bg-white p-3">
                <label class="block text-gray-500 text-xs mb-1 font-semibold" for="password">{{ __('auth::login.password') }}</label>
                <input class="w-full outline-none" id="password" type="password" name="password" required/>
                @error('password')<p>{{ $message }}</p>@enderror
            </div>

            <div class="mt-4">
                <label for="remember" class="inline-flex items-center text-sm font-semibold text-gray-500">
                    <input type="checkbox" class="form-checkbox outline-none mr-2" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <span>{{ __('auth::login.remember-password') }}</span>
                </label>
            </div>

            <button class="block w-full rounded bg-primary text-white p-3 mt-4 mb-8" type="submit">{{ __('Sign In') }}</button>
        </form>
    </section>

    @if (Route::has('password.request'))
        <section class="block mt-1">
            <div class="divider"></div>

            <a class="block text-center text-gray-700 text-sm mt-6 mb-2" href="{{ route('password.request') }}">{{ __('auth::login.forgot-password') }}</a>

            @if (Route::has('register'))
                <a class="block text-center text-primary text-sm mb-2" href="{{ route('register') }}">{{ __('auth::login.new-account') }}</a>
            @endif
        </section>
    @endif

    @if (1 or Route::has('social-login'))
        <section class="social-login mt-8">
            <div class="divider div-dot"></div>

            <p class="block text-center text-gray-500 text-sm mb-4">or login with</p>

            <div class="flex">
                <a href="#" class="flex-1 m-2 bg-blue-600 text-white p-3 text-center rounded"><i class="fab fa-facebook-f mr-2"></i> Facebook</a>
                <a href="#" class="flex-1 m-2 bg-red-600 text-white p-3 text-center rounded"><i class="fab fa-google mr-2"></i> Google</a>
            </div>
        </section>
    @endif
@endsection
