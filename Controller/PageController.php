<?php 

    namespace Controller;

    use Model\Auth;
    use Model\User;

    class PageController {
        
        private $auth;
        private $user;
        
        public function __construct() {
            $this->auth = new Auth;
            $this->user = new User;
        }

        public function accueil() {
            require('View/page/accueil.php');
        }        
    }