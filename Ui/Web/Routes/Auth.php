<?php

namespace Baconfy\Auth\Ui\Web\Routes;

use Baconfy\Support\Routing\HttpRouter;
use Illuminate\Contracts\Routing\Registrar as Router;

class Auth extends HttpRouter
{
    /**
     * @inheritDoc
     */
    public function map(Router $router): void
    {
        $router->view('app', 'ui::app')->name('app');

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
        $router->get('login', 'LoginController@showLoginForm')->name('login');
        $router->post('login', 'LoginController@login')->name('login');
        $router->post('logout', 'LoginController@logout')->name('logout');
    }

    /**
     * @param Router $router
     */
    public function registration(Router $router): void
    {
        $router->get('register', 'RegisterController@showRegistrationForm')->name('register');
        $router->post('register', 'RegisterController@register')->name('register');
    }

    /**
     * Register the typical reset password routes for an application.
     *
     * @param Router $router
     * @return void
     */
    public function resetPassword(Router $router): void
    {
        $router->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $router->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        $router->post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    }

    /**
     * Register the typical confirm password routes for an application.
     *
     * @param Router $router
     * @return void
     */
    public function confirmPassword(Router $router): void
    {
        $router->get('password/confirm', 'ConfirmPasswordController@showConfirmForm')->name('password.confirm');
        $router->post('password/confirm', 'ConfirmPasswordController@confirm')->name('password.confirm');
    }

    /**
     * Register the typical email verification routes for an application.
     *
     * @param Router $router
     * @return void
     */
    public function emailVerification(Router $router): void
    {
        $router->get('email/verify', 'VerificationController@show')->name('verification.notice');
        $router->get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
        $router->post('email/resend', 'VerificationController@resend')->name('verification.resend');
    }

    /**
     * Register the typical social login routes for an application.
     *
     * @param Router $router
     * @return void
     */
    public function socialLogin(Router $router): void
    {
        $router->get('social-login', 'VerificationController@show')->name('social-login');
    }
}