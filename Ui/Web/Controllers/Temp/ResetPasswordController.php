<?php

namespace Baconfy\Auth\Ui\Web\Controllers;

use App\Http\Controllers\Controller;
use Baconfy\Auth\AuthServiceProvider;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = AuthServiceProvider::HOME;

    /**
     * Display the password reset view for the given token.
     * If no token is present, display the link request form.
     *
     * @param Request $request
     * @param string|null $token
     * @return Factory|View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('ui::auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
