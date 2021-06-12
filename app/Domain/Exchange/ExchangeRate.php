<?php
declare(strict_types = 1);

namespace App\Domain\Exchange;


/**
 * Value Object
 */
final class ExchangeRate
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value <= 0) {
            throw new \InvalidArgumentException("Exchange rate must be greater than 0");
        }

        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
