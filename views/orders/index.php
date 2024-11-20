<?php
include_once "../../app/config.php";
include '../../app/productController.php';

// $productos = $productController->get();

//*obtener los datos de data con data-> en vez de data['']

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

  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Ordenes</h2>
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
          <div class="card">
            <div class="card-body">
              <div class="row mb-3 g-3">
                <h4>Busca ordenes entre estas fechas</h4>
                <div class="col-6">
                  <form class="form-search p-2">
                    <input type="date" class="form-control" name="" id="">
                    <input type="date" class="form-control" name="" id="">
                    <a class="btn btn-light-secondary">Buscar</a>
                  </form>
                </div>
                <div class="col-5"></div>
                <div class="col-1">
                  <form action="">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createOrderModal">Crear orden</button>
                  </form>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>Nombre de cliente</th>
                      <th>Esta pagado</th>
                      <th>Total</th>
                      <th>Direccion</th>
                      <th class="text-center">Estado de la orden</th>
                      <th class="text-center">Metodo de pago</th>
                      <th class="text-end">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="row align-items-center">
                          <div class="col-auto pe-0">
                            <img src="../assets/images/user/avatar-1.jpg" alt="user-image"
                              class="wid-40 rounded-circle" />
                          </div>
                          <div class="col">
                            <h5 class="mb-0">Addie Bass</h5>
                          </div>
                        </div>
                      </td>
                      <td><i class="ph-duotone ph-x-circle text-danger f-24"></i></td>
                      <td>$20,000</td>
                      <td>#63579067848912</td>
                      <td class="text-center">10</td>
                      <td class="text-center"><img src="../assets/images/application/img-mastercard.svg" alt="img"
                          class="img-fluid" /></td>
                      <td class="text-end">
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item"><a href="orders/1" class="avtar avtar-s btn-link-info btn-pc-default"><i class="ti ti-eye f-20"></i></a></li>
                          <li class="list-inline-item"><a href="#" class="avtar avtar-s btn-link-success btn-pc-default" data-bs-toggle="modal" data-bs-target="#updateOrderModal"><i class="ti ti-edit f-20"></i></a></li>
                          <li class="list-inline-item"><button class="avtar avtar-s btn-link-danger btn-pc-default"><i class="ti ti-trash f-20"></i></>
                          </li>
                        </ul>
                      </td>
                    </tr>
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

  <div id="createOrderModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Crear orden</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="POST" action="controller" class="p-3" enctype="multipart/form-data">
                <div class="row">
                  <!-- Primera columna -->
                  <div class="col-md-6">
                    <h5>Folio</h5>
                    <input type="text" class="form-control" required name="folio">

                    <h5>Total</h5>
                    <input type="text" class="form-control" required name="total">

                    <h5>Esta pagado</h5>
                    <input type="text" class="form-control" required name="is_paid">

                    <h5>Id de cliente</h5>
                    <input type="text" class="form-control" required name="client_id">

                    <div class="row">
                      <div class="col-6">
                        <h5>Presentacion</h5>
                        <select class="form-control" required name="presentation[0][id]">
                          <?php foreach ([''] as $category): ?>
                            <option value="id">Id de Presentacion</option>
                          <?php endforeach; ?>
                        </select>

                      </div>
                      <div class="col-6">
                        <h5>Cantidad</h5>
                        <input type="text" class="form-control" required name="presentation[0][quantity]">
                      </div>
                    </div>

                  </div>

                  <!-- Segunda columna -->
                  <div class="col-md-6">
                    <h5>Id de direccion</h5>
                    <input type="text" class="form-control" required name="folio">

                    <h5>Id del status de la orden</h5>
                    <input type="text" class="form-control" required name="total">

                    <h5>Tipo de pago</h5>
                    <input type="text" class="form-control" required name="is_paid">

                    <h5>Id de cupon</h5>
                    <input type="text" class="form-control" required name="client_id">

                  </div>

                <!-- Botón de confirmación -->
                <div class="modal-footer">
                  <button class="btn btn-primary mt-3" type="submit">Confirm</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Launch demo modal</button>

  <div id="updateOrderModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Actualizar Orden</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="controller" class="p-3">
            <div class="row">
              <div class="col-md-12">
                <h5>Id de la orden</h5>
                <input type="text" class="form-control" required name="id">

                <h5>Status de la orden</h5>
                <input type="text" class="form-control" required name="order_status_id">

              </div>

              <!-- Botón de confirmación -->
              <div class="modal-footer">
                <button class="btn btn-primary mt-3" type="submit">Confirm</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Launch demo modal</button>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="productOffcanvas" aria-labelledby="productOffcanvasLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="productOffcanvasLabel">Product Details</h5>
      <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="offcanvas">
        <i class="ti ti-x f-20"></i>
      </a>
    </div>
    <div class="offcanvas-body">
      <div class="card product-card shadow-none border-0">
        <div class="card-img-top p-0">
          <a href="ecom_product-details.html">
            <img src="../assets/images/application/img-prod-4.jpg" alt="image" class="img-prod img-fluid" />
          </a>
          <div class="card-body position-absolute end-0 top-0">
            <div class="form-check prod-likes">
              <input type="checkbox" class="form-check-input" />
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-heart prod-likes-icon">
                <path
                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
            </div>
          </div>
          <div class="card-body position-absolute start-0 top-0">
            <span class="badge bg-danger badge-prod-card">30%</span>
          </div>
        </div>
      </div>
      <h5>Glitter gold Mesh Walking Shoes</h5>
      <p class="text-muted">Image Enlargement: After shooting, you can enlarge photographs of the objects for clear zoomed view. Change In Aspect Ratio:
        Boldly crop the subject and save it with a composition that has impact.</p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Price</p>
            <h4 class="mb-0"><b>$299.00</b><span class="mx-2 f-14 text-muted f-w-400 text-decoration-line-through">$399.00</span></h4>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Categories</p>
            <h6 class="mb-0">Shoes</h6>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Status</p>
            <h6 class="mb-0"><span class="badge bg-warning rounded-pill">Process</span></h6>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Brands</p>
            <h6 class="mb-0"><img src="../assets/images/application/img-prod-brand-1.png" alt="user-image" class="wid-40" /></h6>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <?php

  include "../layouts/footer.php";

  ?>

  <?php

  include "../layouts/scripts.php";

  ?>


  <!-- [Page Specific JS] start -->
  <script>
    // scroll-block
    var tc = document.querySelectorAll('.scroll-block');
    for (var t = 0; t < tc.length; t++) {
      new SimpleBar(tc[t]);
    }
  </script>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>