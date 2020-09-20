<?php

namespace App;

class NamedArguments
{
    public static function getUnionTypesNamedArguments(): ?UnionTypes
    {
        return new UnionTypes(arg3: 2, arg1: 'abc');
    }
}
