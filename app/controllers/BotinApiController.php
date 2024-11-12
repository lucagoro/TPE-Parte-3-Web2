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
        if(isset($req->query->orderBy))
        $orderBy = $req->query->orderBy;

        $botines = $this->model->getBotines($orderBy);
        return $this->view->response($botines);
    }

    function edit($req, $res) {
        $id = $req->params->id; // ver si va id u otro nombre
        $botin = $this->model->getBotin($id);

        if(!$botin)
            return $this->view->response("No existe el botin con id=$id.", 404);

        if(empty($req->body->modelo) || empty($req->body->talle) || empty($req->body->precio) || 
            empty($req->body->gama) || empty($req->body->id_marca)) { // ver si va id_marca u otro nombre
                return $this->view->response("Faltan completar campos!", 400);
            }
            //
            // REVISAR TODO ESTO, LOS NOMBRES Y EL ORDEN
            //
            $modelo = $req->body->modelo;
        $talle = $req->body->talle;
        $precio = $req->body->precio;
        $gama = $req->body->gama;
        $id_marca = $req->body->id_marca;

        $this->model->editBotin($modelo, $talle, $precio, $gama, $id_marca, $id);

        $botin = $this->model->getBotin($id);

        $this->view->response($botin);
    }

}