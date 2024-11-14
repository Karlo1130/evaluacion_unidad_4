<?php
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $levelsController = new LevelsController();
    if(isset($_POST["action"])) {
        if(isset($_POST['global_token']) 
            && $_POST['global_token'] == $_SESSION['global_token']){
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
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $percentage_discount = $_POST['percentage_discount'];

                    $levelsController->update($id, $name, $percentage_discount);
                    
                    break;
    
                case "delete":
                    $id = $_POST['id'];
                    
                    $levelsController->delete($id);
                    
                    break;
            }
        }
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

        function update($id = null, $name = null, $percentage_discount = null) : void {
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
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => 'id='.$id.'&name='.$name.'&percentage_discount='.$percentage_discount,
                CURLOPT_HTTPHEADER => array(
                  'Content-Type: application/x-www-form-urlencoded',
                  'Authorization: Bearer '.$sessionData->token,
                  'Cookie: XSRF-TOKEN=eyJpdiI6InQ0WUsxcUZKYno0K3ZoQ0RjZTVWckE9PSIsInZhbHVlIjoiM1dZNjhPKzdrNm9hZWlOSUlBWXM3MzRZM2JuQWJ0U25FNUxZb0JZTldBcWlDY3BSTDlvb1N5THk1SFE2Sldub3dlVGxNS3VqMUVUelJ1U21ScE1JdFgzM3VjYXkrbTd1aGcxRHlGSjNXeGhuc1Frb293cm0ycncyTHhyckhZb2wiLCJtYWMiOiJjM2VjNTcyZTFkY2EwMjZhY2MzNDI2OWNmOTlkZDczN2I1ZDVjMmNjNjM2YjcwY2JmZDJiMTUyNjlkZTM0ODQwIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Ijk1QjNuMVdOWkNGajN2TjNxUUsxSmc9PSIsInZhbHVlIjoiY1oycTBxQnEvVC9xSjRXTVF6bm1KZzhpaWxycktXR3pObnlUZWVnMHdTaXp2S1dTYTBHMHhTaXR6VDZ1TzhjamIvd3lVUHRyNjhubFowS1pDSnRMcXJlQ2lmL1dqSDMyM2xKajJNYVQ0dEJ5aUlTWnlpUnNkR1VxRk5mdDQ5bkIiLCJtYWMiOiJkMmM3YzRiZGY4YWY1NDY1YzIyNmRhYjI1YWRjM2YwNWI0MmRmMzFjNzBhZTMzMzc4MmI2M2NjZDkyYjg1YmU2IiwidGFnIjoiIn0%3D'
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

        function delete($id = null) : void {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels/'.$id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'DELETE',
                CURLOPT_HTTPHEADER => array(
                  'Authorization: Bearer '.$sessionData->token,
                  'Cookie: XSRF-TOKEN=eyJpdiI6Inc3eU9pSTcyT1g3di9ML2VBTG40NUE9PSIsInZhbHVlIjoiWG0rQ0R4MGpWb2J6VWpka0xRMDJadWxscVc3VmtsNHF0OUsvdjBhQUhGMmxQSjQ1cHRwQVNRQUxzeXRXc0FWdkExMVB1N0tIT09MSnZNc2dGTlp2NUpwbTFTUnY5anRGZEtMSFNic2VoWml1VC9oUk5QZWljM2drQjJMMjNMZHQiLCJtYWMiOiIxMWRhNGZiMTVjZDYwMDEyZGJmZmQxZWVjNmUwNDlkYTNlM2QyOTRiYjU3MGUyYzE2YTk4NWI5ZjUyYzMyNzI3IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6InJpWnpCVnBpbTJDYnc4M05ua0R6bUE9PSIsInZhbHVlIjoiWjdxbU1QSEE3K2ovR3pwSGlLenZlS3BlbkJUSlNNcHgvc1BqR25iRFFvemM4MHFyUUZ0aVNaS0JZM3R2VjdLQjhRQ1FLWkFpVWtQNXdHWTZ6T2VQYSttSDVBZTNvMFcrUExqSVNBOTFkVEhqVDZhZi9GdGFkS0NQWVVJYWRjbEEiLCJtYWMiOiIyMTE1MWU0OGI3Zjg0ZDJjMWFhZTA4MTQ3OGFhMWExYmI5NDUzZGM4YThjOGVmNTRiYzM0ZDdmZWE2ZjdiYTQyIiwidGFnIjoiIn0%3D'
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
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
        }
    }
?>