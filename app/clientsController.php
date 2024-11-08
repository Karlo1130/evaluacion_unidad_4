<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $clientsController = new clientsController();

    if(isset($_POST['clients'])){

        // if(isset($_POST['global_token']) 
        //     && $_POST['global_token'] == $_SESSION['global_token']){
            
            switch ($_POST['clients']) {
                case 'get':
                    $clients = $clientsController->get();
                    // var_dump($clients)
                    break;
                case 'getSpecificClient':
                        
                    break;
                case 'create':
                        
                    break;
                case 'update':
                        
                    break;
                case 'delete':
                        
                    break;
                
                default:
                    # code...
                    break;
            }
        // }
    }

    class clientsController {

        function get() : array {
            $sessionData = $_SESSION['data'];
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $response = json_decode($response, false);

            return $response->data;
        }
    }
    
?>