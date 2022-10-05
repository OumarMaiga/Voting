<?php

    namespace Model;

    use Database\DatabaseConnector;
    
    class Ticket {
        
        private $db;

        public function __construct() {
            $this->db = (new DatabaseConnector())->getConnection();
        }

        public function save(Array $inputs) {
            $req = $this->db->prepare('INSERT INTO tickets (title, overview, count, image, montant, user_id, expire, lieu, created_at)VALUES(:title, :overview, :count, :image, :montant, :user_id, :expire, :lieu, NOW())');
            $req->bindParam(':title', $inputs['title']);
            $req->bindParam(':overview', $inputs['overview']);
            $req->bindParam(':count', $inputs['count']);
            $req->bindParam(':image', $inputs['image']);
            $req->bindParam(':montant', $inputs['montant']);
            $req->bindParam(':user_id', $_SESSION['user']['id']);
            $req->bindParam(':expire', $inputs['expire']);
            $req->bindParam(':lieu', $inputs['lieu']);
            $req->execute();
            $ticket = $this->getById($this->db->lastInsertId());
            return $ticket;
        }
        
        public function update($id, Array $inputs) {
            $req = $this->db->prepare('UPDATE tickets SET title=:title, overview=:overview, count=:count, image=:image, montant=:montant, expire=:expire, lieu=:lieu, updated_at=NOW() WHERE id=:id');
            $req->bindParam(':title', $inputs['title']);
            $req->bindParam(':overview', $inputs['overview']);
            $req->bindParam(':count', $inputs['count']);
            $req->bindParam(':image', $inputs['image']);
            $req->bindParam(':montant', $inputs['montant']);
            $req->bindParam(':expire', $inputs['expire']);
            $req->bindParam(':lieu', $inputs['lieu']);
            $req->bindParam(':id', $id);
            return $req;
        }
        
        public function update_count($id, $count) {
            $req = $this->db->prepare('UPDATE tickets SET count=:count WHERE id=:id');
            $req->bindParam(':count', $count);
            $req->bindParam(':id', $id);
            return $req;
        }

        public function getById($id) {
            $req = $this->db->prepare('SELECT * from tickets WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            $req->execute();
            return $req->fetch();
        }

        public function getBy($key, $value) {
            $req = $this->db->query("SELECT * from tickets WHERE $key=$value ORDER BY id DESC");
            return $req->fetchAll();
        }

        public function getAll() {
            $req = $this->db->query('SELECT * from tickets ORDER BY id DESC');
            return $req->fetchAll();
        }

        public function delete($id) {
            $req = $this->db->prepare('DELETE from tickets WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            return $req;
        }
        
        public function getLast() {
            $req = $this->db->query('SELECT * from tickets ORDER BY id DESC LIMIT 1');
            return $req->fetch();
        }
        
        public function save_ticket_user($inputs) {
            // On enregistre les nouveau ticket_user dans la base de donnees
            $req = $this->db->prepare('INSERT INTO ticket_user (ticket_id, user_id)VALUES(:ticket_id, :user_id)');
            $req->bindParam(':ticket_id', $inputs['ticket_id']);
            $req->bindParam(':user_id', $inputs['user_id']);
            $data = $req->execute();
            return $data;
        }

        public function delete_ticket_user($ticket_id) {
            $req = $this->db->prepare('DELETE from ticket_user WHERE ticket_id=:ticket_id');
            $req->bindParam(':ticket_id', $ticket_id);
            return $req;
        }
        
        public function getByPartenaire($user_id) {            
            $req = $this->db->prepare('SELECT tickets.*
                from ticket_user 
                LEFT JOIN tickets ON ticket_user.ticket_id = tickets.id 
                WHERE ticket_user.user_id=:user_id');
            $req->bindParam(':user_id', $user_id);
            $req->execute();
            return $req->fetchAll();
        }
    }