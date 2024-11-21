<?php 
  include_once "../../app/config.php";
  include '../../app/clientsController.php';


  $clientes = $clientsController->get();
  #var_dump($_POST)
?>
<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  <head>
    
    <?php 

      include "../layouts/head.php";

    ?>

  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
     
 
    <?php 

      include "../layouts/sidebar.php";

    ?>
    <?php 

      include "../layouts/nav.php";

    ?>



  <body>
    <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->


    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Profile</a></li>
                  <li class="breadcrumb-item" aria-current="page">Clientes</li>
                </ul>
              </div>
              <div class="col-md-6 ">
                <div class="page-header-title">
                  <h2 class="mb-0">Clientes </h2>
                </div>
              </div>
              <div class="col-md-6 d-flex">
                <div class="d-flex ms-auto">
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar-modal"> <i class="ph-duotone ph-plus"></i>
                  Agregar Cliente</button>
                </div>
              </div>

              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
          <!-- [ sample-page ] start -->
          <div class="col-sm-12">

            <div class="card border-0 table-card user-profile-list">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover px-5" id="pc-dt-simple">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Correo electronico</th>
                        <th>Numero celular</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="../assets/images/user/avatar-1.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0"><?php echo $cliente->name ?></h6>
                            </div>
                          </div>
                        </td>
                        <td><?php echo $cliente->email ?></td>
                        <td><?php echo $cliente->phone_number ?></td>
                        <td>
                          <span >Acciones</span>
                          <div class="overlay-edit">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item m-0">
                              <a href="#" 
                                class="editar avtar avtar-s btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editar-modal"
                                data-id="<?php echo $cliente->id; ?>"
                                data-name="<?php echo $cliente->name; ?>"
                                data-email="<?php echo $cliente->email; ?>"
                                data-phone_number="<?php echo $cliente->phone_number; ?>"
                                data-is_suscribed="<?php echo $cliente->is_suscribed; ?>"
                                data-level_id="<?php echo $cliente->level_id; ?>">
                                <i class="ti ti-pencil f-18"></i>
                              </a>

                              </li>
                              <li class="list-inline-item m-0">
                                <a href="#" 
                                  class="eliminar avtar avtar-s btn bg-white btn-link-danger" 
                                  data-id="<?php echo $cliente->id; ?>">
                                  <i class="ti ti-trash f-18"></i>
                                </a>
                              </li>

                            </ul>
                          </div>
                        </td>
                      </tr>
                      
                      </tr>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
      </div>
    </div>


    <form id="delete-form" method="POST" action="clients">
      <input type="hidden" name="clients" value="delete">
      <input type="hidden" name="id" id="delete-id">
      <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">
    </form>

    <!-- [modal agregar] -->

      

    </div>

    <div
      class="modal fade login-modal"
      id="agregar-modal"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card mb-0 user-card">
          <div class="modal-body">
            <div class="d-flex mb-4">
              <div class="flex-grow-1 me-3">
                <h4 class="f-w-500 mb-1">Agregar nuevo cliente</h4>
                
              </div>
              <div class="flex-shrink-0">
                <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="modal">
                  <i class="ti ti-x f-20"></i>
                </a>
              </div>
            </div>
            <form method="POST" action="clients" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" name="clients" value="create">
                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">
                <div class= "col-12">
                  <div class="mb-3">
                    <label class="form-label">Nombre completo</label>
                    <input type="name" name="name" id="name"  required class="form-control" placeholder="Ingresa tu nombre completo" />
                  </div>
                </div> 
                <div class= "col-6">
                  <div class="mb-3">
                    <label class="form-label">Correo electronico</label>
                    <input type="email" name="email" id="email" required class="form-control" placeholder="ejemplo@email.com" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" required class="form-control" placeholder="Ingresa una contraseña" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Confirmar contraseña</label>
                    <input type="password"   class="form-control" placeholder="Ingresa una contraseña" />
                  </div>
                </div>
                <div class= "col-6">
  
                  <div class="mb-3">
                    <label class="form-label">Numero Celular</label>
                    <input type="tel" name="phone_number" id="phone_number" required class="form-control" placeholder="00-000-0000" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">¿Está suscrito?</label>
                    <select name="is_suscribed" id="is_suscribed" class="form-control" required>
                      <option value="1">Sí</option>
                      <option value="2">No</option>
                    </select>
                    
                  </div>
                  <div class="mb-3">
                  <label class="form-label">Roles</label>
                    <select name="level_id" id="level_id" class="form-control" required>
                      <option value="1">normal</option>
                      <option value="2">premium</option>
                      <option value="3">VIP</option>
                    </select>
                  </div>
                </div>
  
  
                
                <div class="d-grid mt-4">
                  <button type="submit" class="btn btn-primary">Agregar cliente</button>
                </div>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>

    <!-- [modal editar] -->

    <div
      class="modal fade login-modal"
      id="editar-modal"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card mb-0 user-card">
          <div class="modal-body">
            <div class="d-flex mb-4">
              <div class="flex-grow-1 me-3">
                <h4 class="f-w-500 mb-1">Editar cliente</h4>
                
              </div>
              <div class="flex-shrink-0">
                <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="modal">
                  <i class="ti ti-x f-20"></i>
                </a>
              </div>
            </div>
            <form method="POST" action="clients" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" name="clients" value="update">
                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">
                <input type="hidden" name="id" id="modal-input-id" value="">
                <div class= "col-12">
                  <div class="mb-3">
                    <label class="form-label">Nombre completo</label>
                    <input type="name" name="name" id="modal-input-name"  required class="form-control" placeholder="Ingresa tu nombre completo" />
                  </div>
                </div> 
                <div class= "col-6">
                  <div class="mb-3">
                    <label class="form-label">Correo electronico</label>
                    <input type="email" name="email" id="modal-input-email" required class="form-control" placeholder="ejemplo@email.com" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" id="modal-input-password" required class="form-control" placeholder="Ingresa una contraseña" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Confirmar contraseña</label>
                    <input type="password"   class="form-control" placeholder="Ingresa una contraseña" />
                  </div>
                </div>
                <div class= "col-6">
  
                  <div class="mb-3">
                    <label class="form-label">Numero Celular</label>
                    <input type="tel" name="phone_number" id="modal-input-phone_number" required class="form-control" placeholder="00-000-0000" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">¿Está suscrito?</label>
                    <select name="is_suscribed" id="modal-input-is_suscribed" class="form-control" required>
                      <option value="1">Sí</option>
                      <option value="2">No</option>
                    </select>
                    
                  </div>
                  <div class="mb-3">
                  <label class="form-label">Roles</label>
                    <select name="level_id" id="modal-input-level_id" class="form-control" required>
                      <option value="1">normal</option>
                      <option value="2">premium</option>
                      <option value="3">VIP</option>
                    </select>
                  </div>
                </div>
  
  
                
                <div class="d-grid mt-4">
                  <button type="submit" class="btn btn-primary">Editar cliente</button>
                </div>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>

    <!-- [ Main Content ] end -->
    
 <!-- Required Js -->
<script src="../assets/js/plugins/popper.min.js"></script>
<script src="../assets/js/plugins/simplebar.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>
<script src="../assets/js/fonts/custom-font.js"></script>
<script src="../assets/js/pcoded.js"></script>
<script src="../assets/js/plugins/feather.min.js"></script>

<script>
  document.querySelectorAll('.eliminar').forEach(function (button) {
    button.addEventListener('click', function (event) {
        event.preventDefault(); 

        const clientId = this.getAttribute('data-id'); 
        if (confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
            
            document.getElementById('delete-id').value = clientId;
            document.getElementById('delete-form').submit();
        }
    });
});

 document.querySelectorAll('.editar').forEach(function (button) {
    button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        const name = this.getAttribute('data-name');
        const email = this.getAttribute('data-email');
        const phone_number = this.getAttribute('data-phone_number');
        const is_suscribed = this.getAttribute('data-is_suscribed');
        const level_id = this.getAttribute('data-level_id');

        document.querySelector('#modal-input-id').value = id;
        document.querySelector('#modal-input-name').value = name;
        document.querySelector('#modal-input-email').value = email;
        document.querySelector('#modal-input-phone_number').value = phone_number;
        document.querySelector('#modal-input-is_suscribed').value = is_suscribed;
        document.querySelector('#modal-input-level_id').value = level_id;
    });
});


</script>
   
<script>
  layout_change('light');
</script>
   
<script>
  layout_sidebar_change('light');
</script>
  
<script>
  change_box_container('false');
</script>
 
<script>
  layout_caption_change('true');
</script>
   
<script>
  layout_rtl_change('false');
</script>
 
<script>
  preset_change('preset-1');
</script>


    

  </body>
  <!-- [Body] end -->
</html>

<?php 

include "../layouts/footer.php";

?>

<?php 

include "../layouts/scripts.php";

?>