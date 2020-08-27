<?php

namespace AbstractFactory\Factory;

use AbstractFactory\Repository\PersonFileStorage;
use AbstractFactory\Repository\PersonRepositoryInterface;

class FileRepositoryFactory implements RepositoryFactory
{
    /**
     * @return PersonRepositoryInterface
     */
    public function getStorage(): PersonRepositoryInterface
    {
        return new PersonFileStorage();
    }
}
