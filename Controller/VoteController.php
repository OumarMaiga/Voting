<?php

    namespace Controller;

    use Model\Vote;

    class VoteController {

        
        private $vote;
        
        public function __construct() {
            $this->vote = new Vote;
        }

        public function index() {
            $votes = $this->vote->getAll();
            require('View/event/index.php');
        }

        public function save($event_id, $candidat_id) {
            
            // Impossible si les champs obligatoire ne sont pas remplis
            if((!isset($_POST['point']) || $_POST['point'] == "") && (!isset($_POST['prix']) || $_POST['prix'] == "")) {
                header('location:index.php?action=show_event&event_id='.$event_id.'&msg=field_required');
            }

            $_POST['prix'] = (int) filter_var($_POST['prix'], FILTER_SANITIZE_NUMBER_INT); 
            $_POST['event_id'] = $event_id;
            $_POST['candidat_id'] = $candidat_id;
            $vote = $this->vote->save($_POST);
            if($vote->execute()) {
                header('location:index.php?action=show_event&id='.$event_id.'&msg=vote_created');
            } else {
                header('location:index.php?action=show_event&id='.$event_id.'&msg=event_not_created');
            }

        }

        
    }