<?php
require_once 'app/models/categorias.model.php';
require_once 'app/views/categorias.view.php';

class CategoriasController
{

    private $model;
    private $view;



    function __construct()
    {
        $this->model = new obtenercategorias();
        $this->view = new CategoriasVista();
    }
    function mostrarcategorias()
    {
        //obteiene las categorias.

        $categorias = $this->model->obtenercategorias();
        $this->view->mostrarcategorias($categorias);

    }
    function productosxcategorias($id)
    {

        $productos = $this->model->productosxcategorias($id);
        $this->view->productosxcategorias($productos);


    }

    function agregarcategorias()
    {
<<<<<<< HEAD
        $nombre = $_POST['nombre'];
        
=======



        $nombre = $_POST['nombre'];
        



>>>>>>> 5a12f6d3f1132e490c1f52f377d1e25517b8fc44
        if (empty($nombre) ) {
            echo "no estan todos los datos";
        } else {
            $this->model->agregarcategorias($nombre);
            header("Location:" . BASE_URL . "agregarcategorias");

        }





    }
    function vercategoriasagregadas()
    {

        $categorias = $this->model->obtenercategorias();

        $this->view->agregarcategorias($categorias);
    }

    function editarcategorias($id)
    {
        $nombre = $_POST['nombre'];
<<<<<<< HEAD
    
        if (empty($nombre) ) {
            echo "no estan todos los datos";
        } else {
            $this->model->editarcategorias($nombre, $id);
            header("Location:" . BASE_URL . "home");
=======




        if (empty($nombre)) {
            echo "no estan todos los datos";
        } else {
            $this->model->editarcategorias($nombre,$id);
            header("Location:" . BASE_URL . "agregarcategorias");
>>>>>>> 5a12f6d3f1132e490c1f52f377d1e25517b8fc44

        }
    }

<<<<<<< HEAD
    function borrarcategoria($id)
    {
        $this->model->borrarcategoria($id);
        header("Location:" . BASE_URL . "agregarcategorias");
=======

    function borrarcategorias($id)
    {

        $this->model->borrarcategoria($id);
        header("Location:" . BASE_URL . "agregarcategorias");

>>>>>>> 5a12f6d3f1132e490c1f52f377d1e25517b8fc44
    }


}
