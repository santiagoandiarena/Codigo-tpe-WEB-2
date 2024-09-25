<?php

class RopaModel{
    private $db;

    public function __construct(){
        $this->db = new  PDO('mysql:host=localhost;dbname=g84_db_tiendaropa;charset=utf8', 'root', '');
    }

    //METODOS

    public  function getPrendas(){
        $query = $this->db->prepare('SELECT * FROM articulo');
        $query->execute();

        $prendas = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $prendas;
    }

    public  function getPrenda($id){
        $query = $this->db->prepare('SELECT * FROM articulo WHERE ID_articulo = ?');
        $query->execute([$id]);

        $prenda = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $prenda;
    }

}