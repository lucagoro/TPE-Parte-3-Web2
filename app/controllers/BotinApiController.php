<?php
require_once "app/models/BotinModel.php";
require_once "app/views/jsonView.php";

class BotinApiController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new BotinModel();
        $this->view = new JSONView();
    }

    function getAll($req, $res) {

        $orderBy = false;
        $page = 0;
        $size = 0;

        if(isset($req->query->orderBy))
        $orderBy = $req->query->orderBy;

        if(isset($req->query->page))
        $page = max(1, $req->query->page); // la funcion max() hace q el numero minimo sea 1

        if(isset($req->query->size))
        $size = max(1, $req->query->size);

        $offset = ($page - 1) * $size;

        $botines = $this->model->getBotines($orderBy, $offset, $size);
        return $this->view->response($botines);
    }

    function edit($req, $res) {
        $id = $req->params->id; 
        $botin = $this->model->getBotin($id);

        if(!$botin)
            return $this->view->response("No existe el botin con id=$id.", 404);

        if(empty($req->body->modelo) || empty($req->body->color) || empty($req->body->talle) || empty($req->body->gama) || 
            empty($req->body->precio) || empty($req->body->id_marca)) {
                return $this->view->response("Faltan completar campos!", 400);
            }
            
        $modelo = $req->body->modelo;
        $color = $req->body->color;
        $talle = $req->body->talle;
        $gama = $req->body->gama;
        $precio = $req->body->precio;
        $id_marca = $req->body->id_marca;

        $this->model->editBotin($id, $modelo, $color, $talle, $gama, $precio, $id_marca);

        $botin = $this->model->getBotin($id);

        $this->view->response($botin);

    }
    function getById($req, $res) {
        $id = $req->params->id;
        $botin = $this->model->getBotin($id);
    
        if (!$botin) {
            $this->view->response("No existe botin con ese ID", 404);
        } else{
            return $this->view->response($botin, 200);
        }
    }
    function add($req, $res){
        $modelo = $req->body->modelo;
        $color = $req->body->color;
        $talle = $req->body->talle;
        $gama = $req->body->gama;
        $precio = $req->body->precio;
        $id_marca = $req->body->id_marca;

        if(empty($modelo) || empty($color) || empty($talle) || empty($gama) || empty($precio) || empty($id_marca)){
            $this->view->response('Faltan completar datos.', 400);
        }

        $botinAdd = $this->model->insert($modelo, $color, $talle, $gama, $precio, $id_marca);

        if($botinAdd){
            $botin = $this->model->getBotin($botinAdd);
            return $this->view->response($botin, 201);
        }else{
            return $this->view->response('Error al insertar el botin.', 500);
        }
    }
    
}