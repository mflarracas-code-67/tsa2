<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public pages
$routes->get('/', 'Pages::home');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Pages::profile');
$routes->get('about', 'Pages::about');

// Authentication
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

// Protected task actions
$routes->get('tasks/new', 'Tasks::newTask', ['filter' => 'auth']);
$routes->post('tasks/create', 'Tasks::create', ['filter' => 'auth']);

$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1', ['filter' => 'auth']);
$routes->post('tasks/update/(:num)', 'Tasks::update/$1', ['filter' => 'auth']);

$routes->post('tasks/delete/(:num)', 'Tasks::delete/$1', ['filter' => 'auth']);