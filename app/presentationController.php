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

    $presentationController = new PresentationController();

    if(isset($_POST["action"])) {

        if(isset($_POST['global_token']) 
            && $_POST['global_token'] == $_SESSION['global_token']){
            switch($_POST["action"]){
                case 'getPresentations':
                    var_dump($presentationController->getPresentations());
                    break;

                case 'getSpecificPresentation':
                    var_dump($presentationController->getSpecificPresentation());
                    break;
                
                case 'update':

                    $description = $_POST['description'];
                    $code = $_POST['code'];
                    $weight_in_grams = $_POST['weight_in_grams'];
                    $status = $_POST['status'];
                    $stock = $_POST['stock'];
                    $stock_min = $_POST['stock_min'];
                    $stock_max = $_POST['stock_max'];
                    $product_id = $_POST['product_id'];
                    $id = $_POST['id'];
                    $amount = $_POST['amount'];

                    $presentationController->update($description, $code, $weight_in_grams, $status, $stock, $stock_min, $stock_max, $product_id, $id, $amount);

                    break;

                case 'updatePrice':

                    $id = $_POST['id'];
                    $amount = $_POST['amount'];

                    $presentationController->updatePrice($id, $amount);

                    break;

                case "create":
                    
                    $description = $_POST['description'];
                    $code = $_POST['code'];
                    $weight_in_grams = $_POST['weight_in_grams'];
                    $status = $_POST['status'];
                    $cover = $_FILES["cover"]["tmp_name"];
                    $stock = $_POST['stock'];
                    $stock_min = $_POST['stock_min'];
                    $stock_max = $_POST['stock_max'];
                    $product_id = $_POST['product_id'];
                    $amount = $_POST['amount'];
                    
                    $presentationController->create($description, $code, $weight_in_grams, $status, $cover, $stock, $stock_min, $stock_max, $product_id, $amount);

                    break;
    
                case "delete":
                
                    $id = $_POST['id'];
                    $presentationController->delete($id);
                    
                    break;

            }
        }
    }

    class PresentationController {

        function getPresentations() : array {
            
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/product/'.$_GET['id'],
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

                header("Location: ".BASE_PATH."products/");
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

        function getSpecificPresentation() : object {

            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/'.$_GET['id'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6IlgxKzlyenRNcTFmdzFENExSemdUK3c9PSIsInZhbHVlIjoiZlNucGtadTM5ODZ5SEFuQithRVRuK2dUaXFxVDZUcDFVaVlxdm9LR3p3MzdmTTVtTExCMlRxZVhlNmFoWEk4T3BnYzVTTjJXdWpET2Z0RHhsR2QxdzRuZFZPdkJGcStZWEZ0c0gzS24xVHZKR0U3Rm4ranprTytETXZRdUs3cnYiLCJtYWMiOiJmNmIzNmQyYmUyNGVmYWJiNzk1YmJkMGQyOTU0MGVhNWQyYTNiYzAwMzgzMWJhNDk0MTkyYTJhN2QzNGFiYWE1IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IjRhRWxqeTJiYnFOanQyZEdUOXNVYXc9PSIsInZhbHVlIjoiSjRLckw5YnhHWXk1TjZOblpiRElhZ0FpTVdsRyt5VXMwajhxNGpOZ1I3TG0wUWlRZVh1RzBsekNXWDdSK1NiN1I1MzlVeVZiTk5wSHVqUGVPTlRjOU1sK1N1bzdjbEVEdW5reE53cmZ6OFkwUjUyMWNQUk1lQjdBT0hTRE9sRE8iLCJtYWMiOiI4NzhmZDg3NTFlMDBkMjc0YzJkM2U4YjhhODczODE1NTkwMGRlYzY4ZmIzNmM4Zjg4YmRmNGM5NTk0ZmI5MGExIiwidGFnIjoiIn0%3D'
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

        function update($description = null, $code = null, $weight_in_grams = null, $status = null, $stock = null, $stock_min = null, $stock_max = null, $product_id = null, $id = null, $amount = null) : void {
            

            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'description='.$description.'&code='.$code.'&weight_in_grams='.$weight_in_grams.'&status='.$status.'&stock='.$stock.'&stock_min='.$stock_min.'&stock_max='.$stock_max.'&product_id='.$product_id.'&id='.$id.'&amount='.$amount,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
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

            var_dump($response);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
        }

        function updatePrice($id = null, $amount = null) : void {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/set_new_price',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'id='.$id.'&amount='.$amount,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
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

            var_dump($response);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;
            }
        }

        function create($description = null, $code = null, $weight_in_grams = null, $status = null, $cover = null, $stock = null, $stock_min = null, $stock_max = null, $product_id = null, $amount = null) : void {
            
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => array('description' => $description,'code' => $code,'weight_in_grams' => $weight_in_grams,'status' => $status,'cover'=> new CURLFILE($cover),'stock' => $stock,'stock_min' => $stock_min,'stock_max' => $stock_max,'product_id' => $product_id,'amount' => $amount),
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6IlgxKzlyenRNcTFmdzFENExSemdUK3c9PSIsInZhbHVlIjoiZlNucGtadTM5ODZ5SEFuQithRVRuK2dUaXFxVDZUcDFVaVlxdm9LR3p3MzdmTTVtTExCMlRxZVhlNmFoWEk4T3BnYzVTTjJXdWpET2Z0RHhsR2QxdzRuZFZPdkJGcStZWEZ0c0gzS24xVHZKR0U3Rm4ranprTytETXZRdUs3cnYiLCJtYWMiOiJmNmIzNmQyYmUyNGVmYWJiNzk1YmJkMGQyOTU0MGVhNWQyYTNiYzAwMzgzMWJhNDk0MTkyYTJhN2QzNGFiYWE1IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IjRhRWxqeTJiYnFOanQyZEdUOXNVYXc9PSIsInZhbHVlIjoiSjRLckw5YnhHWXk1TjZOblpiRElhZ0FpTVdsRyt5VXMwajhxNGpOZ1I3TG0wUWlRZVh1RzBsekNXWDdSK1NiN1I1MzlVeVZiTk5wSHVqUGVPTlRjOU1sK1N1bzdjbEVEdW5reE53cmZ6OFkwUjUyMWNQUk1lQjdBT0hTRE9sRE8iLCJtYWMiOiI4NzhmZDg3NTFlMDBkMjc0YzJkM2U4YjhhODczODE1NTkwMGRlYzY4ZmIzNmM4Zjg4YmRmNGM5NTk0ZmI5MGExIiwidGFnIjoiIn0%3D'
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
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
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