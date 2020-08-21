<?php

namespace src\Response;

interface ResponseInterface
{
    /**
     * @return mixed
     */
    public function getData();

    /**
     * @param $data
     * @return mixed
     */
    public function setData($data);

    /**
     * @return mixed
     */
    public function getStatusCode();

}