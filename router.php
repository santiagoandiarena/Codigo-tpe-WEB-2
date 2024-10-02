<?php

require_once 'app/controllers/ropa.controller.php';
require_once 'app/controllers/categorias.controller.php';

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

    case 'categorias':
        $controller = new CategoriasController();
        $controller->mostrarcategorias();
        break;

    case 'productosxcategorias':
        $controller = new CategoriasController();
        $controller->productosxcategorias($params[1]);
        break;
    case 'addarticulo':
        $controller = new RopaController();
        $controller->agregararticulo();
    case 'eliminarArticulo':
        $controller = new RopaController();
        $controller->eliminarArticulo($params[1]);
    case 'addcategorias':
        $controller = new CategoriasController();
        $controller->agregarcategorias();
        break;
    case 'agregarcategorias':
        $controller = new CategoriasController();
        $controller->vercategoriasagregadas();
        break;
    case 'editarcategorias':
        $controller = new CategoriasController();
        $controller->editarcategorias($params[1]);
        break;
    case 'categoriaseditadas':
        $controller = new CategoriasController();
        $controller->categoriaseditadas();
        break;
    default:
        echo "404 Page Not Found"; // está mal
        break;
}
