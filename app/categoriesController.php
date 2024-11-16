<?php
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $categoriesController = new CategoriesController();
    if(isset($_POST["action"])) {
        // if(isset($_POST['global_token']) 
        //     && $_POST['global_token'] == $_SESSION['global_token']){
            switch($_POST["action"]){
                case 'get':
                    var_dump($levelsController->get());
                    break;
                case 'getSpecificCategory':
                    var_dump($levelsController->getSpecificCategory());
                    break;  
            }
        // }
    }
    class CategoriesController {
        function get() : array {
            
        }
        function getSpecificCategory() : object {
            
        }

    }
?>