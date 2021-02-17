<?php

namespace Baconfy\Auth\Ui\Web\Controllers;

use App\Http\Controllers\Controller;
use Baconfy\Auth\AuthServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(AuthServiceProvider::HOME)
            : view('auth.verify-email');
    }
}
