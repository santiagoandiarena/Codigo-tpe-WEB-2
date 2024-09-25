<?php

require_once 'app/controllers/ropa.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new RopaController();
        $controller->showHome();
        break;
    case 'producto':
        $controller = new RopaController();
        $controller->showProduct($params[1]);
        break;
    case 'about':
        $controller = new RopaController();
        $controller->showAbout();
        break;
    default:
        echo "404 Page Not Found"; // está mal
        break;
}
