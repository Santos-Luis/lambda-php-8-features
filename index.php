<?php

use App\MatchExpressions;
use App\NamedArguments;
use App\NullSafe;
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

    $containerBuilder->addDefinitions([
        UnionTypes::class => create()->constructor(),
        NamedArguments::class => create()->constructor(),
        NullSafe::class => create()->constructor(),
        MatchExpressions::class => create()->constructor(''),
    ]);
    $container = $containerBuilder->build();

    $nullSafe = $container->get(NullSafe::class)::initDefault()->getUnionTypesArg1();
    $matchExpressions = $container->get(MatchExpressions::class)::initDefault();

    return [
        'null_safe' => $nullSafe,
        'match_expressions' => $matchExpressions->match(1),
        'new_string_methods' => $matchExpressions->strNewFunctions('a')
    ];
};
