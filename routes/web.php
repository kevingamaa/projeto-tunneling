<?php

$app->router->get('', 'HomeController', 'index');
$app->router->get('home', 'HomeController', 'index');

$app->router->get('login', 'AuthController', 'login');
$app->router->post('login', 'AuthController', 'authenticate');

$app->router->get('register', 'AuthController', 'register');
$app->router->post('register', 'AuthController', 'create');
$app->router->delete('logout', 'AuthController', 'logout');


$app->router->get('tickets', 'TicketController', 'index')->middleware('AuthMiddleware');
$app->router->get('tickets/new', 'TicketController', 'create')->middleware('AuthMiddleware');
$app->router->post('tickets', 'TicketController', 'store')->middleware('AuthMiddleware');
$app->router->get('tickets/edit/{id}', 'TicketController', 'edit')->middleware('AuthMiddleware');
$app->router->put('tickets/{id}', 'TicketController', 'update')->middleware('AuthMiddleware');
$app->router->delete('tickets/{id}', 'TicketController', 'destroy')->middleware('AuthMiddleware');



