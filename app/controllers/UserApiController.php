<?php

    require_once "app/models/userModel.php";
    require_once "app/views/jsonView.php";
    require_once "libs/jwt.php";

    class UserApiController {
        private $model;
        private $view;

        public function __construct() {
            $this->model = new UserModel();
            $this->view = new JSONView();
        }

        function getToken() {
            $auth_header = $_SERVER['HTTP_AUTHORIZATION'];
            $auth_header = explode(' ', $auth_header);
            if(count($auth_header) != 2) {
                return $this->view->response("Error en los datos ingresados", 400);
            }
            if($auth_header[0] != 'Basic') {
                return $this->view->response("Error en los datos ingresados", 400);
            }
            $user_pass = base64_decode($auth_header[1]);
            $user_pass = explode(':', $user_pass); 
            
            $user = $this->model->getUserByUsuario($user_pass[0]);
            
            if($user == null || !password_verify($user_pass[1], $user->contraseña)) {
                return $this->view->response("Error en los datos ingresados", 400);
            }
            
            $token = createJWT(array(
                'sub' => $user->id_usuario,
                'usuario' => $user->usuario,
                'role' => 'admin',
                'iat' => time(),
                'exp' => time() + 60,
                'Saludo' => 'Hola',
            ));
            return $this->view->response($token);
        }
    }
