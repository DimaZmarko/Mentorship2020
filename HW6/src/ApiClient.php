<?php

namespace src;

use src\httpClients\HttpTransportInterface;
use src\Request\RequestInterface;
use src\Response\LoggedResponseProxy;
use src\Response\Response;
use src\Response\ResponseInterface;
use src\Response\ResponseToArrayDecorator;
use src\Stub\Stub;

class ApiClient implements CatApiInterface
{
    /**
     * @var bool
     */
    private $isLogged;

    /**
     * @var HttpTransportInterface
     */
    private $httpClient;

    /**
     * ApiClient constructor.
     * @param HttpTransportInterface $httpClient
     * @param bool $isLogged
     */
    public function __construct(HttpTransportInterface $httpClient, $isLogged = false)
    {
        $this->httpClient = $httpClient;
        $this->isLogged = $isLogged;
    }

    /**
     * @return bool
     */
    public function getIsLogged(): bool
    {
        return $this->isLogged;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function categories(RequestInterface $request = null): ResponseInterface
    {
        $guzzleResponse = $this->httpClient->get(
            self::API_END_POINTS['get_categories'],
            $request === null ?: ['body' => $request->getbody(), 'headers' => $request->getHeaders()]
        );

        if (!in_array($guzzleResponse['status'], self::VALID_STATUES, true)) {
            $responseBody = Stub::getCategories();
        } else {
            $responseBody = $guzzleResponse['body'];
        }

        $response = new Response($responseBody);

        if ($this->getIsLogged()) {
            return new LoggedResponseProxy($response);
        }

        return $response;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function breeds(RequestInterface $request): ResponseInterface
    {
        $guzzleResponse = $this->httpClient->get(
            self::API_END_POINTS['get_breeds'],
            array('body' => $request->getbody(), 'headers' => $request->getHeaders())
        );

        if (!in_array($guzzleResponse['status'], self::VALID_STATUES, true)) {
            $responseBody = Stub::getBreed();
        } else {
            $responseBody = $guzzleResponse['body'];
        }

        $response = new Response($responseBody);

        if ($this->getIsLogged()) {
            return new LoggedResponseProxy($response);
        }

        return $response;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function images(RequestInterface $request): ResponseInterface
    {
        $guzzleResponse = $this->httpClient->get(
            self::API_END_POINTS['get_images'],
            array('body' => $request->getbody(), 'headers' => $request->getHeaders())
        );

        if (!in_array($guzzleResponse['status'], self::VALID_STATUES, true)) {
            $responseBody = Stub::getImages();
        } else {
            $responseBody = $guzzleResponse['body'];
        }

        $response = new Response($responseBody);

        if ($this->getIsLogged()) {
            return new LoggedResponseProxy($response);
        }

        return $response;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function searchImages(RequestInterface $request): ResponseInterface
    {
        $guzzleResponse = $this->httpClient->get(
            self::API_END_POINTS['search_images'],
            array('body' => $request->getbody(), 'headers' => $request->getHeaders())
        );

        if (!in_array($guzzleResponse['status'], self::VALID_STATUES, true)) {
            $responseBody = Stub::getImages();
        } else {
            $responseBody = $guzzleResponse['body'];
        }

        $response = new Response($responseBody);

        if ($this->getIsLogged()) {
            $response = new LoggedResponseProxy($response);
        }

        return new ResponseToArrayDecorator($response);
    }
}
