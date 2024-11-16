<?php

class BotinModel {
    private $db;

    function __construct() {
        $this->db = $this->getConnection();
    }

    function getConnection() {
        return new PDO('mysql:host=localhost;dbname=marcas_botines;charset=utf8', 'root', '');
    }

    function getBotines($orderBy = false, $offset = 0, $limit = 0) {
        $sql = 'SELECT * FROM botines';

        if($orderBy) {
            switch($orderBy) {
                case 'modelo':
                    $sql .= ' ORDER BY modelo';
                    break;
                case 'color':
                    $sql .= ' ORDER BY color';
                    break;
                case 'talle':
                    $sql .= ' ORDER BY talle';
                    break;
                case 'gama':
                    $sql .= ' ORDER BY gama';
                    break;
                case 'precio':
                    $sql .= ' ORDER BY precio';
                    break;
                case 'marca': // ver si va id_marca
                    $sql .= ' ORDER BY id_marca';
                    break; 
            }
        }

        if($limit > 0) {
            $sql .= ' LIMIT :limit OFFSET :offset';
        }

        $query = $this->db->prepare($sql);

        if ($limit > 0) {
            $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
            $query->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        }
        
        $query->execute();
        $botines = $query->fetchAll(PDO::FETCH_OBJ);
        return $botines;
    }

    public function getBotin($id) {    
        $query = $this->db->prepare('SELECT * FROM botines WHERE id_botin = ?');
        $query->execute([$id]);   
        $botin = $query->fetch(PDO::FETCH_OBJ);
        return $botin;
    }

    function editBotin($id, $modelo, $color, $talle, $gama, $precio, $id_marca) {
        $query = $this->db->prepare('UPDATE botines SET modelo = ?, color = ?, talle = ?, gama = ?, precio = ?, id_marca = ? WHERE id_botin = ?');
        $query->execute([$modelo, $color, $talle, $gama, $precio, $id_marca, $id]);
    }
    
    function insert($modelo, $color, $talle, $gama, $precio, $id_marca){
        $query = $this->db->prepare('INSERT INTO botines(modelo, color, talle, gama, precio, id_marca) VALUES(?,?,?,?,?,?)');
        $query->execute([$modelo, $color, $talle, $gama, $precio, $id_marca]);

        return $this->db->lastInsertId();
    }
    
}