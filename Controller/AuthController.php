<?php 

    namespace Controller;

    use Model\Auth;
    use Model\User;

    class AuthController {
        
        private $auth;
        
        public function __construct() {
            $this->auth = new Auth;
        }

        public function login() {
            require('View/auth/login.php');
        }

        public function signIn() {
            if((isset($_POST['login']) && $_POST['login'] != "") && (isset($_POST['password']) && $_POST['password'] != "")) {
                $inputs = array($_POST['login'], $_POST['password']);
                $this->user->authenticate($inputs);
            }
        }
        
    }