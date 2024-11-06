<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $brandController = new BrandController();

    class BrandController{
        function getBrands() : array {

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
                'Authorization: Bearer '.$sessionData['token'],
                'Cookie: XSRF-TOKEN=eyJpdiI6InJZNVNoQ2VtQ3lIdmR3bXRPdk54VFE9PSIsInZhbHVlIjoiVFhleEdzZ3BFclJiR1pNTFIyUHJuMHVEN0lNQm5tVi81aEYvL1JSV2JHT0N1WnorcStsOTNRcUFldVFGd0w3bmRIQXdJZGtQaWgrcmxndUhPV1FDejhUak54UjBPdnBqZktIWDZGNXVIOVFZN0hmenlyUE96cUxudmVUNVQza3IiLCJtYWMiOiJlY2I2MTIyMmY4YmI2NTVmMDgyMjcwNDI2MTg0Yzc0NzA3ZGIyMjk5M2M4YjI0MmIzNzFmZTIyMjAzMzk3MDZjIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Ik9NTThTbWNjVzA5aHUwK3hQaGtiRWc9PSIsInZhbHVlIjoibExuUWhHZWNFdlJQQXVOamFNUVR2VjZueWwzMGVYOVRTMTBKemQrMzVUL3BOVHBsTnlTeU14UmlsUWNVMDhkUXExbUdJMHNKa1M0UU1JV2dXSlVOVDhLRmd6ZkFLQ0dKWk14VkdhanB5UmE5N05mdlZQa1NOd2wwVXVjdmJjMC8iLCJtYWMiOiJkNGQ3NTI3YjMxOTk0OGQ0NWE5ZGVlODExZjFiN2ZhYTZlNTIxMTcxNDg1ZGNkN2UyM2ZhZTJjMjE3NmFkMjA0IiwidGFnIjoiIn0%3D'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            
            $response = json_decode($response, true);
            $data = $response['data'];

            return $data;
        }

    }

?>
