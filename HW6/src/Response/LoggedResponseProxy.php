<?php

namespace src\Response;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggedResponseProxy implements ResponseInterface
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @var Logger|null
     */
    protected $logger;

    /**
     * LoggedResponseProxy constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->setLogger();
    }

    /**
     * @param $data
     * @return $this|mixed
     */
    public function setData($data)
    {
        $this->response->setData((string)$data);

        if ($this->logger !== null) {
            $this->logger->info('Set Response data', $data);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->response->getData();
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    /**
     * @return Logger
     */
    protected function setLogger()
    {
        try {
            return (new Logger('dev'))
                ->pushHandler(new StreamHandler(__DIR__ . '../logs/app.log', Logger::DEBUG));
        } catch (\Exception $exception) {
            return null;
        }
    }
}
