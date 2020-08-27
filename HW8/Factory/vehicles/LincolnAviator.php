<?php

namespace vehicles;

class LincolnAviator extends Vehicle
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
     * LincolnAviator constructor.
     * @param int $horsePower
     * @param int $maxSpeed
     */
    public function __construct(int $horsePower, int $maxSpeed)
    {
        $this->horsePower = $horsePower;
        $this->maxSpeed = $maxSpeed;
    }

    /**
     * @return mixed|string
     */
    public function showInfo()
    {
        return 'Lincoln has ' . $this->horsePower . ' and ' . $this->maxSpeed . ' max speed' . "\n";
    }
}
