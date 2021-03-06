<?php

namespace App;

/**
 * MatchExpressions.
 */
class MatchExpressions
{
    private string $str1;
    private ?string $str2;

    public function __construct(string $str1, string $str2 = null)
    {
        $this->str1 = $str1;
        $this->str2 = $str2;
    }

    public function getArguments(): string
    {
        return "String1: $this->str1, String2: $this->str2";
    }

    public function match(int $strNumber): ?string
    {
        return match($strNumber) {
            1 => $this->str1,
            2 => $this->str2,
            default => 'No string found for given number'
        };
    }

    public function strNewFunctions(string $toMatch): array
    {
        return [
            'contains' => str_contains($this->str1, $toMatch),
            'starts_with' => str_starts_with($this->str1, $toMatch),
            'ends_with' => str_ends_with($this->str1, $toMatch),
        ];
    }

    public static function initDefault(): self
    {
        return new self('abc');
    }
}
