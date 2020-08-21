<?php

namespace src\Request;

class Request implements RequestInterface
{
    /**
     * @var array
     */
    const HTTP_HEADERS = array(
        'x-api-key' => '6762cc89-b6fb-464c-bc08-fa15ea39cd3d',
        'Content-Type' => 'application/json'
    );

    /**
     * @var array
     */
    protected $requestBody;

    /**
     * @var array
     */
    protected $requestHeaders;

    /**
     * Request constructor.
     * @param array $requestBody
     * @param array $requestHeaders
     */
    public function __construct(array $requestBody = [], array $requestHeaders = self::HTTP_HEADERS)
    {
        $this->requestBody = $requestBody;
        $this->requestHeaders = $requestHeaders;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->requestBody;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->requestHeaders;
    }
}
