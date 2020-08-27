<?php

namespace src\httpClients;

interface HttpTransportInterface
{
    /**
     * @param string $method
     * @param string $path
     * @param array $data
     * @return mixed
     */
    public function sendRequest(string $method, string $path, array $data = []);

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    public function get(string $path, array $data = []);

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    public function post(string $path, array $data = []);

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    public function put(string $path, array $data = []);

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    public function patch(string $path, array $data = []);

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    public function delete(string $path, array $data = []);
}