<?php 

    namespace Controller;

    use Model\Event;
    use Model\User;
    use Model\Candidat;

    use API\Wizall;

    class PageController {
        
        private $event;
        private $user;
        private $wizall;
        private $candidat;
        
        public function __construct() {
            $this->event = new Event;
            $this->user = new User;
            $this->wizall = new Wizall;
            $this->candidat = new Candidat;
        }

        public function accueil() {
            $events = $this->event->getAll();

            require('View/page/accueil.php');
        }       

        public function get_wizall_token_page() {
            $token = "";
            if (isset($_POST['token'])) 
            {
                $get_token = $this->wizall->get_token();
            var_dump($get_token);
            die();
                if(isset($get_token->access_token))
                {
                    $token = $get_token->access_token;
                }
            }
            require('View/page/get_wizall_token_page.php');
        }       

        public function paiement_page() {
            require('View/page/paiement_page.php');
        }    

        public function orange_money_page() {
            require('View/page/orange_money_page.php');
        }  

        public function wizall_page($event_id, $candidat_id) {
            $event = $this->event->getById($event_id);
            $candidat = $this->candidat->getById($candidat_id);

            require('View/page/wizall_page.php');
        }  

        public function wizall_confirm_page($event_id, $candidat_id) {
            $event = $this->event->getById($event_id);
            $candidat = $this->candidat->getById($candidat_id);

            require('View/page/wizall_confirm_page.php');
        }  

        public function mobicash_page() {
            require('View/page/mobicash_page.php');
        }  

        public function wave_page() {
            require('View/page/wave_page.php');
        }  

    }