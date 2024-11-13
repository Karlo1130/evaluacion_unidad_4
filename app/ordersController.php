<?php
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $ordersController = new OrdersController();
    if(isset($_POST["action"])) {
        // if(isset($_POST['global_token']) 
        //     && $_POST['global_token'] == $_SESSION['global_token']){
            switch($_POST["action"]){
                case 'get':
                    var_dump($ordersController->get());
                    break;
                case 'getOrdersBetweenDates':
                    var_dump($ordersController->getOrdersBetweenDates());
                    break;
                case 'getSpecificOrder':
                    var_dump($ordersController->getSpecificOrder());
                    break;
                        
                    
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
    class OrdersController {
        function get() : array {
            
        }

        function getOrdersBetweenDates() : array {
            
        }

        function getSpecificOrder() : object {
            
        }

        function create() : void {
            
        }
            
        function update() : void {
            
        }

        function delete() : void {
            
        }
    }
?>