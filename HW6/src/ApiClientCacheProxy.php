<?php

namespace src;

use src\Request\RequestInterface;
use src\Response\LoggedResponseProxy;
use src\Response\Response;
use src\Response\ResponseInterface;
use voku\cache;

class ApiClientCacheProxy implements CatApiInterface
{
    /**
     * @var CatApiInterface
     */
    protected $catApiClient;

    /**
     * @var cache\Cache
     */
    protected $cache;

    /**
     * ApiClientCacheProxy constructor.
     * @param CatApiInterface $catApiClient
     */
    public function __construct(CatApiInterface $catApiClient)
    {
        $this->catApiClient = $catApiClient;
        $adapter = new cache\AdapterFileSimple();
        $serializer = new cache\SerializerDefault();
        $this->cache = new cache\Cache($adapter, $serializer, false, true);
    }

    /**
     * @return bool
     */
    public function getIsLogged(): bool
    {
        return $this->catApiClient->getIsLogged();
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     */
    public function breeds(RequestInterface $request): ResponseInterface
    {
        $cachedItem = $this->cache->getItem(md5(serialize($request->getBody())));
        if ($cachedItem) {
            $response = new Response($cachedItem);

            if ($this->getIsLogged()) {
                return new LoggedResponseProxy($response);
            }

            return $response;
        }

        $guzzleResponse = $this->catApiClient->breeds($request);
        $this->cache->setItem(md5(serialize($request->getBody())), $guzzleResponse->getData());

        return $guzzleResponse;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function images(RequestInterface $request): ResponseInterface
    {
        $cachedItem = $this->cache->getItem(md5(serialize($request->getBody())));
        if ($cachedItem) {
            $response = new Response($cachedItem);

            if ($this->getIsLogged()) {
                return new LoggedResponseProxy($response);
            }

            return $response;
        }

        $guzzleResponse = $this->catApiClient->images($request);
        $this->cache->setItem(md5(serialize($request->getBody())), $guzzleResponse->getData());

        return $guzzleResponse;
    }

    /**
     * @param RequestInterface|null $request
     * @return ResponseInterface
     */
    public function categories(RequestInterface $request = null): ResponseInterface
    {
        $cachedItem = $request ? $this->cache->getItem(md5(serialize($request->getBody()))) : null;
        if ($cachedItem) {
            $response = new Response($cachedItem);

            if ($this->getIsLogged()) {
                return new LoggedResponseProxy($response);
            }

            return $response;
        }

        $guzzleResponse = $this->catApiClient->categories($request);
        $this->cache->setItem(md5(serialize($request->getBody())), $guzzleResponse->getData());

        return $guzzleResponse;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function searchImages(RequestInterface $request): ResponseInterface
    {
        $cachedItem = $this->cache->getItem(md5(serialize($request->getBody())));
        if ($cachedItem) {
            $response = new Response($cachedItem);

            if ($this->getIsLogged()) {
                return new LoggedResponseProxy($response);
            }

            return $response;
        }

        $guzzleResponse = $this->catApiClient->searchImages($request);
        $this->cache->setItem(md5(serialize($request->getBody())), $guzzleResponse->getData());

        return $guzzleResponse;
    }
}
