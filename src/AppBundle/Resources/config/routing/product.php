<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('product_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Product:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('product_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Product:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('product_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Product:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('product_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Product:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('product_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Product:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
