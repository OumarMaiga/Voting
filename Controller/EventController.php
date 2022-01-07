<?php 

    namespace Controller;

    use Model\Auth;
    use Model\User;

    class EventController {
        
        private $db;

        private $auth;
        private $user;
        
        public function __construct($db) {
            $this->db = $db;
            $this->auth = new Auth($this->db);
            $this->user = new User($this->db);
        }

        public function index() {
                
        }

        public function create() {
                
        }

        public function save() {
                
        }

        public function edit() {
                
        }

        public function update() {
                
        }

        public function delete() {
                
        }
        
    }