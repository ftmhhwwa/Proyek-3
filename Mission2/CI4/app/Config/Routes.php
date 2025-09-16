<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/hello', 'Hello::index');
$routes->get('/mhs-static', 'Mahasiswa::staticTable');
$routes->get('/mhs-loop', 'Mahasiswa::loopTable');
