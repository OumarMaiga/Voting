<?php 

    namespace Controller;

    use Model\Event;
    use Model\User;

    class PageController {
        
        private $event;
        private $user;
        
        public function __construct() {
            $this->event = new Event;
            $this->user = new User;
        }

        public function accueil() {
            $events = $this->event->getAll();

            require('View/page/accueil.php');
        }        
    }