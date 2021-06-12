<?php
declare(strict_types = 1);

namespace App\Domain\Product;


use App\Domain\Currency\Currency;
use App\Domain\Exchange\ExchangeRateProvider;
use App\Domain\Price\Price;


/**
 * Entity Object
 */
class Product
{
    public string $name;
    public Price $price;

    public function __construct(string $name, Price $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @param Currency $toCurrency
     * @return Price
     */
    public function getConvertedPrice(Currency $toCurrency): Price
    {
        $exchangeRateProvider = app(ExchangeRateProvider::class);
        $exchangeRate =  $exchangeRateProvider->getExchangeRate($this->price->getCurrency(), $toCurrency);

        return $this->price->convert($exchangeRate, $toCurrency);
    }

}
