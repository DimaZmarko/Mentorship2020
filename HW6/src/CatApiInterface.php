<?php

namespace src;

use src\Request\RequestInterface;
use src\Response\ResponseInterface;

interface CatApiInterface
{
    const API_PATH = 'https://api.thecatapi.com/v1';
    const API_END_POINTS = [
        'search_images' => self::API_PATH . '/images/search',
        'get_images' => self::API_PATH . '/images',
        'get_breeds' => self::API_PATH . '/breeds',
        'get_categories' => self::API_PATH . '/categories',
    ];

    const VALID_STATUES = [200, 201];

    /**
     * @param RequestInterface|null $request
     * @return ResponseInterface
     */
    public function categories(RequestInterface $request = null): ResponseInterface;

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function breeds(RequestInterface $request): ResponseInterface;

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function images(RequestInterface $request): ResponseInterface;

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function searchImages(RequestInterface $request): ResponseInterface;

    /**
     * @return bool
     */
    public function getIsLogged(): bool;
}
