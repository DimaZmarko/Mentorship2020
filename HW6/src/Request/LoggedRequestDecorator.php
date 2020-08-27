<?php

namespace src\Request;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggedRequestDecorator implements RequestInterface
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var Logger|null
     */
    protected $logger;

    /**
     * RequestDecorator constructor.
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
        $this->logger = $this->setLogger();
    }

    /**
     * @return mixed|void
     */
    public function getBody()
    {
        $requestBody = $this->request->getBody();

        if ($this->logger !== null) {
            $this->logger->info('Request body', $requestBody);
        }

        return $requestBody;
    }

    /**
     * @return mixed|void
     */
    public function getHeaders()
    {
        $requestHeaders = $this->request->getHeaders();

        if ($this->logger !== null) {
            $this->logger->info('Request headers', $requestHeaders);
        }

        return $requestHeaders;
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
