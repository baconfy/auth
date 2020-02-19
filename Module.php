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
     * @var string
     */
    protected $namespace = __NAMESPACE__;
}
