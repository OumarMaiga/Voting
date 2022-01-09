<?php

    namespace Model;

    use Database\DatabaseConnector;

    class Event {
        
        private $db;

        public function __construct() {
            $this->db = (new DatabaseConnector())->getConnection();
        }

        public function save(Array $inputs) {
            $req = $this->db->prepare('INSERT INTO events (titre, categorie, description, expire, image, video, user_id, created_at)VALUES(:titre, :categorie, :description, :expire, :image, :video, :user_id, NOW())');
            $req->bindParam(':titre', $inputs['titre']);
            $req->bindParam(':categorie', $inputs['categorie']);
            $req->bindParam(':description', $inputs['description']);
            $req->bindParam(':expire', $inputs['expire']);
            $req->bindParam(':image', $inputs['image']);
            $req->bindParam(':video', $inputs['video']);
            $req->bindParam(':user_id', $_SESSION['user']['id']);
            return $req;
        }
        
        public function update($id, Array $inputs) {
            $req = $this->db->prepare('UPDATE events SET titre=:titre, categorie=:categorie, description=:description, expire=:expire, image=:image, video=:video WHERE id=:id');
            $req->bindParam(':titre', $inputs['titre']);
            $req->bindParam(':categorie', $inputs['categorie']);
            $req->bindParam(':description', $inputs['description']);
            $req->bindParam(':expire', $inputs['expire']);
            $req->bindParam(':image', $inputs['image']);
            $req->bindParam(':video', $inputs['video']);
            $req->bindParam(':id', $id);
            return $req;
        }

        public function getById($id) {
            $req = $this->db->prepare('SELECT * from events WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            $req->execute();
            return $req->fetch();
        }

        public function getAll() {
            $req = $this->db->query('SELECT * from events');
            return $req->fetchAll();
        }

        public function delete($id) {
            $req = $this->db->prepare('DELETE from events WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            return $req;
        }

        public function getLast() {
            $req = $this->db->query('SELECT * from events ORDER BY id DESC LIMIT 1');
            return $req->fetch();
        }
    }