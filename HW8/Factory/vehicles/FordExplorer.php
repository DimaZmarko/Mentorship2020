<?php

namespace vehicles;

class FordExplorer extends Vehicle
{
    /**
     * @var int
     */
    private $horsePower;

    /**
     * @var int
     */
    private $maxSpeed;

    /**
     * FordExplorer constructor.
     * @param int $horsePower
     * @param int $maxSpeed
     */
    public function __construct(int $horsePower, int $maxSpeed)
    {
        $this->horsePower = $horsePower;
        $this->maxSpeed = $maxSpeed;
    }

    /**
     * @return mixed|void
     */
    public function showInfo()
    {
        return 'This Ford has ' . $this->horsePower . ' horse power and ' . $this->maxSpeed . ' max speed' . "\n";
    }
}
