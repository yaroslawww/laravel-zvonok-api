<?php


namespace GCSC\LaravelZvonokApi;

use GCSC\LaravelZvonokApi\Requests\ZvonokBalance;

/**
 * Class ApiRequester
 * @package GCSC\LaravelZvonokApi
 *
 * @property ZvonokBalance $balance
 */
class ApiRequester
{
    protected LaravelZvonokApiClient $client;

    protected $predefinedClasses = [
        'balance' => ZvonokBalance::class,
    ];
    protected $initialised = [];

    /**
     * ApiRequester constructor.
     * @param LaravelZvonokApiClient $client
     */
    public function __construct(LaravelZvonokApiClient $client)
    {
        $this->client = $client;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->predefinedClasses)) {
            if (! array_key_exists($name, $this->initialised)) {
                $class = $this->predefinedClasses[$name];
                $this->initialised[$name] = new $class($this->client);
            }

            return $this->initialised[$name];
        }

        throw new \Exception('Undefined property: ' . $name);
    }
}
