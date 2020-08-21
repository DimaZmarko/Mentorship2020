<?php

use factories\IVehicleFactory;
use vehicles\Vehicle;

class AutoPark
{
    /**
     * @var string
     */
    private $name;

    /**
     * AutoPark constructor.
     * @param $name
     */
    public function __construct(string $name = 'New')
    {
        $this->name = $name;
    }

    /**
     * @param IVehicleFactory $factory
     * @param int $horsePower
     * @param int $maxSpeed
     * @return Vehicle
     */
    public function getCar(IVehicleFactory $factory, int $horsePower = 0, int $maxSpeed = 0)
    {
        return $factory->createVehicle($horsePower, $maxSpeed);
    }
}
