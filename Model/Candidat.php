<?php

    namespace Model;

    use Database\DatabaseConnector;
    
    class Candidat {
        
        private $db;

        public function __construct() {
            $this->db = (new DatabaseConnector())->getConnection();
        }
        public function save(Array $inputs) {
            $req = $this->db->prepare('INSERT INTO candidats (prenom, nom, date_naissance, genre, image, event_id, user_id, created_at)VALUES(:prenom, :nom, :date_naissance, :genre, :image, :event_id, :user_id, NOW())');
            $req->bindParam(':prenom', $inputs['prenom']);
            $req->bindParam(':nom', $inputs['nom']);
            $req->bindParam(':date_naissance', $inputs['date_naissance']);
            $req->bindParam(':genre', $inputs['genre']);
            $req->bindParam(':image', $inputs['image']);
            $req->bindParam(':event_id', $inputs['event_id']);
            $req->bindParam(':user_id', $_SESSION['user']['id']);
            return $req;
        }
        
        public function update($id, Array $inputs) {
            $req = $this->db->prepare('UPDATE candidats SET prenom=:prenom, nom=:nom, date_naissance=:date_naissance, genre=:genre, image=:image, event_id=:event_id WHERE id=:id');
            $req->bindParam(':prenom', $inputs['prenom']);
            $req->bindParam(':nom', $inputs['nom']);
            $req->bindParam(':date_naissance', $inputs['date_naissance']);
            $req->bindParam(':genre', $inputs['genre']);
            $req->bindParam(':image', $inputs['image']);
            $req->bindParam(':event_id', $inputs['event_id']);
            $req->bindParam(':id', $id);
            return $req;
        }

        public function getById($id) {
            $req = $this->db->prepare('SELECT * from candidats WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            return $req;
        }

        public function getAll() {
            $req = $this->db->query('SELECT * from candidats LIMIT 1');
            return $req->fetchAll();
        }

        public function delete($id) {
            $req = $this->db->prepare('DELETE from candidats WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            return $req;
        }
    }