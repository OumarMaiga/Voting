<?php

    use Model\Vote;

    // Function qui retourne le genre 
    function genre($genre) {
        return $genre == "h" ? "homme" : "femme";
    }
        
    // Retourne le nombre de vote d'un candidat
    function vote_count($event_id, $candidat_id) {
        $vote = new Vote;
        return $vote->getCandidatVoteCount($event_id, $candidat_id);
    }
        
    // Retourne le nombre de point d'un candidat
    function point_count($event_id, $candidat_id) {
        $vote = new Vote;
        return $vote->getCandidatPointCount($event_id, $candidat_id);
    }