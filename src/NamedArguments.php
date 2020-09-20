<?php

namespace App;

class NamedArguments
{
    public static function getUnionTypesNamedArguments(): ?UnionTypes
    {
        return new UnionTypes(arg2: 2);
    }
}
