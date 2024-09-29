<?php
class obtenercategorias
{
    function connect()
    {
        $db = new PDO('mysql:host=localhost;' . 'dbname=g84_db_tiendaropa;charset=utf8', 'root', '');
        return $db;
    }

    function obtenercategorias()
    {
        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM categoria');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;

    }
    function productosxcategorias($id)
    {
        $db = $this->connect();


        $query = $db->prepare('SELECT *
FROM articulo
JOIN categoria ON articulo.ID_categoria = categoria.ID_categoria
WHERE categoria.ID_categoria = ?  ');

        $query->execute([$id]);

        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }


}