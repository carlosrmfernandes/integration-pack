<?php

namespace App\Components\NameIntegration\Strategies;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Components\NameIntegration\Contracts\ContractsInterface;
use App\Components\NameIntegration\Exceptions\Exceptions;

class Strategy implements ContractsInterface
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * Strategy constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $data
     * @return Object
     * @throws Exceptions
     */
    public function generate(
        array $data
    ): object
    {
        try {

            $response = $this->client->request(/*method*/ '', ''/*url*/, [
                'json' => '',
            ]);

            return json_decode($response->getBody()->getContents());
        } catch (ClientException $exception) {
            $response = json_decode($exception->getResponse()->getBody()->getContents());

            throw new Exception(
                $response->message, $exception->getCode()
            );
        } catch (Exceptions $exception) {
            throw $exception;
        }
    }

}
