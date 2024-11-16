<?php
require_once "app/libs/router.php";
require_once "app/controllers/BotinApiController.php";

$router = new Router();

$router->addRoute('botines', 'GET', 'BotinApiController', 'getAll');
$router->addRoute('botines/:id', 'PUT', 'BotinApiController', 'edit');
$router->addRoute('botines/:id', 'GET', 'BotinApiController', 'getById');
$router->addRoute('botines', 'POST', 'BotinApiController', 'add');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
