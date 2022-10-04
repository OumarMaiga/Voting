<?php

    namespace Controller;

    use Model\User;

    class PartenaireController {

        
        private $partenaire;
        
        public function __construct() {
            $this->partenaire = new User;
        }

        public function index() {
            $req = $this->partenaire->getPartenaires();
            $req->execute();
            $partenaires = $req->fetchAll();
            require('View/partenaire/index.php');
        }

        public function create() {
            require('View/partenaire/create.php');                    
        }

        public function save() {
            // Impossible si le user n'est pas connecter
            if (!isset($_SESSION['user']) || $_SESSION['user']['id'] == null) {
                header('location:index.php?action=create_partenaire&msg=user_required');
                exit;
            }

            // Impossible si les champs obligatoire ne sont pas remplis
            if((!isset($_POST['login']) || $_POST['login'] == "") || (!isset($_POST['password']) || $_POST['password'] == "")) {
                header('location:index.php?action=create_partenaire&msg=field_required');
                exit;
            }
            $_POST['etat'] = 1;
            $_POST['categorie'] = 'partenaire';
            $partenaire = $this->partenaire->save($_POST);
            if($partenaire->execute()) {
                $partenaire = $this->partenaire->getLast();
                header('location:index.php?action=index_partenaire&msg=partenaire_created');
                exit;
            } else {
                header('location:index.php?action=create_partenaire&msg=partenaire_not_created');
                exit;
            }

        }

        public function show($id) {
            $partenaire = $this->partenaire->getById($id);
            $req->execute();
            $partenaires = $req->fetch();

            if(!empty($partenaire)) {
                $candidats = $this->candidat->getBy('partenaire_id', $partenaire['id']);
                require('View/partenaire/show.php');
            } else {
                header('location:index.php?action=accueil&msg=partenaire_not_fetched');
                exit;
            }  
        }

        public function edit($login) {   
            $req = $this->partenaire->getByLogin($login);

            $req->execute();
            $partenaire = $req->fetch();
            if(!empty($partenaire)) {
                require('View/partenaire/edit.php'); 
            } else {
                header('location:index.php?action=index_partenaire&msg=partenaire_not_fetched');
                exit;
            }
        }

        public function update($id) {
            $_POST['etat'] = 1;
            $partenaire = $this->partenaire->update($id, $_POST);
            if($partenaire->execute()) {
                header('location:index.php?action=index_partenaire&msg=partenaire_updated');
                exit;
            } else {
                header('location:index.php?action=edit_partenaire&id='.$id.'&msg=partenaire_not_updated');
                exit;
            }
        }

        public function delete($id) {
            $partenaire = $this->partenaire->delete($id);
            if($partenaire->execute()) {
                header('location:index.php?action=index_partenaire&msg=partenaire_deleted');
                exit;
            } else {
                header('location:index.php?action=show_partenaire&id='.$id.'&msg=partenaire_not_deleted');
                exit;
            }
        }
        
    }