<?php

    namespace Model;

    use Database\DatabaseConnector;
    
    class Paiement {
        
        private $db;

        public function __construct() {
            $this->db = (new DatabaseConnector())->getConnection();
        }
        public function save(Array $inputs) {
            $req = $this->db->prepare('INSERT INTO paiements (event_id, ticket_id, commande_id, etat, montant, w_from, currency, transaction_id, description, channels, payment_method, operator_id, customer_name, customer_surname, customer_email, customer_phone_number, customer_address, customer_city, customer_country, customer_state, customer_zip_code, created_at)
                                        VALUES(:event_id, :ticket_id, :commande_id, :etat, :montant, :w_from, :currency, :transaction_id, :description, :channels, :payment_method, :operator_id, :customer_name, :customer_surname, :customer_email, :customer_phone_number, :customer_address, :customer_city, :customer_country, :customer_state, :customer_zip_code, NOW())');
            $req->bindParam(':event_id', $inputs['event_id']);
            $req->bindParam(':ticket_id', $inputs['ticket_id']);
            $req->bindParam(':commande_id', $inputs['commande_id']);
            $req->bindParam(':etat', $inputs['etat']);
            $req->bindParam(':montant', $inputs['montant']);
            $req->bindParam(':w_from', $inputs['from']);
            $req->bindParam(':currency', $inputs['currency']);
            $req->bindParam(':transaction_id', $inputs['transaction_id']);
            $req->bindParam(':description', $inputs['description']);
            $req->bindParam(':channels', $inputs['channels']);
            $req->bindParam(':payment_method', $inputs['payment_method']);
            $req->bindParam(':operator_id', $inputs['operator_id']);
            $req->bindParam(':customer_name', $inputs['customer_name']);
            $req->bindParam(':customer_surname', $inputs['customer_surname']);
            $req->bindParam(':customer_email', $inputs['customer_email']);
            $req->bindParam(':customer_phone_number', $inputs['customer_phone_number']);
            $req->bindParam(':customer_address', $inputs['customer_address']);
            $req->bindParam(':customer_city', $inputs['customer_city']);
            $req->bindParam(':customer_country', $inputs['customer_country']);
            $req->bindParam(':customer_state', $inputs['customer_state']);
            $req->bindParam(':customer_zip_code', $inputs['customer_zip_code']);
            $req->execute();
            $paiement = $this->getById($this->db->lastInsertId());
            return $paiement;
        }
        
        public function update_etat(Array $inputs) {
            $req = $this->db->prepare('UPDATE paiements SET etat = :etat , updated_at = NOW() WHERE transaction_id = :transaction_id');
            $req->bindParam(':etat', $inputs['etat']);
            $req->bindParam(':transaction_id', $inputs['transaction_id']);
            return $req;
        }
        
        public function getById($id) {
            $req = $this->db->prepare('SELECT * from paiements WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            $req->execute();
            return $req->fetch();
        }

        public function getBy($key, $value) {
            $req = $this->db->query("SELECT * from paiements WHERE $key=$value");
            return $req->fetchAll();
        }

        public function getAll() {
            $req = $this->db->query('SELECT * from paiements');
            return $req->fetchAll();
        }

        public function delete($id) {
            $req = $this->db->prepare('DELETE from paiements WHERE id=:id LIMIT 1');
            $req->bindParam(':id', $id);
            return $req;
        }
    }