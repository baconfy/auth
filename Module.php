<?php

namespace Baconfy\Auth;

use Baconfy\Loader\ModuleProvider;

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
    public const HOME = '/dashboard';

    /**
     * @var string
     */
    protected $namespace = __NAMESPACE__;

    /**
     * Boot assets
     */
    private function bootAssets()
    {
        $this->publishes([$this->getClassDirectory('Resources/Assets/css') => public_path('baconfy/auth')], 'public');
    }
}
