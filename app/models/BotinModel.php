<?php

class BotinModel {
    private $db;

    function __construct() {
        $this->db = $this->getConnection();
    }

    function getConnection() {
        return new PDO('');
    }

    function getBotines($orderBy = false) {
        $sql = 'SELECT * FROM botines';

        if($orderBy) {
            switch($orderBy) { // TERMINAR ESTO --- VAN TODOS LOS CAMPOS
                case 'talle':
                    $sql .= 'ORDER BY talle';
                    break;
                case 'precio':
                    $sql .= 'ORDER BY precio';
                    break; 
            }
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        $botines = $query->fetchAll(PDO::FETCH_OBJ);
        return $botines;
    }

    function getBotin($id) {
        // tomi
    }

    function editBotin($modelo, $talle, $precio, $gama, $id_marca, $id) { // VER NOMBRES Y ORDEN ACÁ TAMBIEN
        $query = $this->db->prepare('UPDATE botines SET modelo = ?, talle = ?, precio = ?, gama = ? id_marca = ? WHERE id = ?');
        $query->execute([$modelo, $talle, $precio, $gama, $id_marca, $id]);
    }

    
}