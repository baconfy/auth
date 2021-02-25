<?php

namespace Baconfy\Auth\Ui\Web\Controllers;

use Baconfy\Auth\AuthServiceProvider;
use Baconfy\Http\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     *
     * @param Request $request
     * @return View
     */
    public function show(Request $request): View
    {
        return view('ui::auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if (!Auth::guard('web')->validate(['email' => $request->user()->email, 'password' => $request->password])) {
            throw ValidationException::withMessages(['password' => __('auth.password')]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(AuthServiceProvider::HOME);
    }
}
