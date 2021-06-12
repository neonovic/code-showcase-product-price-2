<?php
declare(strict_types = 1);

namespace App\Domain\Price;


use App\Domain\Currency\Currency;
use App\Domain\Exchange\ExchangeRate;

/**
 * Value Object
 */
final class Price
{
    private int $value;
    private Currency $currency;

    public function __construct(int $value, Currency $currency)
    {
        if ($value < 0) {
            throw new \InvalidArgumentException("Price must not be lower than 0");
        }

        $this->value = $value;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return float
     */
    public function getFloatValue(): float
    {
        return $this->getValue() / 100;
    }

    /**
     * @return string
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param Price $price
     * @return bool
     */
    public function equals(Price $price): bool
    {
        return $this->getValue() === $price->getValue()
            && $this->getCurrency()->getCode() === $price->getCurrency()->getCode();
    }

    /**
     * @param ExchangeRate $exchangeRate
     * @param Currency $currency
     * @return Price
     */
    public function convert(ExchangeRate $exchangeRate, Currency $currency): Price
    {
        return new Price((int)($this->value * $exchangeRate->getValue()), $currency);
    }
}
