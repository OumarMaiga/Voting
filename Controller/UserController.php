<?php

    namespace Controller;

    use Model\User;

    class UserController {

        private $db;
        private $user;
        
        public function __construct($db) {
            $this->db = $db;
            $this->user = new User($this->db);
        }
    
        public function getUser() {
            
        }

        
    }