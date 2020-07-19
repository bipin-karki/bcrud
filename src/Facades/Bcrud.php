<?php

namespace Bipin\Bcrud\Facades;

use Illuminate\Support\Facades\Facade;

class Bcrud extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bcrud';
    }
}
