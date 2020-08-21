<?php

namespace src\Request;

interface RequestParamsBuilderInterface
{
    const SIZE_FULL = 'full';
    const SIZE_THUMB = 'thumb';
    const SIZE_MED = 'med';

    const ORDER_BY_DESC = 'desc';
    const ORDER_BY_ASC = 'asc';
    const ORDER_BY_RAND = 'rand';

    const FORMAT_JSON = 'json';
    const FORMAT_SRC = 'src';

    const MIME_TYPE_PNG = 'png';
    const MIME_TYPE_JPG = 'jpg';
    const MIME_TYPE_GIF = 'gif';

    /**
     * @param int $pageNum
     * @return RequestParamsBuilderInterface
     */
    public function page(int $pageNum): RequestParamsBuilderInterface;

    /**
     * @param int $limit
     * @return RequestParamsBuilderInterface
     */
    public function limit(int $limit): RequestParamsBuilderInterface;

    /**
     * @param string $size
     * @return RequestParamsBuilderInterface
     */
    public function size(string $size): RequestParamsBuilderInterface;

    /**
     * @param array $mimeTypes
     * @return RequestParamsBuilderInterface
     */
    public function mimeTypes(array $mimeTypes): RequestParamsBuilderInterface;

    /**
     * @param string $format
     * @return RequestParamsBuilderInterface
     */
    public function format(string $format): RequestParamsBuilderInterface;

    /**
     * @param string $order
     * @return RequestParamsBuilderInterface
     */
    public function order(string $order): RequestParamsBuilderInterface;

    /**
     * @param bool $hasBreeds
     * @return RequestParamsBuilderInterface
     */
    public function hasBreeds(bool $hasBreeds): RequestParamsBuilderInterface;

    /**
     * @return array
     */
    public function create(): array;
}
