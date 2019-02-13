<?php

use App\Repositories\CacheRepository;
use App\Repositories\DbRepository;
use App\Repositories\RepositoryInterface;
use Klein\Klein;
use Klein\Request;
use Klein\Response;
use Klein\ServiceProvider;
use Money\Currency;

require __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/bootstrap.php';

$router = new Klein();

$router->respond('GET', '/', function (Request $request, Response $response, ServiceProvider $service) {
    $service->validateParam('id')->isInt();
    $service->validateParam('from')->isRegex('/^(Mysql|Daemon)$/');

    $map = [
        'Mysql' => DbRepository::class,
        'Daemon' => CacheRepository::class,
    ];

    /** @var RepositoryInterface $repository */
    $repository = new $map[$request->param('from')]();
    $ad = $repository->find($request->param('id'));

    $convertedPrice = money_converter()->convert($ad->getPrice(), new Currency('RUB'));
    $convertedPriceFormatted = money_formatter()->format($convertedPrice);

    return "<h1>{$ad->getName()}</h1><p>{$ad->getText()}</p><p>стоимость: $convertedPriceFormatted руб</p>";
});

$router->dispatch();
