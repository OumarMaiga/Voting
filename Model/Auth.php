<?php

    namespace Model;

    use Database\DatabaseConnector;
    

    class Auth {
        
        private $db;

        public function __construct() {
            $this->db = (new DatabaseConnector())->getConnection();
        }

        public function authenticate(Array $inputs) {
            
            $password = md5($inputs['password']);

            $request = $this->db->prepare('SELECT * FROM users WHERE login=:login && password=:password LIMIT 1');
            $request->bindParam(':login', $inputs['login']);
            $request->bindParam(':password', $password);
            return $request;
        }
    }
