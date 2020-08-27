<?php

namespace AbstractFactory\Factory;

use AbstractFactory\Repository\PersonRepositoryInterface;

interface RepositoryFactory
{
    /**
     * @return PersonRepositoryInterface
     */
    public function getStorage(): PersonRepositoryInterface;
}
