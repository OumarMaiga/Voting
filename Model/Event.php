<?php

    namespace Model;

    class Event {
        
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function authenticate(Array $inputs) {
            
            $password = md5($inputs['password']);

            $request = $this->db->prepare('SELECT * FROM users WHERE (phone=:login || email=:login) && password=:password LIMIT 1');
            $request->bindParam(':login', $inputs['login']);
            $request->bindParam(':password', $password);
            return $request;
        }
    }