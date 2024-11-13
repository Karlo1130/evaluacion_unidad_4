<?php
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $ordersController = new OrdersController();
    if(isset($_POST["action"])) {
        // if(isset($_POST['global_token']) 
        //     && $_POST['global_token'] == $_SESSION['global_token']){
            switch($_POST["action"]){
                case 'get':
                    var_dump($ordersController->get());
                    break;
                case 'getOrdersBetweenDates':
                    var_dump($ordersController->getOrdersBetweenDates());
                    break;
                case 'getSpecificOrder':
                    var_dump($ordersController->getSpecificOrder());
                    break;
                        

                case "create":
                    
                    
                    break;
                        
                case 'update':
                    
                    break;

                case "delete":
                
                    
                    break;
            }
        // }
    }
    class OrdersController {
        function get() : array {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6IjZWdFRHTVV3dnFONmJablduaW10TUE9PSIsInZhbHVlIjoiaXF6NndjaTAzcjRlVDdRR3lIVzZCb0IzQzFTQmRmNnZ1ODRnM3d2OTZZeVphbGh4djFoMEg5YkJGeGx0QVh3eGFGU0J6a0UzSElyR241bmJadlVMU29WMmc4NlFZcnFadU1OSEw2TVJXNjNmam5tKyttaTNWcitENXczM2JMR2QiLCJtYWMiOiIyMTBkMzlkZGNiMzYwZGM2YzAyMWY5MGFlYzA0YTRlYzAxYjBlYWJmMmMyOGIwNmRhODZmMWNjNDQ4OTc1MWViIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Im1UQlgzN0Q0ZFRraXJUNUlHUmdxRVE9PSIsInZhbHVlIjoiRkNHb1k5eURUOURrWW80a2x1aU12d09HaEkrQ3pNa2JWRUxBY2diTlFQTG03S1Z6My91REJtUGdqSy8yTTduNlVncjE0ekViQ2RIcjNPLzZta1lodEhwdUpaZEhISU9qeDFaZW5jZVhEeGlUNWUyQXc5SzNyc2R0N050cWlqR2UiLCJtYWMiOiJlZTRmZjU5NTI3Njg0YTlkNzI3ZGNkOTMzYmNhMWQyNTliNjJkZmMwMGRiZTNmYWYxYTJlODVmYmRjMGNkNjczIiwidGFnIjoiIn0%3D'
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

        function getOrdersBetweenDates($firstDate = null, $lastDate = null) : array {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$firstDate.'/'.$lastDate,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6IkFiY2lJRGFuSmdUdDNsK3pVQmduWHc9PSIsInZhbHVlIjoiOHdkRXpLQm5yMVNlV2hvRkxOdXg0b3Y3UHVtSVcwbDl2SzUwcUg2QXFacXA4TU5tTmVERTZCMUFnM01odHFqT25lYlpONWxIT2FkUSt6b1hNcEFCWEtNMERUNi9kMDFnNjl1dmJRKzNQMU1LcVJzSVJ2THFZV2FvcDFicG83Z2YiLCJtYWMiOiJjZjkyNjc0ZjhjNmIyNzM5ZjkwMWZjOWFmOWZhMjBhNjg3YTI3ZjNiZGUwODg1MzdjMWQzYWRiMzVhNmQ2MWYwIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IlI3L2pXMlU2dElLREhpZDNDa0o0Ymc9PSIsInZhbHVlIjoiWWtGQytid2tURE9CcnFQZkhoQms5VDhlaEV3ejZBWkt5TzhLYTFCZ3RYLzg2clVndGgwRWc4TUN4cnZUa05lY1NORTQwMmlob0IreklteFdBNGY1aHVESWJWTklkRTE5Sm11cWg1SE1Lb2taRnk2YlNyaXRDemZMcmtiQys4SDciLCJtYWMiOiJkOGRkYWVmMTlhNWQwMDZkNTUyNDYxZDRhNTA1N2NmOWVjYmI4NjJhMmQ3NzFmOTZiMDE1M2Q3YzY3OTU3NzQ2IiwidGFnIjoiIn0%3D'
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
                return [null];
            }
        }

        function getSpecificOrder() : object {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/details/'.$_GET['id'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6ImtUY3huckZZUjRNTDljN1FONDlQbEE9PSIsInZhbHVlIjoiMHVNSWZnQk81bEdWbXFnb0tESU9sYkh5WmZLMU9nNWxEM2VFL29YcktLU2VCMTlWdjNHUG40dXN4YWVqQ1dBRzZySUw2MUkwa21pbFFrQVRRK3ZzcWJLT292UEJXdG5QY0krOEU1UmliMXJqa2hVTUdQWW5GQlRSa2E5VEc2dC8iLCJtYWMiOiI5NWE1NTg2YjM3Mjg3NTNkNGI1NDk3NWQ1MDdjNTMxMTdlYjRmZDZhZDM0NzczNmNmOWEwNjk2OGMyZjBkMzUyIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Im0wUFAxT3c3b1EvSVRXd3ZhNC92eHc9PSIsInZhbHVlIjoiMkRPSTR3S0ZCMTNjWFY1eCthblFOWVJ6VVdBZXV4azZFVjBQd2lhZzdGNkF4VkxtKzFTZ0xHSVZkemE3M0dmK1hkWEZLMVFNekNOVmkyQnpwV1pWRTNGY0tvRVFnWVd4UUFSS2JFYXV3L2pDU01BSnVlbkxCRE9RMlo5M0ovT2wiLCJtYWMiOiJjZmJhZjFmNGQ5Nzk1MzcwMmYwMDQ1M2M5YTJmYzQ3MWVkODAyZjkyY2Y0ZDJhNTY2OThhODAzOTZmZjUyOWFjIiwidGFnIjoiIn0%3D'
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

        function create() : void {
            
        }
            
        function update() : void {
            
        }

        function delete() : void {
            
        }
    }
?>