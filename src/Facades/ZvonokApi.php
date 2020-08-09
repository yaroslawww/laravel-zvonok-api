<?php

namespace GCSC\LaravelZvonokApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GCSC\LaravelZvonokApi\LaravelZvonokApi
 */
class ZvonokApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-zvonok-api-client';
    }
}
