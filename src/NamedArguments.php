<?php

namespace App;

/**
 * NamedArguments.
 */
class NamedArguments
{
    private ?UnionTypes $unionTypes;

    public function __construct(UnionTypes $unionTypes = null)
    {
        $this->unionTypes = $unionTypes;
    }

    public function getUnionTypes(): ?UnionTypes
    {
        return $this->unionTypes;
    }

    public static function initDefault(): self
    {
        return new self(new UnionTypes(arg3: 3, arg1: 'arg1'));
    }
}
