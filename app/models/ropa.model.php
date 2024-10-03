<?php

class RopaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=g84_db_tiendaropa;charset=utf8', 'root', '');
    }

    //METODOS

    public function getPrendas()
    {
        $query = $this->db->prepare('SELECT * FROM articulo');
        $query->execute();

        $prendas = $query->fetchAll(PDO::FETCH_OBJ);

        return $prendas;
    }


    public function getPrenda($id)
    {
        $query = $this->db->prepare('SELECT * FROM articulo WHERE ID_articulo = ?');
        $query->execute([$id]);

        $prenda = $query->fetch(PDO::FETCH_OBJ);

        return $prenda;
    }

<<<<<<< HEAD
    public function eliminarPrenda($id){
        $query = $this->db->prepare('DELETE FROM articulo WHERE ID_articulo = ?');
        $query->execute([$id]);
    }

    function agregararticulo($nombre, $valor, $descripcion, $id) {
        $query = $this->db->prepare('INSERT INTO articulo (nombre, valor, descripcion, ID_categoria) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $valor, $descripcion, $id]); 
    
        return $this->db->lastInsertId();
    }
    
    public function editarArticulo($nombre, $valor, $descripcion, $id){
        $query = $this->db->prepare("UPDATE articulo SET nombre = ?, valor = ?, descripcion = ? WHERE ID_articulo = ?");
        $query->execute([$nombre, $valor, $descripcion,  $id]);

    }
}
=======
}
>>>>>>> 5a12f6d3f1132e490c1f52f377d1e25517b8fc44
