<?php

    namespace Model;

    use Database\DatabaseConnector;

    class User {
        
        private $db;

        public function __construct() {
            $this->db = (new DatabaseConnector())->getConnection();
        }

        public function getByLogin($login) {
            $req = $this->db->prepare('SELECT * from users WHERE login=:login LIMIT 1');
            $req->bindParam(':login', $login);
            return $req;
        }

        public function getById($email) {
            $req = $this->db->prepare('SELECT * from users WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            return $req;
        }

        public function getByEmail($email) {
            $req = $this->db->prepare('SELECT * from users WHERE email=:email LIMIT 1');
            $req->bindParam(':email', $email);
            return $req;
        }

        public function getByPhone($phone) {
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

        public function save($inputs) {
            $password = md5($inputs['password']);
            $req = $this->db->prepare('INSERT INTO users (prenom, nom, email, phone, password, categories, etat, login, created_at, updated_at)VALUES(:prenom, :nom, :email, :phone, :password, :categories, :etat, :login, NOW(), NOW())');
            $req->bindParam(':prenom', $inputs['prenom']);
            $req->bindParam(':nom', $inputs['nom']);
            $req->bindParam(':phone', $inputs['phone']);
            $req->bindParam(':email', $inputs['email']);
            $req->bindParam(':categories', $inputs['categories']);
            $req->bindParam(':etat', $inputs['etat']);
            $req->bindParam(':password', $password);
            $req->bindParam(':login', $inputs['login']);
            return $req;
        }

        public function getUser($token) {
            $req = $this->db->prepare('SELECT * FROM users WHERE token=:token LIMIT 1');
            $req->bindParam(':token', $token);
            return $req;
        }

        public function getPartenaires() {
            $categories = 'partenaire';
            $req = $this->db->prepare('SELECT * FROM users WHERE categories=:categories');
            $req->bindParam(':categories', $categories);
            return $req;
        }
        
        public function getLast() {
            $req = $this->db->query('SELECT * from users ORDER BY id DESC LIMIT 1');
            return $req->fetch();
        }
        
        public function update($id, Array $inputs) {
            $req = $this->db->prepare('UPDATE users SET nom=:nom, prenom=:prenom, login=:login, phone=:phone, email=:email, etat=:etat, updated_at=NOW() WHERE id=:id');
            $req->bindParam(':nom', $inputs['nom']);
            $req->bindParam(':prenom', $inputs['prenom']);
            $req->bindParam(':login', $inputs['login']);
            $req->bindParam(':phone', $inputs['phone']);
            $req->bindParam(':email', $inputs['email']);
            $req->bindParam(':etat', $inputs['etat']);
            $req->bindParam(':id', $id);
            return $req;
        }
    }