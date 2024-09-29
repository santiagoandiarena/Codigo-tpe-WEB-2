<?php
require_once 'app/models/categorias.model.php';
require_once 'app/views/categorias.view.php';

class CategoriasController{

    private $model;
    private $view;
    
    
    
    function __construct(){
        $this->model = new obtenercategorias();
        $this->view = new CategoriasVista();
    }
    function mostrarcategorias(){
     //obteiene las categorias.
    
        $categorias = $this->model->obtenercategorias();
        $this->view->mostrarcategorias($categorias);
    
    }
    function productosxcategorias($id){
     
         $productos= $this->model->productosxcategorias($id);
         $this->view->productosxcategorias($productos);


    }
 

    
    

 }
