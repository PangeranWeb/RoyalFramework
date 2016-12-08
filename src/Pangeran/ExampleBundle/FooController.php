<?php

namespace Pangeran\ExampleBundle;

use Pangeran\MainController;
use Application\Container;

class FooController
{
    public function foo($request, $response, $agrs)
    {
        $container = new Container;
        $plates = $container->getPlates();        

        $html = $plates->render('hello');
        $response->getBody()->write($html);
        $response->withStatus(200);
        $response->withHeader(
            'Content-Type',
            'application/json'
        );

        return $response;
    }
}
