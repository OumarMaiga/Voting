<?php 

    namespace Controller;

    use Model\Candidat;
    use Model\Event;

    class CandidatController {
        
        
        
        private $candidat;
        private $event;
        
        public function __construct() {
            $this->candidat = new Candidat;
            $this->event = new Event;
        }

        public function index($event_id) {
            $candidats = $this->candidat->getBy('event_id', $event_id);
            $event = $this->event->getById($event_id);
            require('View/candidat/index.php');
        }
        
        public function create($event_id) {
            $event = $this->event->getById($event_id);
            require('View/candidat/create.php');                    
        }

        public function save($event_id) {
            // Impossible si le user n'est pas connecter
            if (!isset($_SESSION['user']) || $_SESSION['user']['id'] == null) {
                header('location:index.php?action=create_candidat&event_id='.$event_id.'&msg=user_required');
            }

            $_POST['event_id'] = $event_id;
            $candidat = $this->candidat->save($_POST);
            
            if($candidat->execute()) {
                header('location:index.php?action=index_candidat&event_id='.$event_id.'&msg=candidat_created');
            } else {
                header('location:index.php?action=create_candidat&event_id='.$event_id.'&msg=candidat_not_created');
            }

        }

        public function show($id) {
            $candidat = $this->candidat->getById($id);

            if(empty($candidat)) {
                require('View/candidat/show.php'); 
            } else {
                header('location:index.php?action=index_candidat&msg=candidat_not_fetched');
            }  
        }

        public function edit($id) {   
            $candidat = $this->candidat->getById($id);
            
            if(!empty($candidat)) {
                
                $event = $this->event->getById($candidat['event_id']);

                // Formatage de la date
                $date = date_create($candidat['date_naissance']);
                $date = date_format($date, 'Y-m-d');
                
                require('View/candidat/edit.php'); 
           
            } else {
                header('location:index.php?action=index_candidat&event_id='.$event_id.'&msg=candidat_not_fetched');
            }
        }

        public function update($id, $event_id) {
            $_POST['event_id'] = $event_id;
            $candidat = $this->candidat->update($id, $_POST);
            if($candidat->execute()) {
                header('location:index.php?action=index_candidat&event_id='.$event_id.'&msg=candidat_updated');
            } else {
                header('location:index.php?action=edit_candidat&id='.$id.'&msg=candidat_not_updated');
            }
        }

        public function delete($id) {
            $candidat = $this->candidat->delete($id);
            if($candidat->execute()) {
                header('location:index.php?action=index_candidat&msg=candidat_deleted');
            } else {
                header('location:index.php?action=show_candidat&id='.$id.'&msg=candidat_not_deleted');
            }
        }
        
    }