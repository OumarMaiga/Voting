<?php 

    namespace Controller;

    use Model\Auth;
    use Model\User;

    class EventController {
        

        private $auth;
        private $user;
        
        public function __construct() {
            $this->auth = new Auth;
            $this->user = new User;
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