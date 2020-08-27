<?php

require_once 'autoloader.php';

use AbstractFactory\Entity\Person;
use AbstractFactory\Factory\DatabaseRepositoryFactory;

$person = (new Person())
    ->setFirstName('Ivan')
    ->setLastName('Ivanov');

$repository = (new DatabaseRepositoryFactory())->getStorage();

$repository->savePerson($person);
