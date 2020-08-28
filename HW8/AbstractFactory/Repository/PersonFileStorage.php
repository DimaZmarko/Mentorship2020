<?php

namespace AbstractFactory\Repository;

use AbstractFactory\Entity\Person;

class PersonFileStorage implements PersonRepositoryInterface
{
    /**
     * @var string
     */
    private $file;

    /**
     * PersonFileStorage constructor.
     */
    public function __construct()
    {
        $this->file = 'persons.json';
    }

    /**
     * @param Person $person
     */
    public function savePerson(Person $person): void
    {
        $personsEntries = $this->getEntries();
        $personsEntries[] = $person->jsonSerialize();

        file_put_contents($this->file, json_encode($personsEntries));
    }

    /**
     * @return array
     */
    public function readPeople(): array
    {
        $personsEntries = $this->getEntries();

        $persons = [];
        foreach ($personsEntries as $personsEntry) {
            $persons[] = Person::fromStdClass($personsEntry);
        }

        return $persons;
    }

    /**
     * @param string $firstName
     * @return Person|null
     */
    public function readPerson(string $firstName): ?Person
    {
        $personsEntries = $this->getEntries();

        $personsEntries = array_filter($personsEntries, function ($obj) use ($firstName) {
            if (isset($obj->name) && $obj->name === $firstName) {
                return true;
            }

            return false;
        });

        return array_shift($personsEntries);
    }

    /**
     * @return mixed
     */
    private function getEntries()
    {
        return json_decode(file_get_contents($this->file), false);
    }
}
