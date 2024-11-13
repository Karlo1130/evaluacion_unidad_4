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
            
        }
        function getSpecificLevel() : object {
            
        }

        function create() : void {
            
        }
        
        function update() : void {

        }

        function delete() : void {
            
        }
    }
?>