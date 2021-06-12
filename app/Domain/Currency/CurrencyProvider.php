<?php
declare(strict_types = 1);

namespace App\Domain\Currency;


final class CurrencyProvider
{
    /**
     * @param string $code
     * @return Currency
     */
    public function get(string $code): Currency
    {
        return $this->getAll()[$code];
    }

    /**
     * @return Currency[]
     */
    private function getAll(): array
    {
        return [
            'CZK' => new Currency('CZK', 'Kč'),
            'EUR' => new Currency('EUR', '€'),
            'USD' => new Currency('USD', '$'),
        ];
    }
}
