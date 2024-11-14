<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

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

                if(isset($_POST['global_token']) 
                    && $_POST['global_token'] == $_SESSION['global_token']){

                    $name = $_POST['name'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $phone_number = $_POST['phone_number'];
                    $created_by = $_POST['created_by'];
                    $role = $_POST['role'];
                    $password = $_POST['password'];
                    $profile_photo_file = $_POST['profile_photo_file'];

                    $authController->registerUser($name, $lastname, $email, $phone_number, $created_by, $role, $password, $profile_photo_file);
                
                }


                break;

            case 'forgotPassword':

                if(isset($_POST['global_token']) 
                    && $_POST['global_token'] == $_SESSION['global_token']){

                    $email = $_POST['email'];

                    $authController->forgotPassword($email);
                }
                break;
            
            case 'logout':

                if(isset($_POST['global_token']) 
                    && $_POST['global_token'] == $_SESSION['global_token']){

                    $email = $_POST['email'];

                    echo $email;

                    $authController->logout($email);
                }
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

                $_SESSION['data'] = $data;
                $_SESSION['id'] = $data->id;
                $_SESSION['global_token'] = $global_token;
                $_SESSION['message_type'] = "success";

                header("Location: home");
            } else {
                $_SESSION['message_type'] = "error";
                header("Location: login");
            }
            $_SESSION['message'] = $response->message;

        }

        //registra un usuario
        public function registerUser($name = null, $lastname = null, $email = null, $phone_number = null, $created_by = null, $role = null, $password = null, $profile_photo_file = null) {

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
        public function forgotPassword($email = null) {

            $data = $_SESSION['data'];

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
                'Authorization: '. $data->token,
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
                // header("Location: home");
                exit;
            }

            //TODO: cambiar la redireccion a al pantalla correspondiente
            // header("Location: home");

        }

        public function logout($email = null) {

            $curl = curl_init();

            $data = $_SESSION['data'];

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/logout',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('email' => $email),
                CURLOPT_HTTPHEADER => array(
                  'Authorization: '. $data['token'],
                  'Cookie: XSRF-TOKEN=eyJpdiI6IjZMUFA2eW8wVHVSRnk2QnlXV2lwWnc9PSIsInZhbHVlIjoid1gwWERkVlFHZWNmSVBWTGJUOXVaNDRUTXdJblY3V1ZLY3d0OUM4d1hDVUR4SjhjcE1uVTRWVW9XdlJrbFAwMU9FNkc1cVNveDV5ZFpKRldlNWpXTUJmTm1ZdUZkK3JBdE9uSGd4dkkyVEJYbnBXVi9rSGJKQ0R1Yk45Z3FkYVMiLCJtYWMiOiIwY2E4N2IzNGQ0MDQyN2Y0ODE4ZWVhYTMyZjRiMjlhNDNjNzVjMzY4NmExZjdkNTZjNWVmMDQyZDdlZWUwOGFmIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IlU5UDFCbVc4RUd4YVJBVGtFdDlGa1E9PSIsInZhbHVlIjoiL21oRVVFN25OYm1xY2p6b3pxZ2NpL3d4L3FYZURmVk1wS2xIdlVJWFB3dHlwV1lJWVJURjc3cjJLWmdsN3J2OWR2SHRwOE9xdjdQeDRXVE5YZXVxNW1haTI4UkgrOER2QUgyMzFQQ25qZGhVbFVTdmZxSjBzb2pPZml4YVVQZFIiLCJtYWMiOiJmMDIyYzFmMjk3OWU3ZWRjYTI0MmJjOTFlMWI3MTJiMDgyMWM1YTVkOTVjYWE2ZjkwMzJkMzMzYTJkMzliNTc1IiwidGFnIjoiIn0%3D'
                ),
              ));

            $response = curl_exec($curl);

            curl_close($curl);

            $response = json_decode($response, false);

            if(isset($response) && $response->code == 2){
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message_type'] = "error";
            }
            $_SESSION['message'] = $response->message;

            //TODO: cambiar la redireccion a al pantalla correspondiente
            // header("Location: home");
        }
    }

?>