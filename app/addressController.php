<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $addressController = new AddressController();

    if(isset($_POST['action'])){

        // if(isset($_POST['global_token']) 
        //     && $_POST['global_token'] == $_SESSION['global_token']){
            
            switch ($_POST['action']) {

                case 'getByClient':
                    $id = $_POST['id'];
                    var_dump($addressController->getByClient($id));
                    break;
                    
                case 'create':
                    
                    break;
                    
                    case 'update':
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $street_and_use_number = $_POST['street_and_use_number'];
                        $postal_code = $_POST['postal_code'];
                        $city = $_POST['city'];
                        $province = $_POST['province'];
                        $phone_number = $_POST['phone_number'];
                        $is_billing_address = $_POST['is_billing_address'];
                        $client_id = $_POST['client_id'];
                        $id = $_POST['id'];
                        
                        $addressController->update($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $id);
                        
                    break;
                    
                case 'delete':
    
                    break;
                    
            }
        // }
    }

    class AddressController{

        function getByClient($id = false) : Object {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6ImlRY05hWlJkckN2enlrT3F4S0l1NVE9PSIsInZhbHVlIjoiQ1l1Q2wzWnY3ekhQVVo0L1VLSnhoREl1ckNVcTJ6T1pJYWsyRTBkM1JucFNyRlRoNHpIaXlVT2dsRzVqSGkzeHlGWjdnV2RhdGpReWxwakRoTEpua1RmZXErdnNtSXVSOVJqZUVWWVB1dXJ4ZURrQmhlNGFOamxrMnRPL3Y4MnUiLCJtYWMiOiI2YTE1YzNiYWRlMjBlMWE2MzE4OTk5NTg0OTE3NzkzMTY3N2NlN2I1NjJlNDBiMjIxYWQ4OGEyYjZhNTZmMDc3IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IkFpTUdpUmQ5MHVwY0FGRzd6bk1wRUE9PSIsInZhbHVlIjoiNXFYdE91RC9sZEZDOFBRNWFrSjk1Yk41YnNOaHBVQWV0Q1NpYjJGZFN6SzhvTXNJRER6NUxkTzFCaE5KV25KQnZJOU4vYXprQ0NqckhhdzVDZWxwVDh3SkRVMm9JTFFoRTdVanpHc0kveXc4Yk1CYUVwV3l0RmZ3Zmx1NmR1RkQiLCJtYWMiOiJhZDJkZmQ5ZjQ0ZGI1ZGZmYzhkYjcxOThkYzBlM2QwYzJhYzlmNGQ1ZDZjM2IxMWM2YjJjYmZmYjk0MGQ1YmI5IiwidGFnIjoiIn0%3D'
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
            
            if (is_object($response->data)) {
                return $response->data;
            } else {
                return new stdClass();
            }

        }

        function update($first_name = null, $last_name = null, $street_and_use_number = null, $postal_code = null, $city = null, $province = null, $phone_number = null, $is_billing_address = null, $client_id = null, $id = null) : void {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/examen_4/app/addressController.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'first_name='.$first_name.'&last_name='.$last_name.'&street_and_use_number='.$street_and_use_number.'&postal_code='.$postal_code.'&city='.$city.'&province='.$province.'&phone_number='.$phone_number.'&is_billing_address='.$is_billing_address.'&client_id='.$client_id.'&id='.$id,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: PHPSESSID=eq4fbqlsnvmtllldtljro00ru2'
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
            
        }
    }
?>