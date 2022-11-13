<?php 

    namespace Controller;

    use Model\Ticket;
    use Model\Event;
    use Model\user;
    use ImageUploader;

    class TicketController {
        
        private $ticket;
        private $event;
        private $image;
        
        public function __construct() {
            $this->ticket = new Ticket;
            $this->event = new Event;
            $this->user = new User;
            $this->image = new ImageUploader;
        }

        public function index() {
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['categorie'] == 'admin') 
                {
                    $tickets = $this->ticket->getAll();
                }
                elseif ($_SESSION['user']['categorie'] == 'partenaire') 
                {
                    $tickets = $this->ticket->getByPartenaire($_SESSION['user']['id']);
                }
            } else {
                $events = $this->event->getAll();
                $tickets = $this->ticket->getAll();
                header('location:index.php?action=accueil');
            }

            require('View/ticket/index.php');
        }
        
        public function create() {
            $partenaires = $this->user->getPartenaires();
            require('View/ticket/create.php');                    
        }

        public function save() {
            // Impossible si le user n'est pas connecter
            if (!isset($_SESSION['user']) || $_SESSION['user']['id'] == null) {
                header('location:index.php?action=create_ticket&msg=user_required');
                exit;
            }
            // Upload d'image
            if (isset($_FILES['image'])) {
                $folder = "public/upload/image/ticket/";

                // On execute la fonction de traitement de l'image
                $response = $this->image->upload($_FILES, $folder);

                // Verification de l'extension et de la taille du fichier
                if ($response['error'] == true) {
                    if ($response['msg'] == "image_ext") {
                        header('location:index.php?action=create_ticket&msg=image_ext');
                        exit;
                    }
                    if ($response['msg'] == "image_file_size") {
                        header('location:index.php?action=create_ticket&msg=image_file_size');
                        exit;
                    }
                    if ($response['msg'] == "image_upload_failed") {
                        header('location:index.php?action=create_ticket&msg=image_upload_failed');
                        exit;
                    }
                } else {
                    $_POST['image'] = $response['url'];
                }
            }

            $ticket = $this->ticket->save($_POST);
            
            if($ticket) {
                //On enregistre les partenaires lié au ticket
                foreach ($_POST['partenaire'] as $user_id) {
                    $inputs = array(
                        'ticket_id' => $ticket['id'],
                        'user_id' => $user_id
                    );
                    $this->ticket->save_ticket_user($inputs);
                }
                header('location:index.php?action=index_ticket&msg=ticket_created');
                exit;
            } else {
                header('location:index.php?action=create_ticket&msg=ticket_not_created');
                exit;
            }

        }

        public function show($id) {
            $ticket = $this->ticket->getById($id);
            
            if(!empty($ticket)) {
                // Formatage de la date
                if ($ticket['expire'] == NULL) {
                    $date = "";
                } else {
                    $date = date_create($ticket['expire']);
                    $day = date_format($date, 'd-m-Y');
                }
                require('View/ticket/show.php'); 
            } else {
                header('location:index.php?action=accueil&msg=ticket_not_fetched');
                exit;
            }  
        }

        public function buy($id) {
            $ticket = $this->ticket->getById($id);

            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($permitted_chars) , 0 , 6);
            
            if(!empty($ticket)) {
                // Formatage de la date
                if ($ticket['expire'] == NULL) {
                    $date = "";
                } else {
                    $date = date_create($ticket['expire']);
                    $day = date_format($date, 'd-m-Y');
                }
                require('View/ticket/buy.php'); 
            } else {
                header('location:index.php?action=accueil&msg=ticket_not_fetched');
                exit;
            }  
        }

        public function edit($id) {   
            $ticket = $this->ticket->getById($id);
            $partenaires = $this->user->getPartenaires();

            if(!empty($ticket)) {
                // Formatage de la date
                if ($ticket['expire'] == NULL) {
                    $date = "";
                  } else {
                        $date = date_create($ticket['expire']);
                        $day = date_format($date, 'Y-m-d');
                        $hour = date_format($date, 'H:i');
                        $date = $day."T".$hour;
                  }
                require('View/ticket/edit.php'); 
           
            } else {
                header('location:index.php?action=index_ticket&msg=ticket_not_fetched');
                exit;
            }
        }

        public function update($id) {
            // Upload d'image
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $folder = "public/upload/image/ticket/";
                
                // On execute la fonction de traitement de l'image
                $response = $this->image->upload($_FILES, $folder);

                // Verification de l'extension et de la taille du fichier
                if ($response['error'] == true) {
                    if ($response['msg'] == "image_ext") {
                        header('location:index.php?action=update_ticket&msg=image_ext');
                        exit;
                    }
                    if ($response['msg'] == "image_file_size") {
                        header('location:index.php?action=update_ticket&msg=image_file_size');
                        exit;
                    }
                    if ($response['msg'] == "image_upload_failed") {
                        header('location:index.php?action=update_ticket&msg=image_upload_failed');
                        exit;
                    }
                } else {
                    $_POST['image'] = $response['url'];
                }
            }

            $ticket = $this->ticket->update($id, $_POST);
            if($ticket->execute()) {
                //On supprime les partenaires lié au ticket
                $ticket_user_deleted = $this->ticket->delete_ticket_user($id);
                if ($ticket_user_deleted->execute()) {
                    //On enregistre les partenaires lié au ticket
                    foreach ($_POST['partenaire'] as $user_id) {
                        $inputs = array(
                            'ticket_id' => $id,
                            'user_id' => $user_id
                        );
                        $this->ticket->save_ticket_user($inputs);
                    }
                }

                header('location:index.php?action=index_ticket&msg=ticket_updated');
                exit;
            } else {
                header('location:index.php?action=edit_ticket&id='.$id.'&msg=ticket_not_updated');
                exit;
            }
        }

        public function delete($id) {
            $ticket = $this->ticket->delete($id);
            if($ticket->execute()) {
                header('location:index.php?action=index_ticket&msg=ticket_deleted');
                exit;
            } else {
                header('location:index.php?action=show_ticket&id='.$id.'&msg=ticket_not_deleted');
                exit;
            }
        }
        
        public function paiement($id) {
            $ticket = $this->ticket->getById($id);
            if(!empty($ticket)) {
                header('location:index.php?action=ticket_paiement&msg=ticket_deleted');
                exit;
            } else {
                header('location:index.php?action=accueil&msg=ticket_not_fetched');
                exit;
            }
        }
        
    }