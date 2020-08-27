<?php

namespace src\Adapter;

interface IntegerStackInterface
{
    /**
     * @param int $integer
     */
    public function push(int $integer): void;

    /**
     * @return int
     */
    public function pop(): int;
}
