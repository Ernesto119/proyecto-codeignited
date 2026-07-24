<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Clients::index');
$routes->get('/clients', 'Clients::index');
$routes->get('/clients/add', 'Clients::create');
$routes->post('/clients/store', 'Clients::store');
$routes->get('/clients/edit/(:num)', 'Clients::edit/$1');
$routes->post('/clients/update', 'Clients::update');
$routes->get('/clients/delete/(:num)', 'Clients::delete/$1');
