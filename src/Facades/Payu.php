<?php

namespace AnvarCO\PayuLatam\Facades;


use Illuminate\Support\Facades\Facade;



class Payu extends Facade
{
    
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'payu';
    }
    
}