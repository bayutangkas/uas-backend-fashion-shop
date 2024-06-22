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

$router->register('GET', '/api/user', [$usersController, 'readUsers']);
$router->register('POST', '/api/user', [$usersController, 'addUser']);
$router->register('PUT', '/api/user', [$usersController, 'updateUser']);
$router->register('DELETE', '/api/user', [$usersController, 'deleteUser']);

$router->register('GET', '/api/product', [$productController, 'readProducts']);
$router->register('POST', '/api/product', [$productController, 'addProduct']);
$router->register('PUT', '/api/product', [$productController, 'updateProduct']);
$router->register('DELETE', '/api/product', [$productController, 'deleteProduct']);

$router->register('GET', '/api/category', [$categoryController, 'readCategories']);
$router->register('POST', '/api/category', [$categoryController, 'addCategory']);
$router->register('PUT', '/api/category', [$categoryController, 'updateCategory']);
$router->register('DELETE', '/api/category', [$categoryController, 'deleteCategory']);

$router->register('GET', '/api/order', [$orderController, 'readOrders']);
$router->register('POST', '/api/order', [$orderController, 'addOrder']);
$router->register('PUT', '/api/order', [$orderController, 'updateOrder']);
$router->register('DELETE', '/api/order', [$orderController, 'deleteOrder']);