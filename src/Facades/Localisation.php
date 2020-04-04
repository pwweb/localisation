<?php

namespace PWWEB\Localisation\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Localisation extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string name of the facade
     */
    public static function getFacadeAccessor()
    {
        return 'localisation';
    }
}
