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

        $query = $db->prepare('SELECT ID_categoria, nombre 
FROM categoria 
GROUP BY nombre');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;

    }


    
    function obteneridcategorias(){

        $query = $this->db->prepare('SELECT ID_categoria FROM categoria');
        $query->execute();
        $categoriasxid = $query->fetch(PDO::FETCH_OBJ);
        
        return $categoriasxid;
    }
    function productosxcategorias($id)
    {
        $db = $this->connect();


        $query = $db->prepare('  SELECT *
        FROM articulo
        JOIN categoria ON articulo.ID_categoria = categoria.ID_categoria
        WHERE categoria.ID_categoria = ?  ');

        $query->execute([$id]);

        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }

    function agregarcategorias($nombre, $genero, $temporada, $marca)
    {
        $this->db = $this->connect();
        $query = $this->db->prepare('INSERT INTO categoria (nombre, genero, temporada, marca) VALUES (?,?,?,?)');
        $query->execute([$nombre, $genero, $temporada, $marca]);

        return $this->db->lastInsertId();//me da el nuevo id ingresado
    }

    public function editarcategorias($nombre,$ID_categoria)
    {
        $this->db = $this->connect();
        $query = $this->db->prepare('UPDATE categoria SET nombre = ? WHERE ID_categoria = ?');
        $query->execute([$nombre,$ID_categoria]);
    }
}