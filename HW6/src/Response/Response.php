<?php

namespace src\Response;

class Response implements ResponseInterface
{
    /**
     * @var string
     */
    protected $data;

    /**
     * @var int
     */
    protected $status;

    /**
     * Response constructor.
     * @param $data
     * @param int $status
     */
    public function __construct($data = '', int $status = 200)
    {
        $this->data = $this->setData($data);
        $this->status = $status;
    }

    /**
     * @return mixed|string|void
     */
    public function getData()
    {
        return $this->data;
    }

    public function getStatusCode()
    {
        return $this->status;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function setData($data)
    {
       $this->data = (string)$data;

       return $this;
    }
}
