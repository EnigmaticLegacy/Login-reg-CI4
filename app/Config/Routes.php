<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->get('/logout','AuthController::logout');
$routes->get('/logoutView','AuthController::logout_view');
$routes->get('/login','AuthController::login');
$routes->get('/content','AuthController::content');
$routes->get('/register','AuthController::register');
$routes->post('/login','AuthController::authenticate');
$routes->post('/register','AuthController::register_user');
