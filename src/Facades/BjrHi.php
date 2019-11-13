<?php

namespace Mlatjac\BjrHi\Facades;

use Illuminate\Support\Facades\Facade;

class BjrHi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bjrhi';
    }
}
