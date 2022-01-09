<?php

    namespace Controller;

    use Model\Event;

    class EventController {
        

        private $event;
        
        public function __construct() {
            $this->event = new Event;
        }

        public function index() {
            $events = $this->event->getAll();
            require('View/event/index.php');
        }
        
        public function create() {
            require('View/event/create.php');                    
        }

        public function save() {
            // Impossible si le user n'est pas connecter
            if (!isset($_SESSION['user']) || $_SESSION['user']['id'] == null) {
                header('location:index.php?action=create_event&msg=user_required');
            }

            // Impossible si les champs obligatoire ne sont pas remplis
            if((!isset($_POST['titre']) || $_POST['titre'] == "") || (!isset($_POST['expire']) || $_POST['expire'] == "")) {
                header('location:index.php?action=create_event&msg=field_required');
            }
            
            $event = $this->event->save($_POST);
            if($event->execute()) {
                $event = $this->event->getLast();
                header('location:index.php?action=index_candidat&event_id='.$event['id'].'&msg=event_created');
            } else {
                header('location:index.php?action=create_event&msg=event_not_created');
            }

        }

        public function show($id) {
            $event = $this->event->getById($id);

            if(empty($event)) {
                require('View/event/show.php');
            } else {
                header('location:index.php?action=index_event&msg=event_not_fetched');
            }  
        }

        public function edit($id) {   
            $event = $this->event->getById($id);

            if(!empty($event)) {
                // Formatage de la date
                $date = date_create($event['expire']);
                $day = date_format($date, 'Y-m-d');
                $hour = date_format($date, 'H:i');
                $date = $day."T".$hour;
                require('View/event/edit.php'); 
            } else {
                header('location:index.php?action=index_event&msg=event_not_fetched');
            }
        }

        public function update($id) {
            $event = $this->event->update($id, $_POST);
            if($event->execute()) {
                header('location:index.php?action=index_event&msg=event_updated');
            } else {
                header('location:index.php?action=edit_event&id='.$id.'&msg=event_not_updated');
            }
        }

        public function delete($id) {
            $event = $this->event->delete($id);
            if($event->execute()) {
                header('location:index.php?action=index_event&msg=event_deleted');
            } else {
                header('location:index.php?action=show_event&id='.$id.'&msg=event_not_deleted');
            }
        }
        
    }