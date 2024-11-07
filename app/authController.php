<?php

    include 'tokenGenerator.php';

    if(isset($_POST['access'])){

        $authController = new AuthController();

        switch ($_POST['access']) {
            case 'access':

                $email = $_POST['email'];
                $password = $_POST['password'];

                $authController->authenticate($email, $password, $global_token);

                break;
            
            case 'register':

                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $created_by = $_POST['created_by'];
                $role = $_POST['role'];
                $password = $_POST['password'];
                $profile_photo_file = $_POST['profile_photo_file'];

                $authController->registerUser($name, $lastname, $email, $phone_number, $created_by, $role, $password, $profile_photo_file);

                break;
            
            default:
                # code...
                break;
        }
    }

    class AuthController{

        //autentica un usuario y setea el global token de la sesion
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

            $response = json_decode($response, false);
            var_dump($response);
            
            if(isset($response) && $response->code == 2){

                $data = $response->data;

                session_start();

                $_SESSION['data'] = $data;
                $_SESSION['id'] = $data->id;
                $_SESSION['global_token'] = $global_token;
                $_SESSION['message_type'] = "success";

                header("Location: home");
            } else {
                $_SESSION['message_type'] = "error";
            }
            $_SESSION['message'] = $response->message;

        }

        //registra un usuario
        public function registerUser($name, $lastname, $email, $phone_number, $created_by, $role, $password, $profile_photo_file) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/register',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('name' => $name,'lastname' => $lastname,'email' => $email,'phone_number' => $phone_number,'created_by' => $created_by,'role' => $role,'password' => $password,'profile_photo_file'=> new CURLFILE($profile_photo_file)),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            
            $response = json_decode($response, false);
            echo $response;

            if(isset($response) && $response['code'] == 4){
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message_type'] = "error";
            }
            $_SESSION['message'] = $response->message;
            header("Location:  home");

        }

        public function forgotPassword() {

        }

        public function logout() {
            
        }
    }

?>