<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Domain\Currency\CurrencyProvider;
use App\Domain\Price\Price;
use App\Domain\Price\PriceFormatter;
use App\Domain\Product\Product;

class MainController extends Controller
{
    public function __invoke(CurrencyProvider $currencyProvider)
    {
        $product = new Product('Produkt 1', new Price(1000, $currencyProvider->get('CZK')));

        dump(PriceFormatter::doubleDecimal($product->price));
        dump(PriceFormatter::doubleDecimalBeginWithSign($product->getConvertedPrice($currencyProvider->get('EUR'))));
        dump(PriceFormatter::doubleDecimalBeginWithSign($product->getConvertedPrice($currencyProvider->get('USD'))));

        $product2 = new Product('Produkt 2', new Price(1330, $currencyProvider->get('EUR')));
        dump(PriceFormatter::doubleDecimalBeginWithSign($product2->price));
    }
}
