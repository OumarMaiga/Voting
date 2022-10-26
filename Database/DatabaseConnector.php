<?php 

    namespace Database;

    class DatabaseConnector {
                
        protected $dbConnection = null;
        public static $share_con = NULL;
        
        public function __construct() {
            $user = "root";
            $password = '';
            $dns='mysql:host=localhost;dbname=voting;charset=UTF8';
            
            // Serveur
            /*$user = 'fdbc045_click-events';
            $password = 'Hasseye97';
            $dns='mysql:host=localhost;dbname=fdbc045_click_event;charset=UTF8';*/
            
            /*
            test zone
            */
            if($this::$share_con == NULL)
                 $this::$share_con = new \PDO($dns,$user,$password);
                 
            $this->dbConnection = $this::$share_con;
            // end test
            /*
            try {

                $this->dbConnection = new \PDO($dns,$user,$password);
                echo '<pre>appel' . PHP_EOL .'</pre>';
                //var_dump($this->dbConnection);
                //die('ici');

            } catch (\Exception $e) {
                die('Erreur: '.$e->getMessage());
            }
            */
        }

        public function getConnection() {
            return $this->dbConnection;
        }
    }
    