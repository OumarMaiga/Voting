<?php 

    namespace Controller;

    use Model\Event;
    use Model\User;
    use Model\Candidat;
    use Model\Ticket;

    use API\Wizall;

    class PageController {
        
        private $event;
        private $user;
        private $wizall;
        private $candidat;
        private $ticket;
        
        public function __construct() {
            $this->event = new Event;
            $this->user = new User;
            $this->wizall = new Wizall;
            $this->candidat = new Candidat;
            $this->ticket = new Ticket;
        }

        public function accueil() {
            $events = $this->event->getAll();
            $tickets = $this->ticket->getAll();

            require('View/page/accueil.php');
        }       

        public function transactions() {
            $events = $this->event->getAll();
            $data = $this->wizall->transaction_list();

            if(substr($data->status, 0, 1) == "2") {
                require('View/page/transactions.php');
                return false;
            }
            var_dump($transactions);
            die();
        }

        public function get_wizall_token_page() {
            $token = "";
            if (isset($_POST['token'])) 
            {
                $get_token = $this->wizall->get_token();
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

        public function paiement_ticket_page($ticket_id)
        {
            require('View/page/paiement_ticket_page.php');
        }
    }