<?php

namespace bilyuk\Sendinblue\Facades;

use Illuminate\Support\Facades\Facade;

class SendinBlue extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sendinblue';
    }
}