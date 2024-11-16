<?php
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $tagsController = new TagsController();
    if(isset($_POST["action"])) {
        // if(isset($_POST['global_token']) 
        //     && $_POST['global_token'] == $_SESSION['global_token']){
            switch($_POST["action"]){
                case 'get':
                    var_dump($levelsController->get());
                    break;
                case 'getSpecificTag':
                    var_dump($levelsController->getSpecificTag());
                    break;  
            }
        // }
    }
    class TagsController {
        function get() : array {
            
        }
        function getSpecificTag() : object {
            
        }
    }
?>