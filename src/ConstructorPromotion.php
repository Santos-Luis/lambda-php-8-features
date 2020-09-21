<?php

namespace App;

/**
 * ConstructorPromotion.
 */
class ConstructorPromotion
{
    public function __construct(
        private string $str1,
    ) {}

    public function getArguments(): string
    {
        return "String1: $this->str1";
    }

    public static function initDefault(): self
    {
        return new self('abc');
    }
}
