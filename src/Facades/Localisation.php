<?php

namespace PWWeb\Localisation\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Localisation extends BaseFacade
{
    /**
     * Get the registered name of the component.
     */
    public static function getFacadeAccessor()
    {
        return 'localisation';
    }
}
