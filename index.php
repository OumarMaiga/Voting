<?php
    session_start();
    
    require "./bootstrap.php";

    use Controller\UserController;
    use Controller\AuthController;
    use Controller\CandidatController;
    use Controller\EventController;
    use Controller\PageController;
    use Controller\PaiementController;
    use Controller\VoteController;
    
    $auth = new AuthController;
    $user = new UserController;
    $page = new PageController;
    $candidat = new CandidatController;
    $event = new EventController;
    $vote = new VoteController;
    $paiement = new PaiementController;

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
        case  'sign_in':
            $auth->sign_in();
            break;
        case  'logout':
            $auth->logout();
            break;

//////////////////////////// PageController //////////////////////////////////    
        case  'accueil':
            $page->accueil();
            break;
        case  'transactions':
            $page->transactions();
            break;
        case  'get_wizall_token_page':
            $page->get_wizall_token_page();
            break;
        case  'orange_money_page':
            $page->orange_money_page($_GET['event_id'], $_GET['candidat_id']);
            break;
        case  'wizall_page':
            $page->wizall_page($_GET['event_id'], $_GET['candidat_id']);
            break;
        case  'wizall_confirm_page':
            $page->wizall_confirm_page($_GET['event_id'], $_GET['candidat_id']);
            break;
        case  'mobicash_page':
            $page->mobicash_page($_GET['event_id'], $_GET['candidat_id']);
            break;
        case  'wave_page':
            $page->wave_page($_GET['event_id'], $_GET['candidat_id']);
            break;

//////////////////////////// PaiementController //////////////////////////////////    
        case  'paiement_orange_money':
            $paiement->paiement_orange_money();
            break;
        case  'paiement_wizall':
            $paiement->paiement_wizall();
            break;
        case  'paiement_wizall_confirm':
            $paiement->paiement_wizall_confirm();
            break;
        case  'paiement_mobicash':
            $paiement->paiement_mobicash();
            break;
        case  'paiement_wave':
            $paiement->paiement_wave();
            break;

//////////////////////////// CandidatController //////////////////////////////////        
        case  'index_candidat':
            $candidat->index($_GET['event_id']);
            break;
        case  'create_candidat':
            $candidat->create($_GET['event_id']);
            break;
        case  'save_candidat':
            $candidat->save($_GET['event_id']);
            break;
        case  'edit_candidat':
            $candidat->edit($_GET['id']);
            break;
        case  'update_candidat':
            $candidat->update($_GET['id'], $_GET['event_id']);
            break;
        case  'show_candidat':
            $candidat->show($_GET['id']);
            break;
        case  'delete_candidat':
            $candidat->delete($_GET['id']);
            break;

//////////////////////////// EventController //////////////////////////////////
        case  'index_event':
            $event->index();
            break;
        case  'create_event':
            $event->create();
            break;
        case  'save_event':
            $event->save();
            break;
        case  'edit_event':
            $event->edit($_GET['id']);
            break;
        case  'update_event':
            $event->update($_GET['id']);
            break;
        case  'show_event':
            $event->show($_GET['id']);
            break;
        case  'delete_event':
            $event->delete($_GET['id']);
            break;

//////////////////////////// VoteController //////////////////////////////////        
        case  'save_vote':
            $vote->save_vote($_GET['event_id'], $_GET['candidat_id']);
            break;
                      
        default:
            $page->accueil();
    }