<?php

use App\UnionTypes;
use DI\ContainerBuilder;
use function DI\create;

require __DIR__.'/vendor/autoload.php';

return static function (array $event) {
    $containerBuilder = new ContainerBuilder();
    $containerBuilder->useAutowiring(false);
    $containerBuilder->useAnnotations(false);

    $record = $event['Records'][0];
    $body = json_decode($record['body'], true, 512, JSON_THROW_ON_ERROR);
    $arg1 = $body['arg1'];
    $arg2 = (int)$body['arg2'];

    $containerBuilder->addDefinitions([UnionTypes::class => create()->constructor($arg1, $arg2)]);
    $container = $containerBuilder->build();

    return $container->get(UnionTypes::class)->getArgs();
};
