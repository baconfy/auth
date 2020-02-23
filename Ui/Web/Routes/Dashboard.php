<?php

namespace Baconfy\Dashboard\Ui\Web\Routes;

use Baconfy\Support\Routing\HttpRouter;
use Illuminate\Contracts\Routing\Registrar as Router;

class Dashboard extends HttpRouter
{
    /**
     * @inheritDoc
     */
    public function map(Router $router): void
    {
        $router->get('home', 'HomeController@index')->name('home');
    }
}