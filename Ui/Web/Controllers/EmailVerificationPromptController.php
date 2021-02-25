<?php

namespace Baconfy\Auth\Ui\Web\Controllers;

use Baconfy\Auth\AuthServiceProvider;
use Baconfy\Http\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(AuthServiceProvider::HOME)
            : view('ui::auth.verify-email');
    }
}
