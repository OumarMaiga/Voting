<?php 

    namespace API;

    class Orange {
        
        
        public function __construct() {
        }

        public function get_token() {
            $return = array();
            // $url will contain the API endpoint
            $url = "https://api.orange.com/oauth/v3/token";

            $header = array();
            //$header[] = 'Content-length: 0';
            //$header[] = "Authorization: Basic QU1QSFdXNU1TeUdab1hsQWplNWZWUXc1QXFSaTdZcWo6QzdWUFlhOFVmQWVHQTN6bw";
            $header[] = 'Content-type: application/x-www-form-urlencoded';
            $header[] = 'Accept: application/json';            

            // $fields contains all the fields that will be POSTed
            $fields = array(
                "client_id" => "AMPHWW5MSyGZoXlAje5fVQw5AqRi7Yqj",
                "client_secret" => "C7VPYa8UfAeGA3zo",
                "grant_type" => "client_credentials"
            );
            // access_token = oGhElD0XaEFAHbMbsLknLfuLPYT7
            $json_input = json_encode($fields);
            
            // Make the POST request using Curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt($ch, CURLOPT_HEADER, 0);
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

            /**/var_dump($output);
            die();
            
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