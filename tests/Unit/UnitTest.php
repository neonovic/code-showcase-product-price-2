<?php
declare(strict_types = 1);

namespace Tests\Unit;

use App\Domain\Currency\Currency;
use App\Domain\Exchange\ExchangeRate;
use App\Domain\Price\Price;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    /**
     * Working only with strict_types declaration
     */
    public function test_price_cannot_be_type_of_float()
    {
        $this->expectException(\TypeError::class);

        new Price(100.5, new Currency('CZK', 'Kč'));
    }

    public function test_price_cannot_have_minus_value()
    {
        $this->expectException(\InvalidArgumentException::class);

        new Price(-1, new Currency('CZK', 'Kč'));
    }

    public function test_currency_code_cannot_have_length_greater_than_3()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Currency('CZKK', 'Kč');
    }

    public function test_currency_code_cannot_have_length_lower_than_3()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Currency('CZ', 'Kč');
    }

    public function test_currency_code_cannot_contain_other_than_alphabet()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Currency('CZ1', 'Kč');
    }

    public function test_exchange_rate_cannot_be_0()
    {
        $this->expectException(\InvalidArgumentException::class);
        new ExchangeRate(0);
    }

    public function test_exchange_rate_cannot_be_lower_than_0()
    {
        $this->expectException(\InvalidArgumentException::class);
        new ExchangeRate(-5);
    }
}
