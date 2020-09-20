<?php

namespace App;

class NullSafe
{
    private ?NamedArguments $namedArguments;
    private ?UnionTypes $unionTypes;

    public function __construct(NamedArguments $namedArguments = null, UnionTypes $unionTypes = null)
    {
        $this->namedArguments = $namedArguments;
        $this->unionTypes = $unionTypes;
    }

    public function getUnionTypesArg1(): string
    {
        return $this->unionTypes?->getArg1() ?? $this->namedArguments?->getUnionTypes()?->getArg1();
    }

    public static function initDefault(): self
    {
        $unionType = new UnionTypes(arg3: 3, arg1: 'arg1');

        return new self(new NamedArguments($unionType), null);
    }
}
