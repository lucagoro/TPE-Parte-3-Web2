<?php
class Request {
    public $body = null;
    public $params = null;
    public $query = null;

    function __construct() {
        try {
            // lee el body de la request
            $this->body = json_decode(file_get_contents('php://input'), true);


        }catch(Exception $e) {
            $this->body = null;
        }
        $this->query = (object) $_GET;
    }
}