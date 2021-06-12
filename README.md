This is my latest spin-off for the job proposition task to make code for a product with price, changing exchage rates and different ouput formatting.

This is inside the Laravel framework and to see my code is best to check this commit: https://github.com/neonovic/code-showcase-product-price-2/commit/abc80097a34d32ec2c8b0a1e887e6278d0b0ef3a

I am using Value Objects for everything possible, which brings typed properties into the system.
Value Objects (Price, Currency, Exchange Rate) are implementing validation rules.

ExchangeRateProviders and CurrencyProviders are very simple versions of data sources that usually come from DB/Api.
