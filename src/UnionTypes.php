<?php

namespace App;

/**
 * UnionTypes.
 */
class UnionTypes
{
    private ?string $arg1;
    private int|float|null $arg2;

    public function __construct(?string $arg1, int|float $arg2 = null)
    {
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;
    }

    public function getArg1(): ?string
    {
        return $this->arg1;
    }

    public function getArg2(): float|int|null
    {
        return $this->arg2;
    }

    public function getArgs(): string
    {
        return "arg1: $this->arg1, arg2: $this->arg2";
    }
}
