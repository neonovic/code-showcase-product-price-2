<?php
declare(strict_types = 1);

namespace App\Domain\Exchange;


use App\Domain\Currency\Currency;


class ExchangeRateProvider
{
    /**
     * @param Currency $from
     * @param Currency $to
     * @return ExchangeRate
     */
    public function getExchangeRate(Currency $from, Currency $to): ExchangeRate
    {
        return new ExchangeRate(
            $this->fetchExchangeRates()[$from->getCode()][$to->getCode()]
        );
    }

    /**
     * Exchange rates grid
     *
     * @return array
     */
    private function fetchExchangeRates(): array
    {
        return [
            'CZK' => [
                'EUR' => 25.82,
                'USD' => 18.25
            ],
            'EUR' => [
                'CZK' => 0.45,
            ]
        ];
    }
}
