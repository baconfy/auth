<?php

namespace Baconfy\Auth\Ui\Web\Controllers;

use Baconfy\Auth\AuthServiceProvider;
use Baconfy\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(AuthServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
