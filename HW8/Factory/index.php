<?php

require_once 'autoloader.php';

$autoPark = new AutoPark();
$fordFactory = new \factories\FordExplorerFactory();
$lincolnFactory = new \factories\LincolnAviatorFactory();

///////
echo 'Car from ford factory';
$ford = $autoPark->getCar($fordFactory);
echo $ford->showInfo();

///////
echo 'Car from lincoln factory';
$lincoln = $autoPark->getCar($lincolnFactory);
echo $lincoln->showInfo();

