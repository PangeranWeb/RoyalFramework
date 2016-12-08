<?php

$app->get('/', function($request, $response, $agrs) {
    $controller = new Pangeran\ExampleBundle\FooController;
    return $controller->foo($request, $response, $agrs);
});