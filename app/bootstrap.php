<?php

use App\Legacy\Logger;
use App\Loggers\SimpleFileLogger;
use Dotenv\Dotenv;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Container\Container;
use Money\Converter;
use Money\Currencies\ISOCurrencies;
use Money\Exchange\FixedExchange;
use Money\Formatter\DecimalMoneyFormatter;
use Money\MoneyFormatter;

Dotenv::create(__DIR__.'/../')->load();

$app = Container::getInstance();

$app->singleton(Generator::class, function () {
    return Factory::create(env('LOCALE', 'ru_RU'));
});

$app->bind(MoneyFormatter::class, function () {
    return new DecimalMoneyFormatter(new ISOCurrencies());
});

$app->singleton(Converter::class, function () {
    // You can put data from another source here
    $exchange = new FixedExchange([
       'USD' => [
           'RUB' => 30,
       ]
   ]);

   return new Converter(new ISOCurrencies(), $exchange);
});

$app->singleton(Logger::class, function () {
    return new SimpleFileLogger(__DIR__.'/../log');
});
