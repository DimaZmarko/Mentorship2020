<?php

namespace factories;

use vehicles\FordExplorer;
use vehicles\Vehicle;

class FordExplorerFactory implements IVehicleFactory
{
    /**
     * @param int $horsePower
     * @param int $maxSpeed
     * @return Vehicle
     */
    public function createVehicle(int $horsePower = 0, int $maxSpeed = 0): Vehicle
    {
        return new FordExplorer();
    }
}
