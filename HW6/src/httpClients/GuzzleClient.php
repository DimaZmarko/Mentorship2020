<?php

namespace src\httpClients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

final class GuzzleClient extends AbstractHttpTransport
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    /**
     * {@inheritDoc}
     */
    public function __construct(array $config = [])
    {
        $this->client = new Client($config);
    }

    /**
     * {@inheritDoc}
     */
    public function sendRequest(string $method, string $path, array $data = [])
    {
        try {
            $response = $this->client->request($method, $path, $data);
            $body = $response->getBody();
        } catch (GuzzleException $exception) {
            $body = null;
        }

        return $body;
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $path, array $data = [])
    {
        return $this->sendRequest(self::METHOD_GET, $path, $data);
    }

    /**
     * {@inheritDoc}
     */
    public function post(string $path, array $data = [])
    {
        return $this->sendRequest(self::METHOD_POST, $path, $data);
    }

    /**
     * {@inheritDoc}
     */
    public function put(string $path, array $data = [])
    {
        return $this->sendRequest(self::METHOD_PUT, $path, $data);
    }

    /**
     * {@inheritDoc}
     */
    public function patch(string $path, array $data = [])
    {
        return $this->sendRequest(self::METHOD_PATCH, $path, $data);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $path, array $data = [])
    {
        return $this->sendRequest(self::METHOD_DELETE, $path, $data);
    }
}
