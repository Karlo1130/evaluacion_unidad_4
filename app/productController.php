<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $productController = new ProductController();

    if(isset($_POST["action"])){

        if(isset($_POST['global_token']) 
            && $_POST['global_token'] == $_SESSION['global_token']){

            switch($_POST["action"]){
                case "addProduct":
    
                    
                    $name = $_POST["name"];
                    $slug = $_POST["slug"];
                    $description = $_POST["description"];
                    $features = $_POST["features"];
                    $brand_id = $_POST["brand_id"];
                    $cover = $_FILES["cover"]["tmp_name"];
    
                    var_dump($_FILES);
                    
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
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('name' => $name,'slug' => $slug,'description' => $description,'features' => $features,'brand_id' => $brand_id,'cover'=> new CURLFILE($cover)),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer '.$sessionData['token']),
                    ));
    
                    $response = curl_exec($curl);
    
                    curl_close($curl);
                    
                    $response = json_decode($response, true);
    
                    var_dump($response);
    
                    if(isset($response) && $response['code'] == 4){
                        $_SESSION['message'] = "Producto agregado con éxito";
                        $_SESSION['message_type'] = "success";
                    } else {
                        $_SESSION['message'] = "Hubo un error al agregar el producto";
                        $_SESSION['message_type'] = "error";
                    }
                    
                    header("Location: /avanzada_ids_tm_2024-main/products/");
                    break;
    
                case "editProduct":
                
                    $name = $_POST["name"];
                    $slug = $_POST["slug"];
                    $description = $_POST["description"];
                    $features = $_POST["features"];
                    $id = $_POST["id"];
                    $brand_id = $_POST["brand_id"];
    
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
                    CURLOPT_CUSTOMREQUEST => 'PUT',
                    CURLOPT_POSTFIELDS => http_build_query(array(
                        'name' => $name,
                        'slug' => $slug,
                        'description' => $description,
                        'features' => $features,
                        'id' => $id,
                        'brand_id' => $brand_id,
                    )),
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/x-www-form-urlencoded',
                        'Authorization: Bearer '.$sessionData['token']),
                    ));
    
                    $response = curl_exec($curl);
    
                    curl_close($curl);
                    
                    $response = json_decode($response, true);
    
                    if(isset($response) && $response['code'] == 4){
                        $_SESSION['message'] = "Producto editado con éxito";
                        $_SESSION['message_type'] = "success";
                    } else {
                        $_SESSION['message'] = "Hubo un error al editar el producto";
                        $_SESSION['message_type'] = "error";
                    }
                    header("Location:  /avanzada_ids_tm_2024-main/products/");
                    
                    break;
    
                case 'deleteProduct':
                    if (isset($_POST['productId'])) {
                        $productId = $_POST['productId'];
                        $productController->deleteProduct($productId);
                        $_SESSION['message'] = "Producto eliminado con éxito";
                        $_SESSION['message_type'] = "success";
                    } else {
                        $_SESSION['message'] = "Hubo un error al eliminar el producto";
                        $_SESSION['message_type'] = "error";
                    }
                    header("Location:  /avanzada_ids_tm_2024-main/products/");

                    break;
            }
        }
    }

    class ProductController{
        function getProducts() : array {

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
                'Authorization: Bearer '.$sessionData['token']),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            
            $response = json_decode($response, true);
            $data = $response['data'];

            return $data;
        }

        function getProductBySlug() : object {

            $data = $_SESSION['data'];

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
                'Authorization: Bearer '.$data['token']),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $response = json_decode($response);

            $data = $response->data;

            return $data;
        }

        function deleteProduct($productId) : void {

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
                'Authorization: Bearer '.$data['token']),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;
        }

    }
    

?>
