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

            case 'forgotPassword':

                    $email = $_POST['email'];

                    $authController->forgotPassword($email);

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

            if(isset($response) && $response->code == 4){
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message_type'] = "error";
            }
            $_SESSION['message'] = $response->message;

            //TODO: cambiar la redireccion a al pantalla correspondiente
            header("Location:  home");

        }

        //! respuesta a peticiones rara
        //? las respuestas tienen sentido?
        public function forgotPassword($email) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/forgot-password',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email),
            CURLOPT_HTTPHEADER => array(
                'Cookie: XSRF-TOKEN=eyJpdiI6IkpoS2w1ZDdzYXByZ3AxM1E3SFBCaFE9PSIsInZhbHVlIjoiQktUK3p4VEtjL0NBWWFvamg0UEovcVBXVHNPQXJnNndmejZmLzdCdENtdHpGMDJJbUQvT1NVdWV0Q2tZbHd5YlY3bkxUWnlDMDVPVVp6Z2dnYUlnOGlnVUlmWVd2UllqcGwvaWQ1aTZlTUpMbFdvWWFJc3RaV0d4SkdVN1MzdU0iLCJtYWMiOiIzZTU3MGU1MWMyMDkwM2FkMDcxNGFhZWRkMjg2NTMwYWRhZmYyNGRhNmQ4MTIzYTFiMjhkM2Q3OTFkNzcxMTU4IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IlFOd1kzUDVjTllQOWFMdGx4SWg1bkE9PSIsInZhbHVlIjoiVjlBelpremdkWGNBZU80VkxTVkJtMnR1dFkxVVhNN3FlZE9BRXNFT2tvQ056dUVJNXZRdXhoSGtEenpHcmJ6RXh3U3B4ZE5MT0xZYVFaNWFndk9VMEhZWlFRR2llMzlRbC9ibUJjUXJvdVdOanhtUldmMkIyNHBOK0ZMZEdZR0QiLCJtYWMiOiIyYjU5MWQxZTFiZDU1MzA3MWFmYmNkOGRmOTIzNGJjZDc5NzljMGE0OGRlMjk5OGJkMGE3NWI5OTBmNzliMjYwIiwidGFnIjoiIn0%3D'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            
            $response = json_decode($response, false);
            var_dump($response);

            if(isset($response) && $response->code == 4){
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
                //TODO: enviar a front la contrasena del usuario
                //*la unica respuesta de la api es passswords.throttled si es un email correct y user si es un email inexistente
            } else {
                //* solo se ejecuta si response es null (no contiene mensaje)
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "No se obtuvo una respuesta";
                //TODO: cambiar la redireccion a al pantalla correspondiente
                header("Location:  home");
                exit;
            }

            //TODO: cambiar la redireccion a al pantalla correspondiente
            header("Location:  home");

        }

        public function logout() {
            
        }
    }

?>