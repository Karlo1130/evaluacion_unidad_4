<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['data'])){

        $_SESSION['message_type'] = "error";
        $_SESSION['message'] = "Variables de session no inicializadas";

        header("Location: " . BASE_PATH . "login");
        exit;
    }

    $brandController = new BrandController();

    class BrandController{
        function get() : array {

            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6InJZNVNoQ2VtQ3lIdmR3bXRPdk54VFE9PSIsInZhbHVlIjoiVFhleEdzZ3BFclJiR1pNTFIyUHJuMHVEN0lNQm5tVi81aEYvL1JSV2JHT0N1WnorcStsOTNRcUFldVFGd0w3bmRIQXdJZGtQaWgrcmxndUhPV1FDejhUak54UjBPdnBqZktIWDZGNXVIOVFZN0hmenlyUE96cUxudmVUNVQza3IiLCJtYWMiOiJlY2I2MTIyMmY4YmI2NTVmMDgyMjcwNDI2MTg0Yzc0NzA3ZGIyMjk5M2M4YjI0MmIzNzFmZTIyMjAzMzk3MDZjIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Ik9NTThTbWNjVzA5aHUwK3hQaGtiRWc9PSIsInZhbHVlIjoibExuUWhHZWNFdlJQQXVOamFNUVR2VjZueWwzMGVYOVRTMTBKemQrMzVUL3BOVHBsTnlTeU14UmlsUWNVMDhkUXExbUdJMHNKa1M0UU1JV2dXSlVOVDhLRmd6ZkFLQ0dKWk14VkdhanB5UmE5N05mdlZQa1NOd2wwVXVjdmJjMC8iLCJtYWMiOiJkNGQ3NTI3YjMxOTk0OGQ0NWE5ZGVlODExZjFiN2ZhYTZlNTIxMTcxNDg1ZGNkN2UyM2ZhZTJjMjE3NmFkMjA0IiwidGFnIjoiIn0%3D'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            
            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";
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

        function getSpecificBrand($id = null) : object {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands/'.$id,
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

    }

?>
