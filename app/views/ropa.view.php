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

    public function showProduct($prenda, $categorias)
    {
        require 'templates/mostrar_producto.phtml';
    }

    public function addarticulo($articulo, $categorias){
        require 'templates/mostrar_productos.phtml';
    }

    public function editarArticulo($prenda,  $categorias){

        require 'templates/editar_articulo.phtml';
    }
    
    public function adminArticulos($prendas, $categorias){
        require 'templates/admin_articulos.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}
?>
