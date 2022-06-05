<?php

    namespace Controller;

    use Model\Event;
    use Model\Candidat;
    use ImageUploader;

    class EventController {
        

        private $event;
        private $candidat;
        private $image;
        
        public function __construct() {
            $this->event = new Event;
            $this->candidat = new Candidat;
            $this->image = new ImageUploader;
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
                exit;
            }

            // Impossible si les champs obligatoire ne sont pas remplis
            if((!isset($_POST['titre']) || $_POST['titre'] == "") || (!isset($_POST['expire']) || $_POST['expire'] == "")) {
                header('location:index.php?action=create_event&msg=field_required');
                exit;
            }
            // Upload d'image
            if (isset($_FILES['image'])) {
                $folder = "public/upload/image/event/";

                // On execute la fonction de traitement de l'image
                $response = $this->image->upload($_FILES, $folder);

                // Verification de l'extension et de la taille du fichier
                if ($response['error'] == true) {
                    if ($response['msg'] == "image_ext") {
                        header('location:index.php?action=create_event&msg=image_ext');
                        exit;
                    }
                    if ($response['msg'] == "image_file_size") {
                        header('location:index.php?action=create_event&msg=image_file_size');
                        exit;
                    }
                    if ($response['msg'] == "image_upload_failed") {
                        header('location:index.php?action=create_event&msg=image_upload_failed');
                        exit;
                    }
                } else {
                    $_POST['image'] = $response['url'];
                }
            }
            
            $event = $this->event->save($_POST);
            if($event->execute()) {
                $event = $this->event->getLast();
                header('location:index.php?action=index_candidat&event_id='.$event['id'].'&msg=event_created');
                exit;
            } else {
                header('location:index.php?action=create_event&msg=event_not_created');
                exit;
            }

        }

        public function show($id) {
            $event = $this->event->getById($id);
            $date = date_create($event['expire']);
            $date = date_format($date, 'd/m/Y');

            if(!empty($event)) {
                $candidats = $this->candidat->getBy('event_id', $event['id']);
                require('View/event/show.php');
            } else {
                header('location:index.php?action=accueil&msg=event_not_fetched');
                exit;
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
                exit;
            }
        }

        public function update($id) {
            // Upload d'image
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $folder = "public/upload/image/event/";
                
                // On execute la fonction de traitement de l'image
                $response = $this->image->upload($_FILES, $folder);

                // Verification de l'extension et de la taille du fichier
                if ($response['error'] == true) {
                    if ($response['msg'] == "image_ext") {
                        header('location:index.php?action=update_event&msg=image_ext');
                        exit;
                    }
                    if ($response['msg'] == "image_file_size") {
                        header('location:index.php?action=update_event&msg=image_file_size');
                        exit;
                    }
                    if ($response['msg'] == "image_upload_failed") {
                        header('location:index.php?action=update_event&msg=image_upload_failed');
                        exit;
                    }
                } else {
                    $_POST['image'] = $response['url'];
                }
            }
            $event = $this->event->update($id, $_POST);
            if($event->execute()) {
                header('location:index.php?action=index_event&msg=event_updated');
                exit;
            } else {
                header('location:index.php?action=edit_event&id='.$id.'&msg=event_not_updated');
                exit;
            }
        }

        public function delete($id) {
            $event = $this->event->delete($id);
            if($event->execute()) {
                header('location:index.php?action=index_event&msg=event_deleted');
                exit;
            } else {
                header('location:index.php?action=show_event&id='.$id.'&msg=event_not_deleted');
                exit;
            }
        }
        
    }