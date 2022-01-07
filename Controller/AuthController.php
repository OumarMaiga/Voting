<?php 

    namespace Controller;

    use Model\Auth;
    use Model\User;

    class AuthController {
        
        private $db;
        
        public function __construct($db) {
            $this->db = $db;
        }

        public function login() {
            require('View/auth/login.php');
        }
        
    }