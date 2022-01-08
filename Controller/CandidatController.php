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

        public function index() {
            $candidats = $this->candidat->getAll();
            require('View/candidat/index.php');
        }
        
        public function create() {
            $events = $this->event->getAll();
            require('View/candidat/create.php');                    
        }

        public function save() {
            // Impossible si le user n'est pas connecter
            if (!isset($_SESSION['user'])) {
                header('location:index.php?action=create_candidat&msg=user_required');
            }

            // Impossible si les champs obligatoire ne sont pas remplis
            if((!isset($_POST['titre']) || $_POST['titre'] == "") || (!isset($_POST['expire']) || $_POST['expire'] == "")) {
                header('location:index.php?action=create_candidat&msg=field_required');
            }
            
            $candidat = $this->candidat->save($_POST);

            if($candidat->execute()) {
                header('location:index.php?action=index_candidat&msg=candidat_created');
            } else {
                header('location:index.php?action=create_candidat&msg=candidat_not_created');
            }

        }

        public function show($id) {
            $result = $this->candidat->getById($id);
            $result->execute();

            if($candidat = $result->fetch()) {
                require('View/candidat/show.php'); 
            } else {
                header('location:index.php?action=index_candidat&msg=candidat_not_fetched');
            }  
        }

        public function edit($id) {   
            $events = $this->event->getAll();
            $result = $this->candidat->getById($id);
            $result->execute();

            if($candidat = $result->fetch()) {
                // Formatage de la date
                $date = date_create($candidat['date_naissance']);
                $date = date_format($date, 'Y-m-d');
                require('View/candidat/edit.php'); 
            } else {
                header('location:index.php?action=index_candidat&msg=candidat_not_fetched');
            }
        }

        public function update($id) {
            $candidat = $this->candidat->update($id, $_POST);
            if($candidat->execute()) {
                header('location:index.php?action=show_candidat&id='.$id.'&msg=candidat_updated');
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