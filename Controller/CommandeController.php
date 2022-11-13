<?php 

    namespace Controller;

    use Model\Commande;
    use Model\Ticket;
    use Model\Paiement;

    class CommandeController {
        
        private $commande;
        private $ticket;
        private $paiement;
        
        public function __construct() {
            $this->commande = new Commande;
            $this->ticket = new Ticket;
            $this->paiement = new Paiement;
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

            $commande_data = $_POST['commande'];
            $paiement_data = $_POST['paiement'];

            $ticket = $this->ticket->getById($ticket_id);

            if (empty($ticket)) {
                echo json_encode(
                    array(
                        'message' => "TICKET_NOT_FOUND",
                        'code' => 404
                    )
                );
                return;
            }
            if ($commande_data['count'] > $ticket['count']) {
                echo json_encode(
                    array(
                        'message' => "TICKET_LOW",
                        'code' => 405
                    )
                );
                return;
            }
 
            $commande_data['ticket_id'] = $ticket_id;
            $commande_data['etat'] = "precommande";
            $commande = $this->commande->save($commande_data);
            
            if($commande->execute()) {
                $commande = $this->commande->getLast();
                $commande_data['commande_id'] = $commande['id'];
                
                //Save paiement
                $paiement_data['etat'] = 0;
                $paiement_data['commande_id'] = $commande['id'];
                $paiement_data['ticket_id'] = $commande_data['ticket_id'];
                $paiement_data['montant'] = $commande_data['montant'];
                $paiement = $this->paiement->save($paiement_data);
                
                echo json_encode(
                    array(
                        'message' => "COMMANDE_CREATED",
                        'code' => 201
                    )
                );
                return;
            
            } else {
                
                echo json_encode(
                    array(
                        'message' => "COMMANDE_NOT_CREATED",
                        'code' => 500
                    )
                );
                return;
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

        public function consommer($id) {
            $commande = $this->commande->getById($id);
            $ticket_id = $commande['ticket_id'];
            $commande = $this->commande->consommer($id);
            if($commande->execute()) {
                header('location:index.php?action=index_commande&ticket_id='.$ticket_id.'&msg=commande_consommer');
                exit;
            } else {
                header('location:index.php?action=index_commande&ticket_id='.$ticket_id.'&msg=commande_not_consommer');
                exit;
            }
        }
        
    }