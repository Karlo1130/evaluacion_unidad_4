<?php
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $presentationController = new PresentationController();

    if(isset($_POST["action"])) {

        // if(isset($_POST['global_token']) 
        //     && $_POST['global_token'] == $_SESSION['global_token']){
            switch($_POST["action"]){
                case 'getPresentations':
                    var_dump($presentationController->getPresentations());
                    break;

                case 'getSpecificPresentation':
                    var_dump($presentationController->getSpecificPresentation());
                    break;
                
                case 'update':

                    

                    break;

                case 'updatePrice':

                    
                    break;

                case "create":
                    
                    
                    break;
    
                case "delete":
                
                    
                    
                    break;

            }
        // }
    }

    class PresentationController {

        function getPresentations() : object {
            
        }

        function getSpecificPresentation() : object {
            
        }

        function update() : void {
            
        }

        function updatePrice() : void {
            
        }

        function create() : void {
            
        }

        function delete() : void {
            
        }
    }

?>