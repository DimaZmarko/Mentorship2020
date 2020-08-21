<?php

namespace factories;

use vehicles\LincolnAviator;
use vehicles\Vehicle;

class LincolnAviatorFactory implements IVehicleFactory
{
    /**
     * @param int $horsePower
     * @param int $maxSpeed
     * @return Vehicle
     */
    public function createVehicle(int $horsePower = 0, int $maxSpeed = 0): Vehicle
    {
        return new LincolnAviator($horsePower, $maxSpeed);
    }
}
