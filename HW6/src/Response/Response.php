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
     * @var bool
     */
    protected $isCached;

    /**
     * Response constructor.
     * @param string $data
     * @param int $status
     * @param bool $isCached
     */
    public function __construct($data = '', int $status = 200, $isCached = false)
    {
        $this->data = $this->setData($data);
        $this->status = $status;
        $this->isCached = $isCached;
    }

    /**
     * @return mixed|string|void
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int|mixed
     */
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
