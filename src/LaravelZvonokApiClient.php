<?php

namespace GCSC\LaravelZvonokApi;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

class LaravelZvonokApiClient
{
    protected $client;

    protected ApiRequester $apiRequester;

    public function __construct(array $configs = [])
    {
        $this->client = new GuzzleClient(array_merge(
            config('laravel-zvonok-api.guzzle_config'),
            [
                'base_uri' => config('laravel-zvonok-api.api_url'),
            ],
            $configs
        ));

        $this->apiRequester = new ApiRequester($this);
    }

    /**
     * @return GuzzleClient
     */
    public function getClient(): GuzzleClient
    {
        return $this->client;
    }

    public function request(string $method, string $path = '', array $options = []): ResponseInterface
    {
        if (strtolower($method) == 'post') {
            $key = 'form_params';
            if (isset($options[$key])) {
                $options[$key] = array_merge($options[$key], [
                    'public_key' => config('laravel-zvonok-api.api_key'),
                ]);
            } else {
                $key = 'multipart';
                if (! isset($options[$key])) {
                    $options[$key] = [];
                }
                $options[$key] = array_merge($options[$key], [
                    [
                        'name' => 'public_key',
                        'contents' => config('laravel-zvonok-api.api_key'),
                    ],
                ]);
            }
        } else {
            $key = 'query';
            if (! isset($options[$key])) {
                $options[$key] = [];
            }
            $options[$key] = array_merge($options[$key], ['public_key' => config('laravel-zvonok-api.api_key')]);
        }

        return $this->client->request($method, $path, $options);
    }

    public function getResponse(string $method, string $path = '', array $options = [])
    {
        $response = $this->request($method, $path, $options);
        $body = $response->getBody()->__toString();

        return json_decode($body, true);
    }

    public function api(): ApiRequester
    {
        return $this->apiRequester;
    }
}
