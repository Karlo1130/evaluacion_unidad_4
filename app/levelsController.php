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

        function create() : void {
            
        }

        function update() : void {

        }

        function delete() : void {
            
        }
    }
?>