<?php 
  include_once "../../app/config.php";
  include_once "../../app/clientsController.php";
  include_once "../../app/addressController.php";

  if (!isset($_GET['id'])) {
    header("Location: clients"  );
    exit;
  }
  $client = $clientsController->getSpecificClient();
  $totalorders= count($client->orders);
  #var_dump($client);

  var_dump($_POST);
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
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Clientes</h2>
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
          <div class="col-sm-6 col-xl-4">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Compras totales</h5>
                
              </div>
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="d-flex align-items-end mt-1">
                      <h4 class="mb-0"><?php echo $totalorders ?></h4>
                    </div>
                  </div>
                  <div class="avtar bg-brand-color-2 text-white">
                    <i class="ph-duotone ph-cube f-26"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
             
              <div class="col-lg-12 col-xxl-12">
                <div class="tab-content" id="user-set-tabContent">
                  <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel" aria-labelledby="user-set-profile-tab">
                  
                    <div class="card">
                      <div class="card-header">
                        <h5>Datos personales</h5>

                      </div>
                      <div class="card-body">
                        <ul class="list-group list-group-flush pb-2">
                          <li class="list-group-item px-0 pt-0">
                            <div class="row">
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Nombre completo</p>
                                <p class="mb-0"><?php echo $client->name ?></p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Correo electronico</p>
                                <p class="mb-0"><?php echo $client->email ?></p>
                              </div>
                            </div>
                          </li>
                          <li class="list-group-item px-0">
                            <div class="row">
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Numero celular</p>
                                <p class="mb-0"><?php echo $client->phone_number ?></p>
                              </div>
                              
                            </div>
                          </li>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar-modal">
                            Agregar dirección </button>
                          <?php  foreach ($client->addresses as $index => $address): ?>
                          <li class="list-group-item px-0 pb-1">
                            <h5>Direccion <?php echo $index+1 ?> <a href="#" 
                              class="editar avtar avtar-s" 
                              data-bs-toggle="modal" 
                              data-bs-target="#editar-modal"
                              data-id="<?php echo $address->id; ?>"
                              data-first_name="<?php echo $address->first_name; ?>"
                              data-last_name="<?php echo $address->last_name; ?>"
                              data-street_and_use_number="<?php echo $address->street_and_use_number; ?>"
                              data-postal_code="<?php echo $address->postal_code; ?>"
                              data-city="<?php echo $address->city; ?>"
                              data-province="<?php echo $address->province; ?>"
                              data-phone_number="<?php echo $address->phone_number; ?>"
                              data-is_billing_address="<?php echo $address->is_billing_address; ?>"
                              data-client_id="<?php echo $address->client_id; ?>">
                              <i class="ti ti-pencil f-18"></i>
                            </a></h5>
                         
                            <div class="row">
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Calle y numero exterior</p>
                                <p class="mb-0"> <?php echo $address->street_and_use_number ?></p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Codigo postal</p>
                                <p class="mb-0"><?php echo $address->postal_code?></p>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <p class="mb-1 text-muted">Ciudad</p>
                                <p class="mb-0"><?php echo $address->city?></p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Provincia</p>
                                <p class="mb-0"><?php echo $address->province?></p>
                              </div>
                            </div>
                          </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        <h5>Ordenes</h5>
                      </div>
                      <div class="card-body">
                      <div class="card-body table-border-style">
                          <div class="table-responsive">
                            <table class="table" id="pc-dt-simple">
                              <thead>
                                <tr>
                                  <th>Folio</th>
                                  <th>Total</th>
                                  <th>Metodo de pago</th>
                                  <th>Estatus</th>
                                </tr>
                              </thead>
                              <?php foreach ($client->orders as $order): ?>
                              <tbody>
                                <tr>
                                  <td><?php echo $order->folio ?></td>
                                  <td><?php echo $order->total?></td>
                                  <td><?php echo $order->payment_type->name ?></td>
                                  <td><?php echo $order->order_status->name ?></td>
                                </tr>
                              <?php endforeach; ?>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
          <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
      </div>
    </div>
    </div>

        <!-- [modal agregar] -->


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
                <h4 class="f-w-500 mb-1">Agregar Dirección</h4>
              </div>
              <div class="flex-shrink-0">
                <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="modal">
                  <i class="ti ti-x f-20"></i>
                </a>
              </div>
            </div>
            <form method="POST" action="address" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" name="action" value="create">
                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">

                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Nombre" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellido">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Calle y número</label>
                    <input type="text" name="street_and_use_number" id="street_and_use_number" class="form-control" placeholder="Calle y número" required>
                  </div>
                </div>
                
                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Código Postal</label>
                    <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Código Postal" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Ciudad</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="Ciudad" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Provincia</label>
                    <input type="text" name="province" id="province" class="form-control" placeholder="Provincia" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Teléfono">
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">¿Es dirección de facturación?</label>
                    <select name="is_billing_address" id="is_billing_address" class="form-control">
                      <option value="1">Sí</option>
                      <option value="2">No</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" name="client_id" id="client_id" value="<?php echo $client->id; ?>">

                <div class="col-12">
                  <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Guardar Dirección</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

        <!-- [modal editar] -->


  <div class="modal fade login-modal" id="editar-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content card mb-0 user-card">
      <div class="modal-body">
        <div class="d-flex mb-4">
          <div class="flex-grow-1 me-3">
            <h4 class="f-w-500 mb-1">Editar Dirección</h4>
          </div>
          <div class="flex-shrink-0">
            <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="modal">
              <i class="ti ti-x f-20"></i>
            </a>
          </div>
        </div>
        <form method="POST" action="address" enctype="multipart/form-data">
          <div class="row">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">

            <div class="col-6">
              <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="first_name" id="edit_first_name" class="form-control" placeholder="Nombre" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="last_name" id="edit_last_name" class="form-control" placeholder="Apellido">
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label class="form-label">Calle y número</label>
                <input type="text" name="street_and_use_number" id="edit_street_and_use_number" class="form-control" placeholder="Calle y número" required>
              </div>
            </div>

            <div class="col-6">
              <div class="mb-3">
                <label class="form-label">Código Postal</label>
                <input type="text" name="postal_code" id="edit_postal_code" class="form-control" placeholder="Código Postal" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input type="text" name="city" id="edit_city" class="form-control" placeholder="Ciudad" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label">Provincia</label>
                <input type="text" name="province" id="edit_province" class="form-control" placeholder="Provincia" required>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="phone_number" id="edit_phone_number" class="form-control" placeholder="Teléfono">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label">¿Es dirección de facturación?</label>
                <select name="is_billing_address" id="edit_is_billing_address" class="form-control">
                  <option value="1">Sí</option>
                  <option value="2">No</option>
                </select>
              </div>
            </div>
            <input type="hidden" name="id" id="edit_address_id" value="">
            <input type="hidden" name="client_id" id="edit_client_id" value="">

            <div class="col-12">
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Guardar Dirección</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


  

  </body>

  <!-- [Body] end -->
</html>

<script>
    document.querySelectorAll('.editar').forEach(function (button) {
    button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        const firstName = this.getAttribute('data-first_name');
        const lastName = this.getAttribute('data-last_name');
        const streetAndUseNumber = this.getAttribute('data-street_and_use_number');
        const postalCode = this.getAttribute('data-postal_code');
        const city = this.getAttribute('data-city');
        const province = this.getAttribute('data-province');
        const phoneNumber = this.getAttribute('data-phone_number');
        const isBillingAddress = this.getAttribute('data-is_billing_address');
        const clientId = this.getAttribute('data-client_id');

        document.querySelector('#edit_first_name').value = firstName || '';
        document.querySelector('#edit_last_name').value = lastName || '';
        document.querySelector('#edit_street_and_use_number').value = streetAndUseNumber || '';
        document.querySelector('#edit_postal_code').value = postalCode || '';
        document.querySelector('#edit_city').value = city || '';
        document.querySelector('#edit_province').value = province || '';
        document.querySelector('#edit_phone_number').value = phoneNumber || '';
        document.querySelector('#edit_is_billing_address').value = isBillingAddress || '';
        document.querySelector('#edit_client_id').value = clientId || '';
        document.querySelector('#edit_address_id').value = id || '';
    });
});

</script>




<?php 

include "../layouts/footer.php";

?>

<?php 

include "../layouts/scripts.php";

?>