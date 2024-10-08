<?php

require_once 'app/models/ropa.model.php';
require_once 'app/views/ropa.view.php';

class RopaController
{
    private $model;
    private $view;
    private $modelCategoria;

    public function __construct()
    {
        $this->model = new RopaModel();
        $this->view = new RopaView();
        $this->modelCategoria = new obtenercategorias();
    }

    //METODOS

    public function showHome()
    {

        $prendas = $this->model->getPrendas();
        $categorias = $this->modelCategoria->obtenercategorias();

        //$this->view->addarticulo($prendas, $categorias);
        $this->view->showHome($prendas, $categorias);
    }

    public function adminArticulos()
    {
        $prendas = $this->model->getPrendas();
        $categorias = $this->modelCategoria->obtenercategorias();

        $this->view->adminArticulos($prendas, $categorias);
    }

    public function showProduct($id)
    {
        $prenda = $this->model->getPrenda($id); // devuelve una única prenda
        $categorias = $this->modelCategoria->obtenercategorias();

        $this->view->showProduct($prenda, $categorias); // Pasa la primera (y única) prenda
    }

    public function agregararticulo()
    {
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $descripcion = $_POST['descripcion'];
        $ID_categoria = $_POST['categoria']; // Obtén la categoría seleccionada

        if (empty($nombre) || empty($valor) || empty($descripcion) || empty($ID_categoria)) {
            echo "no están todos los datos";
        } else {
            $this->model->agregararticulo($nombre, $valor, $descripcion, $ID_categoria);
            header("Location:" . BASE_URL . "home");
        }
    }

    public function eliminarArticulo($id)
    {
        // obtengo la tarea por id
        $prenda = $this->model->getPrenda($id);

        if (!$prenda) {
            return $this->view->showError("No existe la tarea con el id= $id");
        }

        // borro la tarea y redirijo
        $this->model->eliminarPrenda($id);

        header('Location: ' . BASE_URL);
    }

    function mostrarFormEdicion($id)
    {
        $prenda =  $this->model->getPrenda($id);
        $categorias = $this->modelCategoria->obtenercategorias();
        $this->view->editarArticulo($prenda, $categorias);
    }

    function editarArticulo($id)
    {
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $descripcion = $_POST['descripcion'];
        $ID_categoria = $_POST['categoria']; // Obtén la categoría seleccionada del formulario

        if (empty($nombre) || empty($valor) || empty($descripcion) || empty($ID_categoria)) {
            echo "Todos los campos son obligatorios.";
        } else if ($valor < 0) {
            echo "El valor tiene que ser positivo";
        } else {
            // Asegúrate de que la categoría también se actualice en la base de datos
            $this->model->editarArticulo($nombre, $valor, $descripcion, $ID_categoria, $id);

            header("Location: " . BASE_URL . "home");
        }
    }


    public function showAbout()
    {
        $this->view->showAbout();
    }

    public function mostrarError($error)
    {
        $this->view->showError($error);
    }
}
