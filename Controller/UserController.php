<?php

    namespace Controller;

    use Model\User;

    class UserController {

        private $user;
        
        public function __construct() {
            $this->user = new User;
        }
    
        public function getUser() {
            
        }

        
    }