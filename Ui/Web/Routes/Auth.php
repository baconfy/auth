<?php

namespace Baconfy\Auth\Ui\Web\Routes;

use Baconfy\Auth\Ui\Web\Controllers\AuthenticatedSessionController;
use Baconfy\Auth\Ui\Web\Controllers\ConfirmablePasswordController;
use Baconfy\Auth\Ui\Web\Controllers\EmailVerificationNotificationController;
use Baconfy\Auth\Ui\Web\Controllers\EmailVerificationPromptController;
use Baconfy\Auth\Ui\Web\Controllers\NewPasswordController;
use Baconfy\Auth\Ui\Web\Controllers\PasswordResetLinkController;
use Baconfy\Auth\Ui\Web\Controllers\RegisteredUserController;
use Baconfy\Auth\Ui\Web\Controllers\VerifyEmailController;
use Baconfy\Routing\HttpRouter;
use Illuminate\Contracts\Routing\Registrar as Router;

class Auth extends HttpRouter
{
    /**
     * @param Router $router
     */
    public function map(Router $router): void
    {
        // Authentication Routes...
        $this->authentication($router);

        // Registration Routes...
        if (config('auth.register')) {
            $this->registration($router);

            if (config('auth.social-login')) {
                $this->socialLogin($router);
            }
        }

        // Password Reset Routes...
        if (config('auth.reset')) {
            $this->resetPassword($router);
        }

        // Password Confirmation Routes...
        if (config('auth.confirm')) {
            $this->confirmPassword($router);
        }

        // Email Verification Routes...
        if (config('auth.verify')) {
            $this->emailVerification($router);
        }
    }

    /**
     * @param Router $router
     */
    private function authentication(Router $router): void
    {
        $router->get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
        $router->post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
        $router->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');
    }

    /**
     * @param Router $router
     */
    public function registration(Router $router): void
    {
        $router->get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
        $router->post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
    }

    /**
     * Register the typical reset password routes for an application.
     *
     * @param Router $router
     * @return void
     */
    public function resetPassword(Router $router): void
    {
        $router->get('/forgot-password', [PasswordResetLinkController::class, 'create'])->middleware('guest')->name('password.request');
        $router->post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware('guest')->name('password.email');
        $router->get('/reset-password/{token}', [NewPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
        $router->post('/reset-password', [NewPasswordController::class, 'store'])->middleware('guest')->name('password.update');
    }

    /**
     * Register the typical confirm password routes for an application.
     *
     * @param Router $router
     * @return void
     */
    public function confirmPassword(Router $router): void
    {
        $router->get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->middleware('auth')->name('password.confirm');
        $router->post('/confirm-password', [ConfirmablePasswordController::class, 'store'])->middleware('auth');
    }

    /**
     * Register the typical email verification routes for an application.
     *
     * @param Router $router
     * @return void
     */
    public function emailVerification(Router $router): void
    {
        $router->get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->middleware('auth')->name('verification.notice');
        $router->get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
        $router->post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    }

    /**
     * Register the typical social login routes for an application.
     *
     * @param Router $router
     * @return void
     */
    public function socialLogin(Router $router): void
    {
    }
}