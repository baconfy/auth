<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Register
    |--------------------------------------------------------------------------
    |
    | This option control if the application has the register section.
    |
    */

    'register' => true,

    /*
    |--------------------------------------------------------------------------
    | Password Reset
    |--------------------------------------------------------------------------
    |
    | This option control if the application has the reset password section.
    |
    */

    'reset' => true,

    /*
    |--------------------------------------------------------------------------
    | Confirm Reset
    |--------------------------------------------------------------------------
    |
    | This option control if the application has the confirm password section.
    |
    */

    'confirm' => true,

    /*
    |--------------------------------------------------------------------------
    | Verify
    |--------------------------------------------------------------------------
    |
    | This option control if the application has the verify section.
    |
    */

    'verify' => true,

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    |
    | This option provides the auth views.
    |
    */

    'views' => [
        'confirm' => 'ui::auth.confirm',
        'email' => 'ui::auth.email',
        'login' => 'ui::auth.login',
        'register' => 'ui::auth.register',
        'reset' => 'ui::auth.reset',
        'verify' => 'ui::auth.verify',
    ],


];
