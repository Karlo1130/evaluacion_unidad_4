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
                <h2 class="mb-0">Orden</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row g-3">
                <div class="col-12">
                  <div class="row align-items-center g-3">
                    <div class="col-6 text-sm-start">
                      <h6>Estado: <span class="text-muted f-w-400">Nombre</span></h6>
                      <h6>Descripcion</h6>
                    </div>
                    <div class="col-6 text-sm-end">
                      <h6>Fecha <span class="text-muted f-w-400">03/8/2023</span></h6>
                      <h6>Fecha de vencimiento <span class="text-muted f-w-400">10/8/2023</span></h6>
                    </div>
                  </div>
                </div>

                <div class="card col-3">
                  <div class="card-body position-relative">
                    <div class="text-center mt-3">

                      <h1 class="mb-0">Cupon</h1>
                      <h4 class="mb-0">Nombre</h4>
                      <h4 class="mb-0">Cantidad minima</h4>
                      <h4 class="mb-0">Tipo de cupon</h4>
                    </div>

                  </div>


                </div>

                <div class=" col-1">
                </div>

                <div class="card col-4">
                  <div class="card-body position-relative">
                    <div class="text-center mt-3">
                    <div class="chat-avtar d-inline-flex mx-auto">
                        <img class="rounded-circle img-fluid wid-90 img-thumbnail" src="../assets/images/user/avatar-1.jpg" alt="User image" />
                        <i class="chat-badge bg-danger me-2 mb-2"></i>
                      </div>
                      <h5 class="mb-0">Nombre</h5>
                      <p class="text-muted text-sm">Email</p>
                      <p class="text-muted text-sm">Phone Number</p>
                    </div>

                  </div>


                </div>

                <div class=" col-1">
                </div>
                <div class="card col-3">
                  <div class="card-body position-relative">
                    <div class="text-center mt-3">
                      
                      <h1 class="mb-0">Direccion</h1>
                      <h4 class="mb-0">Calle</h4>
                      <h4 class="mb-0">Codigo postal</h4>
                      <h4 class="mb-0">Ciudad</h4>
                      <h4 class="mb-0">Estado</h4>
                    </div>

                  </div>


                </div>

                <h1 class="text-center">Presentaciones</h1>

                <div class="card product-card card col-3">
                  <div class="card-img-top">
                    <!-- imagen de la presentacion -->
                    <img src="../assets/images/application/img-prod-1.jpg" alt="image" class="img-prod img-fluid" />
                    
                  </div>
                  <div class="card-body">
                    <a href="ecom_product-details.html">
                      <p class="prod-content mb-0 text-muted">Nombre de la presentacion</p>
                    </a>
                    <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
                      <h4 class="mb-0 text-truncate"><b>$Precio</b></h4>
                    </div>
                    
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>

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