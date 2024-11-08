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
                    // var_dump($clients);
                    break;
                case 'getSpecificClient':
                    $client = $clientsController->getSpecificClient();
                    var_dump($client);
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

        function getSpecificClient() : object {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/4',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6InBVQkRIVzJGS1cwTUhHWWhKSUZYQkE9PSIsInZhbHVlIjoibXFUWkJJUWRxMXZ5WFRYdHFFamhtUWdlanA1U2FQdng2Vjg3QkxFcjFaamd3NHE0RDhVaFNPTkpOVlk0ODROL3Jia0JobGNOVDdqbkowUnB1bUwwL1psZlRJR0ZpZUp6OTlOaHBRVU1FV0t5T0ViUURuaTdQMkIrc2U5cVJBVkwiLCJtYWMiOiIyM2IzNjIzZDkyZDdiMjI3YTUxYjY2NjE0MDU2OTk3ZWUyOGI0MWFmNzU3NWZlYjQ5MTQ1MmExYjI0OGYyNmJiIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IlhOR0hDdG9wekNGby84aUdQOGltUVE9PSIsInZhbHVlIjoic2I1WnVjTTR2V2tNd0xDUlYvZ1pPZjVCSlBnZWdpaHEzckxBYXdQdWtGL2NQOWx6K013Ty95Q1RaOTFvRFNhYi9tQlVJbkZPYWRwaG1CUXNXb1JKanVMVUFLZko4MGQ5Q1JsdW8vdkhCdVc3YnBTOXZWbmttTjVhMXFiUFRTNjMiLCJtYWMiOiIyOWNiNGRhNzgyYTc3ZGRjYjIxNDA4MjkzNDE0ZmM0ODY3MDI0Yjk3OGUwNjc2YzJlMjg4NTA4NjM3NzlkOGI1IiwidGFnIjoiIn0%3D'
            ),
            ));

            $response = curl_exec($curl);
            
            curl_close($curl);

            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";

                //TODO: cambiar la redireccion a al pantalla correspondiente
                // header("Location: home");
                exit;
            }

            $response = json_decode($response, false);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }

            return $response->data;
        }
    }
    
?>