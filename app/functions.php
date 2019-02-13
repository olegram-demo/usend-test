<?php

use App\Legacy\Logger;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Support\Carbon;
use Money\Converter;
use Money\MoneyFormatter;

/**
 * @return Container
 */
function app(): Container
{
    return Container::getInstance();
}

/**
 * @return Generator
 */
function faker(): Generator
{
    return app()->make(Generator::class);
}

/**
 * @return MoneyFormatter
 */
function money_formatter(): MoneyFormatter
{
    return app()->make(MoneyFormatter::class);
}

/**
 * @return Converter
 */
function money_converter(): Converter
{
    return app()->make(Converter::class);
}

function log_send(string $message): void
{
    /** @var Logger $logger */
    $logger = app()->make(\App\Legacy\Logger::class);

    $logger->log($message);
}

/**
 * @return Carbon
 */
function now(): Carbon
{
    return Carbon::now();
}