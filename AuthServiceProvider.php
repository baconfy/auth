<?php

namespace Baconfy\Auth;

use Baconfy\Traits\Loaders\ModuleProvider;

class AuthServiceProvider extends ModuleProvider
{
    /**
     * @var string
     */
    protected $name = 'auth';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * @var string
     */
    protected $namespace = __NAMESPACE__;
}