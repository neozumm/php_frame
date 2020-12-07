<?php

declare(strict_types=1);
namespace Framework;

class RegisterRoutesReciever
{
    public function operation($routeCollection, $containerBuilder, $dir)
    {
        $routeCollection = require $dir . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $containerBuilder->set('route_collection', $this->routeCollection);
        return array($routeCollection, $containerBuilder);
    }
}
