<?php

namespace src;

use src\httpClients\HttpTransportInterface;
use src\Request\RequestInterface;
use src\Response\Response;
use src\Response\ResponseInterface;
use src\Response\ResponseToArrayDecorator;

class ApiClient
{
    const API_PATH = 'https://api.thecatapi.com/v1';
    const API_END_POINTS = [
        'search_images' => self::API_PATH . '/images/search',
        'get_images' => self::API_PATH . '/images',
        'get_breeds' => self::API_PATH . '/breeds',
        'get_categories' => self::API_PATH . '/categories',
    ];

    /**
     * @var HttpTransportInterface
     */
    private $httpClient;

    /**
     * ApiClient constructor.
     * @param HttpTransportInterface $httpClient
     */
    public function __construct(HttpTransportInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     */
    public function categories(RequestInterface $request = null)
    {
        return new Response($this->httpClient->get(
            self::API_END_POINTS['get_categories'],
           $request === null ?:['body' => $request->getbody(), 'headers' => $request->getHeaders()]
        ));
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     */
    public function breeds(RequestInterface $request)
    {
        return new Response($this->httpClient->get(
            self::API_END_POINTS['get_breeds'],
            ['body' => $request->getbody(), 'headers' => $request->getHeaders()]
        ));
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     */
    public function images(RequestInterface $request)
    {
        return new Response($this->httpClient->get(
            self::API_END_POINTS['get_images'],
            ['body' => $request->getbody(), 'headers' => $request->getHeaders()]
        ));
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function searchImages(RequestInterface $request)
    {
        $response = new Response($this->httpClient->get(
            self::API_END_POINTS['search_images'],
            ['body' => $request->getbody(), 'headers' => $request->getHeaders()]
        ));

        return new ResponseToArrayDecorator($response);
    }
}
