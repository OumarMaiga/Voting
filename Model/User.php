<?php

    namespace Model;

    use Database\DatabaseConnector;

    class User {
        
        private $db;

        public function __construct() {
            $this->db = (new DatabaseConnector())->getConnection();
        }

        public function getUserByEmail($email) {
            $req = $this->db->prepare('SELECT * from users WHERE email=:email LIMIT 1');
            $req->bindParam(':email', $email);
            return $req;
        }

        public function getUserByPhone($phone) {
            $req = $this->db->prepare('SELECT * from users WHERE phone=:phone LIMIT 1');
            $req->bindParam(':phone', $phone);
            return $req;
        }

        /* Verification du token */
        public function checkToken($token) {
            $req = $this->db->prepare("SELECT * FROM users WHERE token=:token LIMIT 1");
            $req->bindParam(':token', $token);
            return $req;
        }

        public function setUser($inputs) {
            $req = $this->db->prepare('INSERT INTO users (first_name, last_name, email, phone, password, token, created_at, updated_at)VALUES(:first_name, :last_name, :email, :phone, :password, :token, NOW(), NOW())');
            $req->bindParam(':first_name', $inputs['prenom']);
            $req->bindParam(':last_name', $inputs['nom']);
            $req->bindParam(':phone', $inputs['phone']);
            $req->bindParam(':email', $inputs['email']);
            $req->bindParam(':password', $inputs['password']);
            $req->bindParam(':token', $inputs['token']);
            return $req;
        }

        public function getUser($token) {
            $req = $this->db->prepare('SELECT * FROM users WHERE token=:token LIMIT 1');
            $req->bindParam(':token', $token);
            return $req;
        }
    }