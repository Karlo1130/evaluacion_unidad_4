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

    $productController = new ProductController();

    if(isset($_POST["action"])) {

        if(isset($_POST['global_token']) 
            && $_POST['global_token'] == $_SESSION['global_token']){
            switch($_POST["action"]){
                case 'get':
                    var_dump($productController->get());
                    break;

                case 'getSpecificProduct':

                    var_dump($productController->getSpecificProduct());
                    break;
                
                case 'getBySlug':
                    var_dump($productController->getProductBySlug());
                    break;

                case 'getByCategorySlug':

                    var_dump($productController->getByCategorySlug());
                    
                    break;

                case "create":
                    
                    $name = $_POST["name"];
                    $slug = $_POST["slug"];
                    $description = $_POST["description"];
                    $features = $_POST["features"];
                    $brand_id = $_POST["brand_id"];
                    $cover = $_FILES["cover"]["tmp_name"];
                    $categories = $_POST["categories"];
                    $tags = $_POST["tags"];
    
                    $productController->create($name, $slug, $description, $features, $brand_id, $cover, $categories, $tags);
                    break;
    
                case "edit":
                
                    $name = $_POST["name"];
                    $slug = $_POST["slug"];
                    $description = $_POST["description"];
                    $features = $_POST["features"];
                    $id = $_POST["id"];
                    $brand_id = $_POST["brand_id"];
                    $categories = $_POST["categories"];
                    $tags = $_POST["tags"];
    
                    $productController->edit($name, $slug, $description, $features, $id, $brand_id, $categories, $tags);
                    
                    break;
    
                case 'delete':
                    if (isset($_POST['productId'])) {
                        $productId = $_POST['productId'];
                        $productController->delete($productId);
                    } else {
                        $_SESSION['message'] = "Hubo un error al editar el producto (no se el id del producto)";
                        $_SESSION['message_type'] = "error";
                        // ? no seguro de si se ocupa la redireccion en este caso
                        // header("Location: " . BASE_PATH . "products");
                    }

                    break;
            }
        }
    }

    class ProductController {
        function get() : array {

            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token),
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

        function getSpecificProduct() : object {
            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$_GET['id'],
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

                header("Location: " . BASE_PATH . "products");
                exit;
            }

            $response = json_decode($response, false);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;

                header("Location: " . BASE_PATH . "products");
            }

            if (is_object($response->data)) {
                return $response->data;
            } else {
                return new stdClass();
            }
        }

        function getProductBySlug() : object {

            $sessionData = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$_GET['slug'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";

                header("Location: " . BASE_PATH . "products");
                exit;
            }

            $response = json_decode($response, false);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;

                header("Location: " . BASE_PATH . "products");
            }

            if (is_object($response->data)) {
                return $response->data;
            } else {
                return new stdClass();
            }
        }

        function getByCategorySlug() : object {
            $sessionData = $_SESSION['data'];
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/categories/'.$_GET['categorySlug'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token,
                'Cookie: XSRF-TOKEN=eyJpdiI6Ik0wN044TzNoV3ZtdkFQNWRvV2pBVVE9PSIsInZhbHVlIjoiV205TzhvcW5jTHJrdGlnV3ZXU0o4M3V5QXppRnEvSGtacFE5NlF1ZTNjUVh2YUJjT3UrOEpBb1JWYjRHWE9iR28vaHRjdjExRmRsWWVjZVZ5dkNmYWN6NkpnZ0JKcE5mYjFFVXBldmF3aE01Wm1FWGh5S1Vpam9aV2sraXkvN08iLCJtYWMiOiIwNzk1Njc4MjJjMWM5Y2NmY2UxMjZjMmYwY2ExYjdkNTM1YWNkYTJlYmNjZTk5NTlkMDU4Y2Y3ZThkMmMwMDIzIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IkV2d2NFc2QvTUtBUVMvSVhyYlVnR2c9PSIsInZhbHVlIjoid2Z3M1NvWTFwVHNXNEdDOFRQM0p3b2M5dnFyWWtPbHIvTkJyeEJoRHNaNCtjU2x3eENEeG5pWUdub3owOGhiUGRCNk1YbUZ4RkJWblNmZ1VqeWIxYTVYREJ6M3VtMW1QTUlLK1hrNmV5ZmVtOUNoV25ndXRXY2RBQmtOaEU2NUoiLCJtYWMiOiI1NWNkZTUyMDU0MjQ0YTY0OWU5YzE3NGZhMDdkYWIzODdiYTU5YzM1YmE5ODA1MzA1YjRkNWNkODlkOGJmOWIzIiwidGFnIjoiIn0%3D'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";

                header("Location: " . BASE_PATH . "products");
                exit;
            }

            $response = json_decode($response, false);

            if ($response->code == 4) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = $response->message;
            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = $response->message;

                header("Location: " . BASE_PATH . "products");
            }

            if (is_object($response->data)) {
                return $response->data;
            } else {
                return new stdClass();
            }

        }

        function create($name = null, $slug = null, $description = null, $features = null, $brand_id = null, $cover = null, $categories = null, $tags = null) : void {
            $sessionData = $_SESSION['data'];

            $index = 0;
            $categoriesArray = [];
            foreach($categories as $category){
                
                $categoriesArray['categories['. $index .']'] = $category;
        
                $index++;
            }

            $index = 0;
            $tagsArray = [];
            foreach($tags as $tag){
                
                $tagsArray['tags['. $index .']'] = $tag;
        
                $index++;
            }

            $productData = array_merge([
                'name' => $name,
                'slug' => $slug,
                'description' => $description,
                'features' => $features,
                'brand_id' => $brand_id,
                'cover' => new CURLFILE($cover)
            ], $categoriesArray, $tagsArray);

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $productData,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$sessionData->token),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";

                exit;
            }
            var_dump($response);
            
            $response = json_decode($response, false);


            if(isset($response) && $response->code == 4){
                $_SESSION['message'] = "Producto agregado con éxito";
                $_SESSION['message_type'] = "success";

                header("Location: " . BASE_PATH . "products");
            } else {
                $_SESSION['message'] = "Hubo un error al agregar el producto";
                $_SESSION['message_type'] = "error";
            }
            
            header("Location: " . BASE_PATH . "products");
            exit;
        }

        function edit($name = null, $slug = null, $description = null, $features = null, $id = null, $brand_id = null, $categories = null, $tags = null) : void {
            $sessionData = $_SESSION['data'];

            $index = 0;
            $categoriesArray = [];
            foreach($categories as $category){
                
                $categoriesArray['categories['. $index .']'] = $category;
        
                $index++;
            }

            $index = 0;
            $tagsArray = [];
            foreach($tags as $tag){
                
                $tagsArray['tags['. $index .']'] = $tag;
        
                $index++;
            }

            $productData = array_merge([
                'name' => $name,
                'slug' => $slug,
                'description' => $description,
                'features' => $features,
                'brand_id' => $brand_id,
                'id' => $id
            ], $categoriesArray, $tagsArray);
    
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $productData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer '.$sessionData->token),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            
            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";

                exit;
            }

            $response = json_decode($response, false);

            if(isset($response) && $response->data == 4){
                $_SESSION['message'] = "Producto editado con éxito";
                $_SESSION['message_type'] = "success";

                header("Location: " . BASE_PATH . "products");
            } else {
                $_SESSION['message'] = "Hubo un error al editar el producto";
                $_SESSION['message_type'] = "error";
            }
        }

        function delete($productId = null) : void {

            $data = $_SESSION['data'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$productId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$data->token),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            if (!$response) {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "no se obtuvo una respuesta";

                exit;
            }

            $response = json_decode($response, false);

            if (isset($response) && $response->code == 4) {
                $_SESSION['message'] = "Producto editado con éxito";
                $_SESSION['message_type'] = "success";

                header("Location: " . BASE_PATH . "products");
            } else {
                $_SESSION['message'] = "Hubo un error al editar el producto";
                $_SESSION['message_type'] = "error";
            }
            
        }

    }
    

?>
