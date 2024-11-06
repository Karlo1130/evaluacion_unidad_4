<?php

    include '../tokenGenerator.php';

    if(isset($_POST['access'])){
        switch ($_POST['access']) {
            case 'access':

                $authController = new AuthController();
                $email = $_POST['correo'];
                $password = $_POST['contrasenna'];

                $authController->authenticate($email, $password, $global_token);

                break;
            
            default:
                # code...
                break;
        }
    }

    class AuthController{
        public function authenticate($email = null, $password = null, $global_token = null){

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            
            if(isset($response)){
                $response = json_decode($response, true);

                $data = $response['data'];
                $id = $data['id'];

                session_start();

                $_SESSION['data'] = $data;
                $_SESSION['id'] = $id;
                $_SESSION['global_token'] = $global_token;

                header("Location: home");
            }

        }
    }

?>