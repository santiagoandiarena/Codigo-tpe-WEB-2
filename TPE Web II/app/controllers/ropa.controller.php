<?php

require_once 'app/models/ropa.model.php';
require_once 'app/views/ropa.view.php';

class RopaController {
    private $model;
    private $view;

    public function __construct(){
        $this->model = new RopaModel();
        $this->view = new RopaView();
    }

    //METODOS

    public function showHome(){

     // PREGUNTAR COMO SE HACEN LAS VALIDACIONES 
        $prendas = $this->model->getPrendas();

        $this->view->showHome($prendas);

    }

    public function showProduct($id) {
        $prenda = $this->model->getPrenda($id); // devuelve una única prenda
    
        if (!empty($prenda)) {
            $this->view->showProduct($prenda[0]); // Pasa la primera (y única) prenda
        } else {
            echo "Producto no encontrado";
        }
    }
    

    public function showAbout(){

        $this->view->showAbout();

    }
}