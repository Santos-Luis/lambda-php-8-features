<?php

namespace App;

class NullSafe
{
    private ?UnionTypes $unionTypes;

    public function __construct(?UnionTypes $unionTypes)
    {
        $this->unionTypes = $unionTypes;
    }

    /** Still in development
    public function getUnionTypesArg1(): ?UnionTypes
    {
        return $this->unionTypes?->getArg1();
    }
    */
}
