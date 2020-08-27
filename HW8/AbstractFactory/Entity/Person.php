<?php

namespace AbstractFactory\Entity;

class Person implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $lname;

    /**
     * @param string $name
     * @return Person
     */
    public function setFirstName(string $name): Person
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $lname
     * @return Person
     */
    public function setLastName(string $lname): Person
    {
        $this->lname = $lname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLastName(): string
    {
        return $this->lname;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getFirstName(),
            'lname' => $this->getLastName()
        ];
    }

    /**
     * @param \stdClass $entry
     * @return Person
     */
    public static function fromStdClass(\stdClass $entry)
    {
        return (new self())->setFirstName($entry->name)->setLastName($entry->lname);
    }
}
