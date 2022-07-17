<?php

    use Model\Vote;
    use Model\Commande;

    // Function qui retourne le genre 
    function genre($genre) 
    {
        return $genre == "h" ? "homme" : "femme";
    }
        
    // Retourne le nombre de vote d'un candidat
    function vote_count($event_id, $candidat_id) 
    {
        $vote = new Vote;
        return $vote->getCandidatVoteCount($event_id, $candidat_id);
    }
        
    // Retourne le nombre de point d'un candidat
    function point_count($event_id, $candidat_id) 
    {
        $vote = new Vote;
        return $vote->getCandidatPointCount($event_id, $candidat_id);
    }

    // Liste des commandes d'un ticket
    function ticket_cmd_count($ticket_id)
    {
        $commande = new Commande;
        $ticket_cmd_count = $commande->ticketCommandeCount($ticket_id);
        return $ticket_cmd_count['count'];
    }