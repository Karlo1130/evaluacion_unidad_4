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

    $ordersController = new OrdersController();
    if(isset($_POST["action"])) {
        if(isset($_POST['global_token']) 
            && $_POST['global_token'] == $_SESSION['global_token']){
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
                    
                    $folio = $_POST['folio'];
                    $total = $_POST['total'];
                    $is_paid = $_POST['is_paid'];
                    $client_id = $_POST['client_id'];
                    $address_id = $_POST['address_id'];
                    $order_status_id = $_POST['order_status_id'];
                    $payment_type_id = $_POST['payment_type_id'];
                    $coupon_id = $_POST['coupon_id'];
                    $presentations = isset($_POST['presentations']) ? $_POST['presentations'] : [];

                    $ordersController->create($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentations);
                    
                    break;
                        
                case 'update':

                    $id = $_POST['id'];
                    $order_status_id = $_POST['order_status_id'];
                    
                    $ordersController->update($id, $order_status_id);

                    break;

                case "delete":
                    
                    $id = $_POST['id'];
                    $ordersController->delete($id);
                    
                    break;
            }
        }
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

                header("Location: " . BASE_PATH . "orders");
                exit;
            }
            
            $response = json_decode($response, false);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;

                header("Location: " . BASE_PATH . "orders");
                
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

                header("Location: " . BASE_PATH . "orders");
                exit;
            }
            
            $response = json_decode($response, false);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;

                header("Location: " . BASE_PATH . "orders");


            }

            if (is_object($response->data)) {
                return $response->data;
            } else {
                return new stdClass();
            }
        }

        function create($folio = null, $total = null, $is_paid = null, $client_id = null, $address_id = null, $order_status_id = null, $payment_type_id = null, $coupon_id = null, $presentations = null) : void {
            $sessionData = $_SESSION['data'];
            
            $index = 0;
            $presentationsArray = [];
            foreach($presentations as $presentation){
                
                $presentationsArray['presentations['. $index .'][id]'] = $presentation['id'];
                $presentationsArray['presentations['. $index .'][quantity]'] = $presentation['quantity'];
        
                $index++;
            }
            
            $orderData = array_merge([
                'folio' => $folio,
                'total' => $total,
                'is_paid' => $is_paid,
                'client_id' => $client_id,
                'address_id' => $address_id,
                'order_status_id' => $order_status_id,
                'payment_type_id' => $payment_type_id,
                'coupon_id' => $coupon_id,
            ], $presentationsArray);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $orderData,
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

            var_dump($response);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;

                header("Location: " . BASE_PATH . "orders");
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
        }
            
        function update($id = null, $order_status_id = null) : void {
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
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'id='.$id.'&order_status_id='.$order_status_id,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6InRodXUwOHk1SnJXNUpLM3VTM2JEU2c9PSIsInZhbHVlIjoiYXp1TTdlOTZDbzJRS25QS2YvdUdzS2hSOU5wMWQ1dFpxbkd3SHFDUXJLckxMVHplenFPUTJHdjNIMzR1a1FLNlU1YzFPUFRZS3hJYjYwR2YxaWZsV25jZTA0dWtQdDVQTGZjUGZrSkU4Q2hFb05wRjNnR0pTZ2F6V3JkblI4NGIiLCJtYWMiOiI1NzAzYmY0YjU5NGRhZjBhODE3MmE4YjI2MGNlOWQ4ZTEyNTY2YTgwNzI5ZWQ4YjJmNWUwNmE3Y2RmNTk0NzA4IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IkwxL2laalFYWFNSTUhrU1Y3cUh3a0E9PSIsInZhbHVlIjoiS0ZnOW5xeDBib29iNWZEYmxJZGhZM1kzNzlYOVh1U0pjWmtmUUkvcGhnckRwbnFNQUE0Mm96OHFUUVppbmxTZDhHOTJUSHZZNVFad2E5eWQyTTVqZktBVTAvcWNNbmhWejFSaFpLdWNXV1BRbk5mRzBaeTlOUENkT1UyTGZqYmMiLCJtYWMiOiIxMWMyNjAwYTkwZDViODNmMjNkNDYyYmIyMzk2ODQwMGViODRmMTczMmQ2ZTZjNmQyZjliZTcxZTliZGEwNTRhIiwidGFnIjoiIn0%3D'
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

            var_dump($response);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;

                header("Location: " . BASE_PATH . "orders");
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
        }

        function delete($id = null) : void {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'DELETE',
                CURLOPT_HTTPHEADER => array(
                  'Authorization: Bearer '.$sessionData->token,
                  'Cookie: XSRF-TOKEN=eyJpdiI6InRodXUwOHk1SnJXNUpLM3VTM2JEU2c9PSIsInZhbHVlIjoiYXp1TTdlOTZDbzJRS25QS2YvdUdzS2hSOU5wMWQ1dFpxbkd3SHFDUXJLckxMVHplenFPUTJHdjNIMzR1a1FLNlU1YzFPUFRZS3hJYjYwR2YxaWZsV25jZTA0dWtQdDVQTGZjUGZrSkU4Q2hFb05wRjNnR0pTZ2F6V3JkblI4NGIiLCJtYWMiOiI1NzAzYmY0YjU5NGRhZjBhODE3MmE4YjI2MGNlOWQ4ZTEyNTY2YTgwNzI5ZWQ4YjJmNWUwNmE3Y2RmNTk0NzA4IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IkwxL2laalFYWFNSTUhrU1Y3cUh3a0E9PSIsInZhbHVlIjoiS0ZnOW5xeDBib29iNWZEYmxJZGhZM1kzNzlYOVh1U0pjWmtmUUkvcGhnckRwbnFNQUE0Mm96OHFUUVppbmxTZDhHOTJUSHZZNVFad2E5eWQyTTVqZktBVTAvcWNNbmhWejFSaFpLdWNXV1BRbk5mRzBaeTlOUENkT1UyTGZqYmMiLCJtYWMiOiIxMWMyNjAwYTkwZDViODNmMjNkNDYyYmIyMzk2ODQwMGViODRmMTczMmQ2ZTZjNmQyZjliZTcxZTliZGEwNTRhIiwidGFnIjoiIn0%3D'
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

            var_dump($response);

            if ($response->code == 2) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;

                header("Location: " . BASE_PATH . "orders");
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
        }
    }
?>