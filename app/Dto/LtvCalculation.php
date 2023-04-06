<?php

declare(strict_types=1);

namespace App\Dto;

readonly class LtvCalculation
{
    public function __construct(
        public float $propertyValue,
        public float $depositAmount,
        public float $netLoan,
        public float $ltv,
    ) {}
}
