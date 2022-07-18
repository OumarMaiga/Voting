<?php 

    namespace Controller;

    use Model\Commande;
    use Model\Ticket;

    class CommandeController {
        
        private $commande;
        
        public function __construct() {
            $this->commande = new Commande;
            $this->ticket = new Ticket;
        }

        public function index($ticket_id) {
            $commandes = $this->commande->getBy('ticket_id', $ticket_id);
            $ticket = $this->ticket->getById($ticket_id);
            require('View/commande/index.php');
        }
        
        public function create($ticket_id) {
            $ticket = $this->ticket->getById($ticket_id);
            require('View/commande/create.php');                    
        }

        public function save($ticket_id) {
            // Impossible si le user n'est pas connecter
            /*if (!isset($_SESSION['user']) || $_SESSION['user']['id'] == null) {
                header('location:index.php?action=accueil&msg=user_required');
                exit;
            }*/
            $ticket = $this->ticket->getById($ticket_id);

            if (empty($ticket)) {
                header('location:index.php?action=accueil&ticket_id='.$ticket_id.'&msg=ticket_not_found');
                exit;
            } else if ($_POST['count'] > $ticket['count']) {
                header('location:index.php?action=buy_ticket&id='.$ticket_id.'&msg=ticket_not_complete&count='.$ticket['count']);
                exit;
            }
 
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // Output: 54esmdr0qf
            $code = substr(str_shuffle($permitted_chars), 0, 6);

            $_POST['code'] = $code;
            $_POST['ticket_id'] = $ticket_id;
            $_POST['etat'] = "precommande";
            $commande = $this->commande->save($_POST);
            
            if($commande->execute()) {
                $commande = $this->commande->getLast();
                $_POST['commande_id'] = $commande['id'];
                $_POST['ticket_montant'] = $ticket['montant'];
                $_SESSION['commande'] = $_POST;
                $diff = $ticket['count'] - $_POST['count'];
                $count = $diff;
                $response = $this->ticket->update_count($ticket_id, $count);
                $response->execute();
                header('location:index.php?action=paiement_ticket_page&ticket_id='.$ticket_id.'&msg=commande_created');
                exit;
            } else {
                header('location:index.php?action=buy_ticket&id='.$ticket_id.'&msg=commande_not_created');
                exit;
            }

        }

        public function show($id) {
            $commande = $this->commande->getById($id);

            if(empty($commande)) {
                require('View/commande/show.php'); 
            } else {
                header('location:index.php?action=index_commande&msg=commande_not_fetched');
                exit;
            }  
        }

        public function edit($id) {   
            $commande = $this->commande->getById($id);
            
            if(!empty($commande)) {
                
                require('View/commande/edit.php'); 
           
            } else {
                header('location:index.php?action=index_commande&msg=commande_not_fetched');
                exit;
            }
        }

        public function update($id) {
            $commande = $this->commande->update($id, $_POST);
            if($commande->execute()) {
                header('location:index.php?action=index_commande&msg=commande_updated');
                exit;
            } else {
                header('location:index.php?action=edit_commande&id='.$id.'&msg=commande_not_updated');
                exit;
            }
        }

        public function delete($id) {
            $commande = $this->commande->delete($id);
            if($commande->execute()) {
                header('location:index.php?action=index_commande&msg=commande_deleted');
                exit;
            } else {
                header('location:index.php?action=show_commande&id='.$id.'&msg=commande_not_deleted');
                exit;
            }
        }
        
    }