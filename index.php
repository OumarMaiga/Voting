<?php

    require "./bootstrap.php";

    use Controller\UserController;
    use Controller\AuthController;
    use Controller\CandidatController;
    use Controller\EventController;
    use Controller\PageController;
    
    $auth = new AuthController;
    $user = new UserController;
    $page = new PageController;
    $candidat = new CandidatController;
    $event = new EventController;

    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'accueil';
    }

    switch ($action) {

//////////////////////////// AuthController //////////////////////////////////  
        case  'login':
            $auth->login();
            break;
        case  'signIn':
            $auth->signIn();
            break;
        case  'logout':
            $auth->logout();
            break;

//////////////////////////// PageController //////////////////////////////////    
        case  'accueil':
            $page->accueil();
            break;

//////////////////////////// CandidatController //////////////////////////////////        
        case  'index_candidat':
            $candidat->index();
            break;
        case  'create_candidat':
            $candidat->create();
            break;
        case  'edit_candidat':
            $candidat->edit();
            break;
        case  'update_candidat':
            $candidat->update();
            break;
        case  'show_candidat':
            $candidat->show();
            break;
        case  'delete_candidat':
            $candidat->delete();
            break;

//////////////////////////// EventController //////////////////////////////////
        case  'index_event':
            $event->index();
            break;
        case  'create_event':
            $event->create();
            break;
        case  'edit_event':
            $event->edit();
            break;
        case  'update_event':
            $event->update();
            break;
        case  'show_event':
            $event->show();
            break;
        case  'delete_event':
            $event->delete();
            break;
        
        default:
            $page->accueil();
    }