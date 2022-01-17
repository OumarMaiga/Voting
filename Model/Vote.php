<?php

    namespace Model;

    use Database\DatabaseConnector;

    class Vote {
        
        private $db;

        public function __construct() {
            $this->db = (new DatabaseConnector())->getConnection();
        }

        public function save(Array $inputs) {
            
            $req = $this->db->prepare('INSERT INTO votes (point, prix, candidat_id, event_id, created_at)VALUES(:point, :prix, :candidat_id, :event_id, NOW())');
            $req->bindParam(':point', $inputs['point']);
            $req->bindParam(':prix', $inputs['prix']);
            $req->bindParam(':candidat_id', $inputs['candidat_id']);
            $req->bindParam(':event_id', $inputs['event_id']);
            return $req;
        }

        public function getAll() {
            $req = $this->db->query('SELECT * from votes');
            return $req->fetchAll();
        }

    }