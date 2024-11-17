<?php

class UserModel {
    private $db;

    function __construct() {
        $this->db = $this->getConnection();
    }

    function getConnection() {
        return new PDO('mysql:host=localhost;dbname=marcas_botines;charset=utf8', 'root', '');
    }
 
    function getUserByUsuario($usuario) {    
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $query->execute([$usuario]);
    
        $usuario = $query->fetch(PDO::FETCH_OBJ);
    
        return $usuario;
    }
}
