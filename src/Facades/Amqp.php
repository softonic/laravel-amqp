<?php

namespace Softonic\Amqp\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @author Björn Schmitt <code@bjoern.io>
 * @see Softonic\Amqp\Amqp
 */
class Amqp extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Amqp';
    }
}
