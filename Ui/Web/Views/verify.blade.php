@extends('ui::layouts.auth')

@section('title', __('auth::verify.title'))

@section('content')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('auth::verify.alert') }}
        </div>
    @endif

    <p>{{ __('auth::verify.welcome') }}</p>
    {{ __('auth::verify.before') }}
    {{ __('auth::verify.receive') }},
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('auth::verify.request') }}</button>
        .
    </form>
@endsection