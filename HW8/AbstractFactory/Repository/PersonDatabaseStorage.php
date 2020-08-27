<?php

namespace AbstractFactory\Repository;

use AbstractFactory\Entity\Person;
use PDO;

class PersonDatabaseStorage implements PersonRepositoryInterface
{
    /**
     * @var PDO
     */
    private $conn;

    /**
     * PersonDatabaseStorage constructor.
     */
    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=factory', 'root', '');
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param Person $person
     */
    public function savePerson(Person $person): void
    {
        $stmt = $this->conn->prepare('INSERT INTO persons (name, lname) VALUES (?, ?)');
        $stmt->execute([$person->getFirstName(), $person->getLastName()]);
    }

    /**
     * @return array
     */
    public function readPeople(): array
    {
        $stmt = $this->conn->prepare('SELECT * FROM persons');
        $stmt->execute();

        $persons = [];
        while ($person = $stmt->fetchObject(Person::class)) {
            $persons[] = $person;
        }

        return $persons;
    }

    /**
     * @param string $name
     * @return Person|null
     */
    public function readPerson(string $name): ?Person
    {
        $stmt = $this->conn->prepare('SELECT * FROM persons WHERE name = ?');
        $stmt->execute([$name]);
        $person = $stmt->fetchObject(Person::class);

        return $person;
    }
}
