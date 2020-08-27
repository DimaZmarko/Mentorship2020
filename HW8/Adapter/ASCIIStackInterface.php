<?php

namespace src\Adapter;

interface ASCIIStackInterface
{
    /**
     * @param string $char
     */
    public function push(string $char): void;

    /**
     * @return string|null
     */
    public function pop(): ?string;
}
