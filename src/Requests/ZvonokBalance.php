<?php


namespace GCSC\LaravelZvonokApi\Requests;

class ZvonokBalance extends AbstractRequest
{

    /**
     * @param array $guzzleOptions
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function check($guzzleOptions = [])
    {
        return $this->request('get', 'users/balance/', $guzzleOptions);
    }

    /**
     * @param int $campaignId
     * @param array $guzzleOptions
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function cost(int $campaignId, $guzzleOptions = [])
    {
        return $this->request('get', 'phones/cost/', $this->mergeQuery([
            'campaign_id' => $campaignId,
        ], $guzzleOptions));
    }
}
