<?php
    if(isset($_GET['msg']) && $msg = $_GET['msg']) {

    //////////////////// VOTE //////////////////// 
    if ($msg === "vote_created") {
        $msgText = "Bravo ! &nbsp; Votre vote a bien été enregistré";
        $bgColor = " bg-success";
    } else if ($msg === "vote_not_created") {
        $msgText = "Erreur ! &nbsp; Enregistrement de vote incorrect";
        $bgColor = " bg-danger";
    } else if ($msg === "paiement_not_valid") {
        $msgText = "Erreur ! &nbsp; Paiement invalid";
        $bgColor = " bg-danger";
    }

    //////////////////// USER //////////////////// 
     else if ($msg === "login_not_found") {
        $msgText = "Erreur ! &nbsp; Identifiant incorrect";
        $bgColor = " bg-danger";
    } else if ($msg === "user_required") {
        $msgText = "Erreur ! &nbsp; Veuillez-vous connecter";
        $bgColor = " bg-danger";
    }else if ($msg === "field_required") {
        $msgText = "Erreur ! &nbsp; Veuillez remplir les champs";
        $bgColor = " bg-danger";
    }else if ($msg === "login") {
        $msgText = "Erreur ! &nbsp; Veuillez remplir les champs";
        $bgColor = " bg-success";
    }else if ($msg === "logout") {
        $msgText = "Utilisateur deconnecter";
        $bgColor = " bg-secondary";
    }

    //////////////////// IMAGE //////////////////// 
     else if ($msg === "image_file_size") {
        $msgText = "Erreur ! &nbsp; La taille de l'image doit être 5M au max";
        $bgColor = " bg-danger";
    } else if ($msg === "image_upload_failed") {
        $msgText = "Erreur ! &nbsp; Upload de l'image échouée";
        $bgColor = " bg-danger";
    } else if ($msg === "image_ext") {
        $msgText = "Erreur ! &nbsp; Choisissez une image (png, jpeg, jpg)";
        $bgColor = " bg-danger";
    }

    //////////////////// CANDIDAT //////////////////// 
    /* Save | Update*/
      else if ($msg === "candidat_created") {
        $msgText = "Bravo ! &nbsp; Le candidat a bien été enregistré";
        $bgColor = " bg-success";
    } else if ($msg === "candidat_not_created") {
        $msgText = "Erreur ! &nbsp; Création de candidat échouée";
        $bgColor = " bg-danger";
    } else if ($msg === "candidat_updated") {
        $msgText = "Bravo ! &nbsp; Le candidat a bien été mise à jour";
        $bgColor = " bg-success";
    } else if ($msg === "candidat_not_updated") {
        $msgText = "Erreur ! &nbsp; Mise à jour du candidat échouée";
        $bgColor = " bg-danger";
    /* Show | Edit */
    } else if ($msg === "candidat_not_fetched") {
        $msgText = "Erreur ! &nbsp; Candidat non trouvé";
        $bgColor = " bg-danger";
    /* Delete */
    } else if ($msg === "candidat_deleted") {
        $msgText = "Bravo ! &nbsp; Candidat supprimé avec succès";
        $bgColor = " bg-success";
    } else if ($msg === "candidat_not_deleted") {
        $msgText = "Erreur ! &nbsp; Suppression du candidat échouée";
        $bgColor = " bg-danger";
    }

    //////////////////// EVENT //////////////////// 
    /* Save | Update*/
      else if ($msg === "event_created") {
        $msgText = "Bravo ! &nbsp; L'évènement a bien été enregistré";
        $bgColor = " bg-success";
    } else if ($msg === "event_not_created") {
        $msgText = "Erreur ! &nbsp; Création d'évènement échouée";
        $bgColor = " bg-danger";
    } else if ($msg === "event_updated") {
        $msgText = "Bravo ! &nbsp; L'évènement a bien été mise à jour";
        $bgColor = " bg-success";
    } else if ($msg === "event_not_updated") {
        $msgText = "Erreur ! &nbsp; Mise à jour de l'évènement échouée";
        $bgColor = " bg-danger";
    /* Show | Edit */
    } else if ($msg === "event_not_fetched") {
        $msgText = "Erreur ! &nbsp; Campagne non trouvé";
        $bgColor = " bg-danger";
    /* Delete */
    } else if ($msg === "event_deleted") {
        $msgText = "Bravo ! &nbsp; Campagne supprimé avec succès";
        $bgColor = " bg-success";
    } else if ($msg === "event_not_deleted") {
        $msgText = "Erreur ! &nbsp; Suppression de l'évènement échouée";
        $bgColor = " bg-danger";
    } else if ($msg === "error_paiement_mode") {
        $msgText = "Erreur ! &nbsp; Veuillez choisir un moyen de paiement";
        $bgColor = " bg-danger";
    }

    //////////////////// TICKET //////////////////// 
    /* Save | Update*/
      else if ($msg === "ticket_created") {
        $msgText = "Bravo ! &nbsp; Le ticket a bien été enregistré";
        $bgColor = " bg-success";
    } else if ($msg === "ticket_not_created") {
        $msgText = "Erreur ! &nbsp; Création de ticket échouée";
        $bgColor = " bg-danger";
    } else if ($msg === "ticket_updated") {
        $msgText = "Bravo ! &nbsp; Le ticket a bien été mise à jour";
        $bgColor = " bg-success";
    } else if ($msg === "ticket_not_updated") {
        $msgText = "Erreur ! &nbsp; Mise à jour du ticket échouée";
        $bgColor = " bg-danger";
    /* Show | Edit */
    } else if ($msg === "ticket_not_fetched") {
        $msgText = "Erreur ! &nbsp; Ticket non trouvé";
        $bgColor = " bg-danger";
    /* Delete */
    } else if ($msg === "ticket_deleted") {
        $msgText = "Bravo ! &nbsp; Ticket supprimé avec succès";
        $bgColor = " bg-success";
    } else if ($msg === "ticket_not_deleted") {
        $msgText = "Erreur ! &nbsp; Suppression du ticket échouée";
        $bgColor = " bg-danger";
    } 

    //////////////////// COMMANDE //////////////////// 
    /* Save | Update*/
      else if ($msg === "commande_created") {
        $msgText = "Bravo ! &nbsp; Ticket commandé avec succès";
        $bgColor = " bg-success";
    } else if ($msg === "commande_not_created") {
        $msgText = "Erreur ! &nbsp; Commande échouée";
        $bgColor = " bg-danger";
    } else if ($msg === "commande_updated") {
        $msgText = "Bravo ! &nbsp; La commande a bien été mise à jour";
        $bgColor = " bg-success";
    } else if ($msg === "commande_not_updated") {
        $msgText = "Erreur ! &nbsp; Mise à jour de la commande échouée";
        $bgColor = " bg-danger";
    } else if ($msg === "ticket_not_complete") {
        $msgText = "Erreur ! &nbsp; Commande echoué ( ".$_GET['count']." ticket(s) disponible)";
        $bgColor = " bg-danger";
    } else if ($msg === "ticket_not_found") {
        $msgText = "Erreur ! &nbsp; Pas de ticket disponible";
        $bgColor = " bg-danger";
    /* Show | Edit */
    } else if ($msg === "commande_not_fetched") {
        $msgText = "Erreur ! &nbsp; Campagne non trouvé";
        $bgColor = " bg-danger";
    /* Delete */
    } else if ($msg === "commande_deleted") {
        $msgText = "Bravo ! &nbsp; Campagne supprimé avec succès";
        $bgColor = " bg-success";
    } else if ($msg === "commande_not_deleted") {
        $msgText = "Erreur ! &nbsp; Suppression de l'évènement échouée";
        $bgColor = " bg-danger";
    } else if ($msg === "error_paiement_mode") {
        $msgText = "Erreur ! &nbsp; Veuillez choisir un moyen de paiement";
        $bgColor = " bg-danger";
    }

    //////////////////// PARTEMAIRE //////////////////// 
    /* Save | Update*/
      else if ($msg === "partenaire_created") {
        $msgText = "Bravo ! &nbsp; Ticket commandé avec succès";
        $bgColor = " bg-success";
    } else if ($msg === "partenaire_not_created") {
        $msgText = "Erreur ! &nbsp; Commande échouée";
        $bgColor = " bg-danger";
    } else if ($msg === "partenaire_updated") {
        $msgText = "Bravo ! &nbsp; Partenaire a bien été mise à jour";
        $bgColor = " bg-success";
    } else if ($msg === "partenaire_not_updated") {
        $msgText = "Erreur ! &nbsp; Mise à jour de partenaire échouée";
        $bgColor = " bg-danger";
    /* Show | Edit */
    } else if ($msg === "partenaire_not_fetched") {
        $msgText = "Erreur ! &nbsp; Campagne non trouvé";
        $bgColor = " bg-danger";
    /* Delete */
    } else if ($msg === "partenaire_deleted") {
        $msgText = "Bravo ! &nbsp; Campagne supprimé avec succès";
        $bgColor = " bg-success";
    } else if ($msg === "commande_not_deleted") {
        $msgText = "Erreur ! &nbsp; Suppression de l'évènement échouée";
        $bgColor = " bg-danger";
    } 

    //////////////////// PAIEMENT //////////////////// 
    /* Paiement wizall */
    else if ($msg === "error_paiement_invalid_user_account") {
        $msgText = "Erreur ! &nbsp; Compte utilisateur invalid";
    } else if ($msg === "error_paiement_invalid_user_dev_account") {
        $msgText = "Erreur ! &nbsp; Compte Devéloppeur invalid";
        $bgColor = " bg-danger";
    } else if ($msg === "error_paiement_unauthorized") {
        $msgText = "Erreur ! &nbsp; Paiement échoué (token not valid)";
        $bgColor = " bg-danger";
    } else if ($msg === "error_paiement_incomplete_txn_request") {
        $msgText = "Erreur ! &nbsp; Paiement échoué";
        $bgColor = " bg-danger";
    } else if ($msg === "error_paiement_agent_not_exist") {
        $msgText = "Erreur ! &nbsp; Paiement échoué (compte agent not existe)";
        $bgColor = " bg-danger";
    } else if ($msg === "error_paiement_search_user") {
        $msgText = "Erreur ! &nbsp; Paiement échoué (user not found)";
        $bgColor = " bg-danger";
    } else if ($msg === "error_paiement") {
        $msgText = "Erreur ! &nbsp; Paiement échoué";
        $bgColor = " bg-danger";
    } else if ($msg === "error_paiement_code") {
        $msgText = "Erreur ! &nbsp; Code non valid";
        $bgColor = " bg-danger";
    } else if ($msg === "paiement_success") {
        $msgText = "Bravo ! &nbsp; Merci pour le vote";
        $bgColor = " bg-success";
    } else if ($msg === "paiement_ticket_echec") {
            $msgText = "Erreur ! &nbsp; Paiement echoué. Veuillez ressayer s'il vous plait";
            $bgColor = " bg-danger";
        if (isset($_GET['code'])) {
            if ($_GET['code'] === "TRANSACTION_CANCEL") {
                $msgText = "Erreur ! &nbsp; Paiement echoué. Transaction annulée";
            }
            else if ($_GET['code'] === "UNKNOWN") {
                $msgText = "Erreur ! &nbsp; Paiement echoué. Veuillez ressayer s'il vous plait ...";
            }
        }
    } else if ($msg === "paiement_ticket_success") {
        $msgText = "Bravo ! &nbsp; Paiement valide";
        $bgColor = " bg-success";
        if (isset($_GET['code'])) {
            $msgText = "Bravo ! &nbsp; Veuillez noter le code de votre ticket (".$_GET['code'].")";
        }
    } else {
        $msgText = "...";
        $bgColor = " bg-secondary";
    }
?>
<div class="toast align-items-center text-white <?= $bgColor ?> border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" id=myToastEl>
    <div class="d-flex">
    <div class="toast-body">
        <?= $msgText ?>
    </div>
    <button type="button" id="toastBtn" onclick="return document.getElementById('myToastEl').remove()" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
<?php } ?>
