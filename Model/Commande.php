<?php

    namespace Model;

    use Database\DatabaseConnector;
    
    class Commande {
        
        private $db;

        public function __construct() {
            $this->db = (new DatabaseConnector())->getConnection();
        }
        public function save(Array $inputs) {
            $req = $this->db->prepare('INSERT INTO commandes (nom, prenom, code, phone, email, count, user_id, ticket_id, paid, etat, created_at) VALUES (:nom, :prenom, :code, :phone, :email, :count, :user_id, :ticket_id, :paid, :etat, NOW())');
            $req->bindParam(':nom', $inputs['nom']);
            $req->bindParam(':prenom', $inputs['prenom']);
            $req->bindParam(':code', $inputs['code']);
            $req->bindParam(':phone', $inputs['phone']);
            $req->bindParam(':email', $inputs['email']);
            $req->bindParam(':count', $inputs['count']);
            $req->bindParam(':ticket_id', $inputs['ticket_id']);
            $req->bindParam(':user_id', $_SESSION['user']['id']);
            $req->bindParam(':paid', $inputs['paid']);
            $req->bindParam(':etat', $inputs['etat']);
            return $req;
        }
        
        public function update($id, Array $inputs) {
            $req = $this->db->prepare('UPDATE commandes SET nom=:nom, prenom=:prenom, code=:code phone=:phone, email=:email, count=:count, ticket_id=:ticket_id, paid=:paid, etat=:etat, updated_at=NOW() WHERE id=:id');
            $req->bindParam(':nom', $inputs['nom']);
            $req->bindParam(':prenom', $inputs['prenom']);
            $req->bindParam(':code', $inputs['code']);
            $req->bindParam(':phone', $inputs['phone']);
            $req->bindParam(':email', $inputs['email']);
            $req->bindParam(':count', $inputs['count']);
            $req->bindParam(':ticket_id', $inputs['ticket_id']);
            $req->bindParam(':paid', $inputs['paid']);
            $req->bindParam(':etat', $inputs['etat']);
            $req->bindParam(':id', $id);
            return $req;
        }

        public function getById($id) {
            $req = $this->db->prepare('SELECT * from commandes WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            $req->execute();
            return $req->fetch();
        }

        public function getBy($key, $value) {
            $req = $this->db->query("SELECT * from commandes WHERE $key=$value ORDER BY id DESC");
            return $req->fetchAll();
        }

        public function getAll() {
            $req = $this->db->query('SELECT * from commandes ORDER BY id DESC');
            return $req->fetchAll();
        }

        public function delete($id) {
            $req = $this->db->prepare('DELETE from commandes WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            return $req;
        }

        public function ticketCommandeCount($tcket_id) {
            $req = $this->db->query("SELECT SUM(count) as count from commandes WHERE ticket_id=$tcket_id");
            return $req->fetch();
        }

        public function getLast() {
            $req = $this->db->query('SELECT * from commandes ORDER BY id DESC LIMIT 1');
            return $req->fetch();
        }

        public function search($ticket_id, $query) {
            $req = $this->db->query("SELECT * from commandes WHERE code like '%$query%' AND ticket_id=$ticket_id");
            return $req;
        }
        
        public function consommer($id) {
            $req = $this->db->prepare('UPDATE commandes SET used=1, paid=1 WHERE id=:id');
            $req->bindParam(':id', $id);
            return $req;
        }
    }