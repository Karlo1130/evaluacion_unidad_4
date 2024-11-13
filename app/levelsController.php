<?php
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $levelsController = new LevelsController();
    if(isset($_POST["action"])) {
        // if(isset($_POST['global_token']) 
        //     && $_POST['global_token'] == $_SESSION['global_token']){
            switch($_POST["action"]){
                case 'get':
                    var_dump($levelsController->get());
                    break;
                case 'getSpecificLevel':
                    var_dump($levelsController->getSpecificLevel());
                    break;
                    
                case "create":
                    $name = $_POST['name'];
                    $percentage_discount = $_POST['percentage_discount'];
                    
                    $levelsController->create($name, $percentage_discount);
                    break;

                case 'update':
                    
                    break;
    
                case "delete":
                
                    
                    
                    break;
            }
        // }
    }
    class LevelsController {
        function get() : array {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
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
        function getSpecificLevel() : object {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels/'.$_GET['id'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
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

        function create($name = null, $percentage_discount = null) : void {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('name' => $name,'percentage_discount' => $percentage_discount),
                CURLOPT_HTTPHEADER => array(
                  'Authorization: Bearer '.$sessionData->token,
                  'Cookie: XSRF-TOKEN=eyJpdiI6IlpaR3JmQzZwSzZLRllFS28rcU45NWc9PSIsInZhbHVlIjoiY1h0UDJhZ1B4RXVVKzlCb0srT2R6M3pOc0g3RjkzUklIMnJ3cHl1NGxabDhEdnRmOHl5QStoSkpuTzRNU2ZxNi9LazRaR3BIejN3RTd6SVdScVIwU0N1eDljQVpqOG9EbGI4Y0M5ZndyZ0duOWQxL2NYQXJtS0FUUXNsdUZvSUQiLCJtYWMiOiJkZWNiYWM2ODU0NjViMjNkMDIzOTVjZDhiN2E2ZDJhMmZkNjE4MGYyZTk0MDFlYmRhOTIzNGQ3ZTU5ZjBhMTQyIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6ImVDYS9IWnpNcTNBMEVFQUZVK0o3cnc9PSIsInZhbHVlIjoiM3JmQVM4aVE4d3BKVmc0TWZscExpUFp1ek1rZzFMZTl5OC8wNGp5Mnp2VHdybUFPRzBGQ2ZHc2RvelRMeHFKYUdwajNodTV2N3dTT25OaXZRb1kzOFIxS1pvTndLcUh4YStIaHk0Y3pnTjZTRDNHbkJUaExQa2VRYVlsMHI3NmciLCJtYWMiOiJjZDUzY2QyZmQ0MDBjYzk4NzIyOGVlZmU1NDFlNDNiYzg2OTFhNDRmMzI4Mjk4Yjg0YzlmNzI3NTk1MWFlNzFlIiwidGFnIjoiIn0%3D'
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
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
        }

        function update() : void {

        }

        function delete() : void {
            
        }
    }
?>