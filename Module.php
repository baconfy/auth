<?php

namespace Baconfy\Dashboard;

use Baconfy\Module\ModuleProvider;

class Module extends ModuleProvider
{
    /**
     * @var string
     */
    protected $name = 'dashboard';

    /**
     * @var string
     */
    protected $namespace = __NAMESPACE__;
}
