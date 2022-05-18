<?php 

    namespace API;

    class Wizall {
        
        
        public function __construct() {
        }

        public function get_token() {
            $return = array();
            // $url will contain the API endpoint
            $url = "https://testagent-api.wizall.com/token/";

            // $fields contains all the fields that will be POSTed
            $fields = array(                
                "username" => "larcom",
                "grant_type" => "password",
                "client_type" => "public",
                "client_id" => "gLUeaiyHdX1yrHenroEsvjlVtYqmbHf8yICoBETu",
                "client_secret" => "6CDITNDC7lqr84glO9h6SyQxu5nEWB5k2AHkiTtlNgmT6m2zfx0YX3FxsfqsmAWeHX4U07pi8zdy3zznfhpN5HtMwjUAgCP8UQaGau8W3e9WrvAYmangIwpDu3LNNncD",
                "password" => "45636dc79869"
            );
            $json_input = json_encode($fields);
            
            // Make the POST request using Curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, true);  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_input);
            
            // Decode and display the output
            $api_output =  curl_exec($ch);
            $json_output = json_decode($api_output);
            $output = $json_output ? $json_output : $api_output;
            
            //Ajouter le status
            $response =  curl_getinfo($ch);
            $output->status = $response['http_code'];
            
            // Clean up
            curl_close($ch);

            /*var_dump($output);
            die();*/
            
            return $output;
        }
        
        public function search_user() {
            $return = array();
            // $url will contain the API endpoint

            $url = "https://testagent-api.wizall.com/api/agent/getmoney/search-user/";

            $fields = array( 
                "tomsisdn" => $_SESSION['vote']['client_number'],
                "agent_pin" => $_SESSION['vote']['agent_pin'],
                "agent_msisdn" => $_SESSION['vote']['agent_number'],
                "country" => "sn"
            );
            $json_input = json_encode($fields);
            
            $headers = array(
                "Accept: application/json",
                "Authorization: Bearer ".$_SESSION['vote']['token'],
            );

            // Make the POST request using Curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);            
            curl_setopt($ch, CURLOPT_POST, true);  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_input);
            
            // Decode and display the output
            $api_output =  curl_exec($ch);
            $json_output = json_decode($api_output);
            $output = $json_output ? $json_output : $api_output;
            
            //Ajouter le status
            $response =  curl_getinfo($ch);
            $output->status = $response['http_code'];

            // Clean up
            curl_close($ch);

            /*var_dump($output);
            die();*/
            
            return $output;
        }
        
        public function getmoney() {
            $return = array();
            // $url will contain the API endpoint

            $url = "https://testagent-api.wizall.com/api/agent/getmoney/";
            $fields = array (                 
                "msisdn" => $_SESSION['vote']['client_number'], 
                "agent_msisdn" => $_SESSION['vote']['agent_number'], 
                "agent_pin" => $_SESSION['vote']['agent_pin'], 
                "amount" => $_SESSION['vote']['prix'],
                "profile_name" => $_SESSION['vote']['profile_name'],
                "country" => "sn" 
            );
            $json_input = json_encode($fields);
            
            $headers = array(
                "Accept: application/json",
                "Authorization: Bearer ".$_SESSION['vote']['token'],
            );
            // Make the POST request using Curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_input);
            
            // Decode and display the output
            $api_output =  curl_exec($ch);
            $json_output = json_decode($api_output);
            $output = $json_output ? $json_output : $api_output;
            
            //Ajouter le status
            $response =  curl_getinfo($ch);
            $output->status = $response['http_code'];

            // Clean up
            curl_close($ch);

            /*var_dump($output);
            die();*/
    
            return $output;
        }
        
        public function confirm() {
            $return = array();
            // $url will contain the API endpoint

            $url = "https://testagent-api.wizall.com/api/agent/getmoney/confirm/";
            $fields = array( 
                "transaction_id" => $_SESSION['vote']['transaction_id'], 
                "agent_msisdn" => $_SESSION['vote']['agent_number'], 
                "agent_pin" => $_SESSION['vote']['agent_pin'], 
                "name" => $_SESSION['vote']['name'],
                "otp" => $_SESSION['vote']['code'],
                "country" => "sn" 
            );
            $json_input = json_encode($fields);
            
            $headers = array(
                "Accept: application/json",
                "Authorization: Bearer ".$_SESSION['vote']['token'],
            );
            // Make the POST request using Curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_input);
            
            // Decode and display the output
            $api_output =  curl_exec($ch);
            $json_output = json_decode($api_output);
            $output = $json_output ? $json_output : $api_output;
            
            //Ajouter le status
            $response =  curl_getinfo($ch);
            $output->status = $response['http_code'];

            // Clean up
            curl_close($ch);

            /*var_dump($output);
            die();*/
    
            return $output;
        }
        
        public function transaction_list() {
            $return = array();

            $agent_number = "707511503";
            $agent_pin = "1001";
            $transaction_id = "4579089";
            $token = "jrl95m5V1ZcPVcOIc43zeiRaCu17WJ";

            // $url will contain the API endpoint
            $url = "https://testagent-api.wizall.com/api/transactions/list/";
            $fields = array( 
                "agent_msisdn" => $agent_number,
                "agent_pin" => $agent_pin,
                "trans_id" => $transaction_id,
                "country" => "sn"
            );
            $json_input = json_encode($fields);
            
            $headers = array(
                "Content-Type: application/json",
                "Authorization: Bearer ".$token
            );
            // Make the POST request using Curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_input);
            
            // Decode and display the output
            $api_output =  curl_exec($ch);
            $json_output = json_decode($api_output);
            $output = $json_output ? $json_output : $api_output;
            
            //Ajouter le status
            $response =  curl_getinfo($ch);
            $output->status = $response['http_code'];

            // Clean up
            curl_close($ch);

            /*var_dump($output);
            die();*/
    
            return $output;
        }
    }