<?php

namespace Tests\Feature;

use App\Domain\Currency\Currency;
use App\Domain\Exchange\ExchangeRate;
use App\Domain\Exchange\ExchangeRateProvider;
use App\Domain\Price\Price;
use App\Domain\Product\Product;
use Mockery\MockInterface;
use Tests\TestCase;

class FeatureTest extends TestCase
{
    public function test_product_price_can_be_converted()
    {
        $this->mock(ExchangeRateProvider::class, function (MockInterface $mock) {
            $mock->shouldReceive('getExchangeRate')->andReturn(new ExchangeRate(2));
        });

        $product = new Product('Produkt test', new Price(10, new Currency('CZK', 'Kč')));
        $convertedPrice = $product->getConvertedPrice(new Currency('EUR', '€'));

        $this->assertEquals(20, $convertedPrice->getValue());
    }
}
