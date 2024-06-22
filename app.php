<?php
include_once 'controllers/UsersController.php';
include_once 'controllers/ProductController.php';
include_once 'controllers/CategoryController.php';
include_once 'controllers/OrderController.php';
include_once 'config/database.php';
include_once 'middleware/Router.php';

$database = new Database();
$db = $database->getConnection();
$router = new Router();

$usersController = new UsersController($db);
$productController = new ProductController($db);
$categoryController = new CategoryController($db);
$orderController = new OrderController($db);