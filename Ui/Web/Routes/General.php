<?php

namespace Baconfy\Auth\Ui\Web\Routes;

use Baconfy\Auth\Ui\Web\Controllers\AuthenticatedSessionController;
use Baconfy\Auth\Ui\Web\Controllers\RegisteredUserController;
use Baconfy\Auth\Ui\Web\Controllers\PasswordResetLinkController;
use Baconfy\Routing\HttpRouter;
use Illuminate\Contracts\Routing\Registrar as Router;

class General extends HttpRouter
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

        $router->get('/terms', [AuthenticatedSessionController::class, 'create'])->name('terms');
        $router->get('/privacy', [AuthenticatedSessionController::class, 'create'])->name('privacy');
    }

    /**
     * @param Router $router
     */
    private function authentication(Router $router)
    {
        $router->get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
        $router->post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
        $router->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');
    }

    /**
     * @param Router $router
     */
    private function registration(Router $router)
    {
        $router->get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
        $router->post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
    }

    /**
     * @param Router $router
     */
    private function resetPassword(Router $router)
    {
        $router->get('/forgot-password', [PasswordResetLinkController::class, 'create'])->middleware('guest')->name('password.request');
        $router->post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware('guest')->name('password.email');

        $router->get('/reset-password/{token}', [NewPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
        $router->post('/reset-password', [NewPasswordController::class, 'store'])->middleware('guest')->name('password.update');
    }

    /**
     * @param Router $router
     */
    private function socialLogin(Router $router)
    {
        // @TODO implements social login
    }
}