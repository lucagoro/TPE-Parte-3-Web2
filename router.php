<?php
require_once "libs/router.php";
require_once "app/controllers/BotinApiController.php";
require_once "app/controllers/UserApiController.php";
require_once "app/middlewares/jwtAuthMiddleware.php";

$router = new Router();
$router->addMiddleware(new JWTAuthMiddleware());

$router->addRoute('botines', 'GET', 'BotinApiController', 'getAll');
$router->addRoute('botines/:id', 'PUT', 'BotinApiController', 'edit');
$router->addRoute('botines/:id', 'GET', 'BotinApiController', 'getById');
$router->addRoute('botines', 'POST', 'BotinApiController', 'add');

$router->addRoute('usuarios/token', 'GET', 'UserApiController', 'getToken');



$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);




