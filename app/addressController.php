<?php

    include_once "config.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['data'])){

        $_SESSION['message_type'] = "error";
        $_SESSION['message'] = "Variables de session no inicializadas";

        header("Location: " . BASE_PATH . "login");
        exit;
    }

    $addressController = new AddressController();

    if(isset($_POST['action'])){

        if(isset($_POST['global_token']) 
            && $_POST['global_token'] == $_SESSION['global_token']){
            
            switch ($_POST['action']) {

                case 'getByClient':
                    var_dump($addressController->getByClient());
                    break;
                    
                case 'create':
                    
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $street_and_use_number = $_POST['street_and_use_number'];
                    $postal_code = $_POST['postal_code'];
                    $city = $_POST['city'];
                    $province = $_POST['province'];
                    $phone_number = $_POST['phone_number'];
                    $is_billing_address = $_POST['is_billing_address'];
                    $client_id = $_POST['client_id'];

                    $addressController->create($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id);

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
                    $id = $_POST['id'];

                    $addressController->delete($id);
                    break;
                    
            }
        }
    }

    class AddressController{

        function getByClient() : Object {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/'.$_GET['id'],
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

                // ?redireccionarlo a donde si no se obtiene respuesta
                // header("Location: " . BASE_PATH . "?");

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

        function create($first_name = null, $last_name = null, $street_and_use_number = null, $postal_code = null, $city = null, $province = null, $phone_number = null, $is_billing_address = null, $client_id = null) : void {

            $sessionData = $_SESSION['data'];
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('first_name' => $first_name,'last_name' => $last_name,'street_and_use_number' => $street_and_use_number,'postal_code' => $postal_code,'city' => $city,'province' => $province,'phone_number' => $phone_number,'is_billing_address' => $is_billing_address,'client_id' => $client_id),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6Ik0wN044TzNoV3ZtdkFQNWRvV2pBVVE9PSIsInZhbHVlIjoiV205TzhvcW5jTHJrdGlnV3ZXU0o4M3V5QXppRnEvSGtacFE5NlF1ZTNjUVh2YUJjT3UrOEpBb1JWYjRHWE9iR28vaHRjdjExRmRsWWVjZVZ5dkNmYWN6NkpnZ0JKcE5mYjFFVXBldmF3aE01Wm1FWGh5S1Vpam9aV2sraXkvN08iLCJtYWMiOiIwNzk1Njc4MjJjMWM5Y2NmY2UxMjZjMmYwY2ExYjdkNTM1YWNkYTJlYmNjZTk5NTlkMDU4Y2Y3ZThkMmMwMDIzIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IkV2d2NFc2QvTUtBUVMvSVhyYlVnR2c9PSIsInZhbHVlIjoid2Z3M1NvWTFwVHNXNEdDOFRQM0p3b2M5dnFyWWtPbHIvTkJyeEJoRHNaNCtjU2x3eENEeG5pWUdub3owOGhiUGRCNk1YbUZ4RkJWblNmZ1VqeWIxYTVYREJ6M3VtMW1QTUlLK1hrNmV5ZmVtOUNoV25ndXRXY2RBQmtOaEU2NUoiLCJtYWMiOiI1NWNkZTUyMDU0MjQ0YTY0OWU5YzE3NGZhMDdkYWIzODdiYTU5YzM1YmE5ODA1MzA1YjRkNWNkODlkOGJmOWIzIiwidGFnIjoiIn0%3D'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";

                // ?redireccionarlo a donde si no se obtiene respuesta
                // header("Location: " . BASE_PATH . "?");
                exit;
            }

            $response = json_decode($response, false);

            var_dump($response);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;

            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
            header("Location: " . BASE_PATH . "clients/".$client_id);
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

                // ?redireccionarlo a donde si no se obtiene respuesta
                // header("Location: " . BASE_PATH . "?");
                exit;
            }

            $response = json_decode($response, false);

            var_dump($response);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
            
        }

        function delete($id = null) : void {
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
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6Ik0wN044TzNoV3ZtdkFQNWRvV2pBVVE9PSIsInZhbHVlIjoiV205TzhvcW5jTHJrdGlnV3ZXU0o4M3V5QXppRnEvSGtacFE5NlF1ZTNjUVh2YUJjT3UrOEpBb1JWYjRHWE9iR28vaHRjdjExRmRsWWVjZVZ5dkNmYWN6NkpnZ0JKcE5mYjFFVXBldmF3aE01Wm1FWGh5S1Vpam9aV2sraXkvN08iLCJtYWMiOiIwNzk1Njc4MjJjMWM5Y2NmY2UxMjZjMmYwY2ExYjdkNTM1YWNkYTJlYmNjZTk5NTlkMDU4Y2Y3ZThkMmMwMDIzIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IkV2d2NFc2QvTUtBUVMvSVhyYlVnR2c9PSIsInZhbHVlIjoid2Z3M1NvWTFwVHNXNEdDOFRQM0p3b2M5dnFyWWtPbHIvTkJyeEJoRHNaNCtjU2x3eENEeG5pWUdub3owOGhiUGRCNk1YbUZ4RkJWblNmZ1VqeWIxYTVYREJ6M3VtMW1QTUlLK1hrNmV5ZmVtOUNoV25ndXRXY2RBQmtOaEU2NUoiLCJtYWMiOiI1NWNkZTUyMDU0MjQ0YTY0OWU5YzE3NGZhMDdkYWIzODdiYTU5YzM1YmE5ODA1MzA1YjRkNWNkODlkOGJmOWIzIiwidGFnIjoiIn0%3D'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";

                // ?redireccionarlo a donde si no se obtiene respuesta
                // header("Location: " . BASE_PATH . "?");
                exit;
            }

            $response = json_decode($response, false);

            var_dump($response);

            if ($response->code == 2) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
            
        }
    }
?>