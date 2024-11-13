<?php
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $presentationController = new PresentationController();

    if(isset($_POST["action"])) {

        // if(isset($_POST['global_token']) 
        //     && $_POST['global_token'] == $_SESSION['global_token']){
            switch($_POST["action"]){
                case 'getPresentations':
                    var_dump($presentationController->getPresentations());
                    break;

                case 'getSpecificPresentation':
                    var_dump($presentationController->getSpecificPresentation());
                    break;
                
                case 'update':

                    

                    break;

                case 'updatePrice':

                    
                    break;

                case "create":
                    
                    
                    break;
    
                case "delete":
                
                    
                    
                    break;

            }
        // }
    }

    class PresentationController {

        function getPresentations() : array {
            
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/product/'.$_GET['id'],
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

            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";

                header("Location: ".BASE_PATH."products/");
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

            if (is_array($response->data)) {
                return $response->data;
            } else {
                return [];
            }
        }

        function getSpecificPresentation() : object {
            
        }

        function update() : void {
            
        }

        function updatePrice() : void {
            
        }

        function create() : void {
            
        }

        function delete() : void {
            
        }
    }

?>