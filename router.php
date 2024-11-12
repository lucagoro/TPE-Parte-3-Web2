<?php
require_once "app/libs/router.php";
require_once "app/controllers/BotinApiController.php";

$router = new Router();

$router->addRoute('botines', 'GET', 'BotinApiController', 'getAll');
$router->addRoute('botines/:id', 'PUT', 'BotinApiController', 'edit');



$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);