<?php 

    namespace Controller;

    use Model\Auth;
    use Model\User;

    class PageController {
        
        private $db;

        private $auth;
        private $user;
        
        public function __construct($db) {
            $this->db = $db;
            $this->auth = new Auth($this->db);
            $this->user = new User($this->db);
        }

        public function accueil() {
            require('View/page/accueil.php');
        }        
    }