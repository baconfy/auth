<?php

namespace Baconfy\Auth\Ui\Web\Controllers;

use App\Http\Controllers\Controller;
use Baconfy\Auth\Module;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = Module::HOME;

    /**
     * Display the password reset view for the given token.
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth::passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
