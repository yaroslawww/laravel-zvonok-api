<?php


namespace GCSC\LaravelZvonokApi\Requests;

use GCSC\LaravelZvonokApi\LaravelZvonokApiClient;

abstract class AbstractRequest
{
    protected LaravelZvonokApiClient $client;

    protected bool $returnBody = false;

    /**
     * ZvonokBalance constructor.
     * @param LaravelZvonokApiClient $client
     */
    public function __construct(LaravelZvonokApiClient $client)
    {
        $this->client = $client;
    }

    public function needOnlyBody()
    {
        $this->returnBody = true;

        return $this;
    }

    public function needFullResponse()
    {
        $this->returnBody = false;

        return $this;
    }


    /**
     * @param string $method
     * @param string $path
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request(string $method, string $path = '', array $options = [])
    {
        if ($this->returnBody) {
            return $this->client->getResponse($method, $path, $options);
        }

        return $this->client->request($method, $path, $options);
    }

    protected function mergeQuery($query = [], $guzzleOptions = [])
    {
        if (! isset($guzzleOptions['query'])) {
            $guzzleOptions['query'] = [];
        }

        $guzzleOptions['query'] = array_merge($guzzleOptions['query'], $query);

        return $guzzleOptions;
    }
}
