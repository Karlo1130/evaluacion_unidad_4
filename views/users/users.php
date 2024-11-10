<?php 
  include_once "../../app/config.php";
  include '../../app/clientsController.php';

  $data = $productController->get();

  //*obtener los datos de data con data-> en vez de data['']

  var_dump($data);
?>
<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  <head>
     <?php 

      include "../layouts/head.php";

    ?>

  </head>
  <body>
  <div class="card">
              <div class="card-body position-relative">
                <div class="text-center mt-3">
                  <div class="chat-avtar d-inline-flex mx-auto">
                    <img class="rounded-circle img-fluid wid-90 img-thumbnail" src="../assets/images/user/avatar-1.jpg" alt="User image" />
                    <i class="chat-badge bg-danger me-2 mb-2"></i>
                  </div>
                  <h5 class="mb-0">William Bond</h5>
                  <p class="text-muted text-sm">DM on <a href="#" class="link-primary"> @williambond </a> 😍</p>
                  <div class="row">
                    <div class="col-6">
                      <div class="d-grid"><button class="btn btn-primary">Accept</button></div>
                    </div>
                    <div class="col-6">
                      <div class="d-grid"><button class="btn btn-outline-secondary">Decline</button></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </body>
</html>