<?php 

    namespace API;

    class Wizall {
        
        
        public function __construct() {
        }

        public function paiement() {
            $return = array();
            // $url will contain the API endpoint
            $url = "https://testagent-api.wizall.com/token/";
            
            // $fields contains all the fields that will be POSTed
            $fields = array( 
                "grant_type"    => "password",
                "client_id"     => "gLUeaiyHdX1yrHenroEsvjlVtYqmbHf8yICoBETu",
                "client_secret" => "6CDITNDC7lqr84glO9h6SyQxu5nEWB5k2AHkiTtlNgmT6m2zfx0YX3FxsfqsmAWeHX4U07pi8zdy3zznfhpN5HtMwjUAgCP8UQaGau8W3e9WrvAYmangIwpDu3LNNncD",
                "username"      => "larcom",
                "password"      => "45636dc79869",
                "scope"         => "*"
            );
            
            // Make the POST request using Curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, true);  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            
            // Decode and display the output
            $api_output =  curl_exec($ch);
            $json_output = json_decode($api_output);
            $output = $json_output ? $json_output : $api_output;
            
            // Clean up
            curl_close($ch);

            /*var_dump($output);
            die();*/

            $return['data'] = $output;
            
            if($output)
            {
                $return['success'] = true;
            }
            else
            {
                $return['success'] = false;

            }

            return $return;

        }


    }