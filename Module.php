<?php

namespace Baconfy\Auth;

use Baconfy\Module\ModuleProvider;

class Module extends ModuleProvider
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
    public const HOME = '/home';

    /**
     * @var string
     */
    protected $namespace = __NAMESPACE__;
}
