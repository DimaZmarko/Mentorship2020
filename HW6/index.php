<?php
require 'vendor/autoload.php';

use src\ApiClient;
use src\httpClients\GuzzleClient;
use src\Request\LoggedRequestProxy;
use src\Request\Request;
use src\Request\RequestParamsBuilderInterface;
use src\Request\SearchByBreedParamsBuilder;

$httpClient = new GuzzleClient();

$api = new ApiClient($httpClient, true);

$cachedClient = new \src\ApiClientCacheProxy($api);

$categories = $cachedClient->categories();

$requestParams = (new SearchByBreedParamsBuilder('beng'))
    ->size(RequestParamsBuilderInterface::SIZE_FULL)
    ->limit(10)
    ->mimeTypes(array(RequestParamsBuilderInterface::MIME_TYPE_JPG, RequestParamsBuilderInterface::MIME_TYPE_PNG))
    ->order(RequestParamsBuilderInterface::ORDER_BY_DESC)
    ->create();

$searchRequest = new Request($requestParams);
$searchResponse = $cachedClient->searchImages(new LoggedRequestProxy($searchRequest));

$searchStatusCode = $searchResponse->getStatusCode();
$searchData = $searchResponse->getData();
