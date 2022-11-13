<?php 

    namespace Controller;

    use Model\Event;
    use Model\User;
    use Model\Candidat;
    use Model\Vote;
    use Model\Paiement;
    use Model\Ticket;
    use Model\Commande;

    use API\Wizall;

    class PaiementController {
        
        private $event;
        private $user;
        private $wizall;
        private $candidat;
        private $vote;
        private $paiement;
        private $ticket;
        private $commande;
        
        public function __construct() {
            $this->event = new Event;
            $this->user = new User;
            $this->wizall = new Wizall;
            $this->candidat = new Candidat;
            $this->vote = new Vote;
            $this->paiement = new Paiement;
            $this->ticket = new Ticket;
            $this->commande = new Commande;
        }

        public function paiement_orange_money() {
            $events = $this->event->getAll();

            require('View/page/paiement_orange_money.php');
        }

        public function paiement_wizall() {
            
            $_SESSION['vote']['agent_pin'] = "1001";
            $_SESSION['vote']['agent_number'] = "707511503";
            $_SESSION['vote']['token'] = "jrl95m5V1ZcPVcOIc43zeiRaCu17WJ";
            $_SESSION['vote']['client_number'] = $_POST['client_number'];

            $search_user = $this->wizall->search_user();

            if (isset($search_user->success) && $search_user->success == false) 
            {
                if ($search_user->message == "Invalid User Account")
                {
                    header('location:index.php?action=wizall_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']."&msg=error_paiement_invalid_user_dev_account");
                    exit;
                }
                else if ($search_user->message == 'Unauthorized') 
                {
                    header('location:index.php?action=wizall_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']."&msg=error_paiement_unauthorized");
                    exit;
                }
                else if ($search_user->message == "Incomplete Txn Request") 
                {
                    header('location:index.php?action=wizall_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']."&msg=error_paiement_incomplete_txn_request");
                    exit;
                }
                else
                {
                    header('location:index.php?action=wizall_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']."&msg=error_paiement_search_user");
                    exit;
                }
            }

            if(isset($search_user->code) && $search_user->code == "400") {
                if ($search_user->error == "AGENT_NOT_EXIST") {
                    header('location:index.php?action=wizall_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']."&msg=error_paiement_agent_not_exist");
                    exit;
                } else if($search_user->error == "Invalid User Account") {
                    header('location:index.php?action=wizall_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']."&msg=error_paiement_invalid_user_account");
                    exit;
                } else {
                    header('location:index.php?action=wizall_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']."&msg=error_paiement_search_user");
                    exit;
                }
            }

            if (isset($search_user->profile_name)) {
                $_SESSION['vote']['profile_name'] = $search_user->profile_name;
                
                $getmoney = $this->wizall->getmoney();
                if (isset($getmoney->code) && $getmoney->code != "200") {
                    header('location:index.php?action=wizall_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']."&msg=error_paiement_getmoney");
                    exit;
                }
                
                if (isset($getmoney->transaction_id) && isset($getmoney->name)) {
                    $_SESSION['vote']['transaction_id'] = $getmoney->transaction_id;
                    $_SESSION['vote']['name'] = $getmoney->name;

                    header('location:index.php?action=wizall_confirm_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']);
                    exit;
                    
                }

            }

        }

        public function paiement_wizall_confirm() {
            
            $_SESSION['vote']['code'] = $_POST['code'];
            $confirm = $this->wizall->confirm();
            if (isset($confirm->code) && $confirm->code == "400") {
                header('location:index.php?action=wizall_confirm_page&event_id='.$_SESSION['vote']['event_id'].'&candidat_id='.$_SESSION['vote']['candidat_id']."&msg=error_paiement_code");
                exit;
            }
            if (isset($confirm->Operation) && $confirm->Operation == "AgentGetMoneyConfirm") {
                $inputs = array(
                    'point' => $_SESSION['vote']['point'],
                    'prix' => $_SESSION['vote']['prix'],
                    'candidat_id' => $_SESSION['vote']['candidat_id'],
                    'event_id' => $_SESSION['vote']['event_id']
                );
                $this->vote->save($inputs);
                
                $event_id = $_SESSION['vote']['event_id'];
                unset($_SESSION['vote']);

                header('location:index.php?action=show_event&id='.$event_id."&msg=paiement_success");
                exit;
            }


        }

        public function paiement_mobicash() {
            $events = $this->event->getAll();

            require('View/page/paiement_mobicash.php');
        }

        public function paiement_wave() {
            $events = $this->event->getAll();

            require('View/page/paiement_wave.php');
        }

        public function check_paiement_ticket()
        {            

            // Verification de la transaction
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api-checkout.cinetpay.com/v2/payment/check',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                    "transaction_id": '.$_POST['transaction_id'].', //ENTRER VOTRE TRANSACTION ID
                    "site_id": "112927115762d1e45cb26ef2.15035831", //ENTRER VOTRE SITE ID
                    "apikey" : "229906" //ENTRER VOTRE APIKEY

                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                //echo $err;
                throw new Exception("Error :" . $err);
            } 
            else
            {
                $res = json_decode($response,true);
                //print_r($res);
                if ($res['code'] == "00") 
                {
                    
                    $paiement = $this->paiement->getBy('transaction_id', $_POST['transaction_id'])[0];
                    $ticket = $this->ticket->getById($paiement['ticket_id']);
                    $commande = $this->commande->getById($paiement['commande_id']);

                    $req = $this->commande->update_etat(array('etat' => 'commande', 'id' => $commande['id']));
                    $req->execute();

                    $count = $ticket['count'] - $commande['count'];
                    $req = $this->ticket->update_count($ticket['id'], $count);
                    $req->execute();

                    $req = $this->paiement->update_etat(array("etat" => 1 , "transaction_id" => $_POST['transaction_id']));
                    $req->execute();
                    
                    header('location:index.php?action=buy_ticket&id='.$ticket['id']."&msg=paiement_ticket_success&code=".$commande['code']);                        
                    
                }
                else if ($res['code'] == "627") 
                {
                    header('location:index.php?action=buy_ticket&id='.$ticket['id']."&msg=paiement_ticket_echec&code=TRANSACTION_CANCEL");
                }
                else 
                {
                    header('location:index.php?action=buy_ticket&id='.$ticket['id']."&msg=paiement_ticket_echec&code=UNKNOWN");
                }
            }
            header('location:index.php?action=buy_ticket&id='.$ticket['id']."&msg=paiement_ticket_echec&code=UNKNOWN...");
        }
    }
