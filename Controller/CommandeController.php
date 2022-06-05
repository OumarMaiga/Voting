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
            if (!isset($_SESSION['user']) || $_SESSION['user']['id'] == null) {
                header('location:index.php?action=create_commande&msg=user_required');
            }
            $ticket = $this->ticket->getBy('id', $ticket_id);
            if (count($ticket) == 0) {
                header('location:index.php?action=create_commande&ticket_id='.$ticket_id.'&msg=ticket_not_found');
            }
            if ($_POST['count'] > $ticket[0]['count']) {
                header('location:index.php?action=create_commande&ticket_id='.$ticket_id.'&msg=ticket_not_complete');
            }
            $_POST['ticket_id'] = $ticket_id;
            $commande = $this->commande->save($_POST);
            
            if($commande->execute()) {
                $diff = $ticket[0]['count'] - $_POST['count'];
                $inputs = ['count' => $diff];
                $response = $this->ticket->update($ticket_id, $inputs);
                $response->execute();
                header('location:index.php?action=index_ticket&msg=commande_created');
            } else {
                header('location:index.php?action=create_commande&ticket_id='.$ticket_id.'&msg=commande_not_created');
            }

        }

        public function show($id) {
            $commande = $this->commande->getById($id);

            if(empty($commande)) {
                require('View/commande/show.php'); 
            } else {
                header('location:index.php?action=index_commande&msg=commande_not_fetched');
            }  
        }

        public function edit($id) {   
            $commande = $this->commande->getById($id);
            
            if(!empty($commande)) {
                
                require('View/commande/edit.php'); 
           
            } else {
                header('location:index.php?action=index_commande&msg=commande_not_fetched');
            }
        }

        public function update($id) {
            $commande = $this->commande->update($id, $_POST);
            if($commande->execute()) {
                header('location:index.php?action=index_commande&msg=commande_updated');
            } else {
                header('location:index.php?action=edit_commande&id='.$id.'&msg=commande_not_updated');
            }
        }

        public function delete($id) {
            $commande = $this->commande->delete($id);
            if($commande->execute()) {
                header('location:index.php?action=index_commande&msg=commande_deleted');
            } else {
                header('location:index.php?action=show_commande&id='.$id.'&msg=commande_not_deleted');
            }
        }
        
    }