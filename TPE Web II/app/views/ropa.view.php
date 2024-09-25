<?php
class RopaView
{
    public function showHome($prendas)
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

    public function showError($error) {
        require 'templates/error.phtml';
    }
}
