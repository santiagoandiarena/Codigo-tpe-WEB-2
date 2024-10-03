<?php
class RopaView
{
    public function showHome($prendas, $categorias)
    {
        $count = count($prendas);

        require 'templates/mostrar_productos.phtml';
    }

    public function showAbout()
    {
        
        require  'templates/mostrar_nosotros.phtml';

    }

    public function showProduct($prenda)
    {
        require 'templates/mostrar_producto.phtml';

    }

<<<<<<< HEAD
    public function addarticulo($articulo, $categorias){
        require 'templates/mostrar_productos.phtml';
    }

    public function editarArticulo($prenda){
        require 'templates/editar_articulo.phtml';
    }
    
=======
>>>>>>> 5a12f6d3f1132e490c1f52f377d1e25517b8fc44
    public function showError($error) {
        require 'templates/error.phtml';
    }
}
