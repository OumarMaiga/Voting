<?php 

    namespace Database;

    class DatabaseConnector {
        
        protected $dbConnection = null;
        
        public function __construct() {
            
            $user = "root";
            $password = '';
            $dbName = 'voting';
            $host = 'localhost';
            
            // Serveur
            /*$user = "fdbc045_Oumar";
            $password = 'Hasseye97';
            $dbName = 'fdbc045_ckick_event';
            $host = 'localhost';*/
            
            try {

                $this->dbConnection = new \PDO("mysql:host=$host;dbname=$dbName;charset=UTF8",$user,$password);

            } catch (Exception $e) {
                die('Erreur: '.$e->getMessage());
            }
        }

        public function getConnection() {
            return $this->dbConnection;
        }
    }
    