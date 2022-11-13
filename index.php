<?php
    session_start();

    require "./bootstrap.php";

    use Controller\UserController;
    use Controller\AuthController;
    use Controller\CandidatController;
    use Controller\TicketController;
    use Controller\CommandeController;
    use Controller\EventController;
    use Controller\PageController;
    use Controller\PaiementController;
    use Controller\VoteController;
    use Controller\PartenaireController;
    
    $auth = new AuthController;
    $user = new UserController;
    $page = new PageController;
    $candidat = new CandidatController;
    $ticket = new TicketController;
    $commande = new CommandeController;
    $event = new EventController;
    $vote = new VoteController;
    $paiement = new PaiementController;
    $partenaire = new PartenaireController;

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
        case 'paiement_ticket_page':
            $page->paiement_ticket_page($_GET['ticket_id']);
            break;
        case 'search':
            $page->search($_GET['ticket_id'], $_GET['query']);
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
        case  'check_paiement_ticket':
            $paiement->check_paiement_ticket();
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

//////////////////////////// TicketController //////////////////////////////////        
        case  'index_ticket':
            $ticket->index();
            break;
        case  'create_ticket':
            $ticket->create();
            break;
        case  'save_ticket':
            $ticket->save();
            break;
        case  'edit_ticket':
            $ticket->edit($_GET['id']);
            break;
        case  'update_ticket':
            $ticket->update($_GET['id']);
            break;
        case  'show_ticket':
            $ticket->show($_GET['id']);
            break;
        case  'buy_ticket':
            $ticket->buy($_GET['id']);
            break;
        case  'delete_ticket':
            $ticket->delete($_GET['id']);
            break;

//////////////////////////// CommandeController //////////////////////////////////        
        case  'index_commande':
            $commande->index($_GET['ticket_id']);
            break;
        case  'create_commande':
            $commande->create($_GET['ticket_id']);
            break;
        case  'save_commande':
            $commande->save($_GET['ticket_id']);
            break;
        case  'edit_commande':
            $commande->edit($_GET['id']);
            break;
        case  'update_commande':
            $commande->update($_GET['id'], $_GET['ticket_id']);
            break;
        case  'show_commande':
            $commande->show($_GET['id']);
            break;
        case  'delete_commande':
            $commande->delete($_GET['id']);
            break;
        case  'consommer_commande':
            $commande->consommer($_GET['id']);
            break;
        
//////////////////////////// PartenaireController //////////////////////////////////        
        case  'index_partenaire':
            $partenaire->index();
            break;
        case  'create_partenaire':
            $partenaire->create();
            break;
        case  'save_partenaire':
            $partenaire->save();
            break;
        case  'edit_partenaire':
            $partenaire->edit($_GET['id']);
            break;
        case  'update_partenaire':
            $partenaire->update($_GET['id']);
            break;
        case  'show_partenaire':
            $partenaire->show($_GET['id']);
            break;
        case  'delete_partenaire':
            $partenaire->delete($_GET['id']);
            break;
                    
        default:
            $page->accueil();
    }