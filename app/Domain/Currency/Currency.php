<?php
declare(strict_types = 1);

namespace App\Domain\Currency;


/**
 * Value Object
 */
final class Currency
{
    private string $code;
    private string $sign;

    /**
     * Currency constructor.
     */
    public function __construct(string $code, string $sign)
    {
        $code = strtoupper($code);

        if (strlen($code) !== 3 || !ctype_alpha($code)) {
            throw new \InvalidArgumentException("Currency must have 3 letters.");
        }

        $this->code = $code;
        $this->sign = $sign;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }
}
