<?php

namespace AbstractFactory\Factory;

use AbstractFactory\Repository\PersonDatabaseStorage;
use AbstractFactory\Repository\PersonRepositoryInterface;

class DatabaseRepositoryFactory implements RepositoryFactory
{
    /**
     * @return PersonRepositoryInterface
     */
    public function getStorage(): PersonRepositoryInterface
    {
        return new PersonDatabaseStorage();
    }
}
