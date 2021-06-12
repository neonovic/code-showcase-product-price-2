<?php
declare(strict_types = 1);

namespace App\Domain\Price;


class PriceFormatter
{
    /**
     * @param Price $price
     * @param string $signSpacing
     * @return string
     */
    public static function doubleDecimal(Price $price, string $signSpacing = ' '): string
    {
        return number_format($price->getFloatValue(), 2, '.', '') . $signSpacing . $price->getCurrency()->getSign();
    }

    /**
     * @param Price $price
     * @param string $signSpacing
     * @return string
     */
    public static function doubleDecimalBeginWithSign(Price $price, string $signSpacing = ''): string
    {
        return $price->getCurrency()->getSign() . $signSpacing .  number_format($price->getFloatValue(), 2, '.', '');
    }
}
