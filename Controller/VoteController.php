<?php

    namespace Controller;

    use Model\Vote;
    use API\Wizall;

    class VoteController {

        
        private $vote;
        private $wizall;
        
        public function __construct() {
            $this->vote = new Vote;
            $this->wizall = new Wizall;
        }

        public function index() {
            $votes = $this->vote->getAll();
            require('View/event/index.php');
        }

        public function save_vote($event_id, $candidat_id) {
            
            // Impossible si les champs obligatoire ne sont pas remplis
            if((!isset($_POST['point']) || $_POST['point'] == "") && (!isset($_POST['prix']) || $_POST['prix'] == "")) {
                header('location:index.php?action=show_event&id='.$event_id.'&msg=field_required');
            }

            $_POST['prix'] = (int) filter_var($_POST['prix'], FILTER_SANITIZE_NUMBER_INT); 
            $_POST['event_id'] = $event_id;
            $_POST['candidat_id'] = $candidat_id;

            $_SESSION['vote'] = $_POST;
            
            if(strcmp($_SESSION['vote']['paiement_mode'], "wizall") == 0)
            {
                header('location:index.php?action=wizall_page&event_id='.$event_id.'&candidat_id='.$candidat_id);
            }
            else if(strcmp($_SESSION['vote']['paiement_mode'], "orange_money") == 0)
            {
                header('location:index.php?action=orange_money_page&event_id='.$event_id.'&candidat_id='.$candidat_id);
            }
            else if(strcmp($_SESSION['vote']['paiement_mode'], "mobicash") == 0)
            {
                header('location:index.php?action=mobicash_page&event_id='.$event_id.'&candidat_id='.$candidat_id);
            }
            else if(strcmp($_SESSION['vote']['paiement_mode'], "wave") == 0)
            {
                header('location:index.php?action=wave_page&event_id='.$event_id.'&candidat_id='.$candidat_id);
            }
            else
            {
                header('location:index.php?action=show_event&id='.$event_id.'&candidat_id='.$candidat_id.'&msg=error_paiement_mode');
            }

            /*$paiement = $this->wizall->paiement();
            if($paiement['success']) 
            {*/
                /*$vote = $this->vote->save($_POST);
                if($vote->execute()) {
                    header('location:index.php?action=show_event&id='.$event_id.'&msg=vote_created');
                } else {
                    header('location:index.php?action=show_event&id='.$event_id.'&msg=vote_not_created');
                }*/
            /*} 
            else
            {
                header('location:index.php?action=show_event&id='.$event_id.'&msg=paiement_not_valid');
            }*/

        }
        
    }