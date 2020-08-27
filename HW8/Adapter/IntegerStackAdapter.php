<?php

namespace src\Adapter;

class IntegerStackAdapter implements IntegerStackInterface
{
    /**
     * @var ASCIIStackInterface
     */
    protected $integerStack;

    /**
     * @param ASCIIStackInterface $integerStack
     */
    public function __construct(ASCIIStackInterface $integerStack)
    {
        $this->integerStack = $integerStack;
    }

    /**
     * @return int
     */
    public function pop(): int
    {
        return (int)$this->integerStack->pop();
    }

    /**
     * @param int $integer
     */
    public function push(int $integer): void
    {
        $this->integerStack->push((string)$integer);
    }
}
