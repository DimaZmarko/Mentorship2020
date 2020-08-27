<?php

namespace AbstractFactory\Repository;

use AbstractFactory\Entity\Person;

interface PersonRepositoryInterface
{
    /**
     * @param Person $person
     */
    public function savePerson(Person $person): void;

    /**
     * @return array
     */
    public function readPeople(): array;

    /**
     * @param string $firstName
     * @return Person|null
     */
    public function readPerson(string $firstName): ?Person;
}
