<?php
include_once 'controllers/UsersController.php';
include_once 'config/database.php'; 
include_once 'middleware/Router.php';

$database = new Database();
$db = $database->getConnection();
$router = new Router();
$usersController = new UsersController($db);

$router->register('GET', '/api/user', [$usersController, 'readUsers']);
$router->register('POST', '/api/user', [$usersController, 'createUsers']);
$router->register('PUT', '/api/user', [$usersController, 'updateUsers']);
$router->register('DELETE', '/api/user', [$usersController, 'deleteUsers']);




$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));