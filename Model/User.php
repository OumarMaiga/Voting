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
            return $req->fetch();
        }

        public function getByEmail($email) {
            $req = $this->db->prepare('SELECT * from users WHERE email=:email LIMIT 1');
            $req->bindParam(':email', $email);
            return $req->fetchAll();
        }

        public function getByPhone($phone) {
            $req = $this->db->prepare('SELECT * from users WHERE phone=:phone LIMIT 1');
            $req->bindParam(':phone', $phone);
            return $req->fetchAll();
        }

        public function save($inputs) {
            $password = md5($inputs['password']);
            $req = $this->db->prepare('INSERT INTO users (prenom, nom, email, phone, password, categorie, etat, login, created_at, updated_at)VALUES(:prenom, :nom, :email, :phone, :password, :categorie, :etat, :login, NOW(), NOW())');
            $req->bindParam(':prenom', $inputs['prenom']);
            $req->bindParam(':nom', $inputs['nom']);
            $req->bindParam(':phone', $inputs['phone']);
            $req->bindParam(':email', $inputs['email']);
            $req->bindParam(':categorie', $inputs['categorie']);
            $req->bindParam(':etat', $inputs['etat']);
            $req->bindParam(':password', $password);
            $req->bindParam(':login', $inputs['login']);
            return $req;
        }

        public function getPartenaires() {
            $categorie = 'partenaire';
            $req = $this->db->prepare('SELECT * FROM users WHERE categorie=:categorie');
            $req->bindParam(':categorie', $categorie);
            $req->execute();
            return $req->fetchAll();
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