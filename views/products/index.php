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

  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Productos</h2>
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
          <div class="ecom-wrapper">

            <div class="ecom-content">
              <div class="d-sm-flex align-items-center mb-4">
                <ul class="list-inline me-auto my-1">
                  <li class="list-inline-item">
                    <form class="form-search">
                      <i class="ph-duotone ph-magnifying-glass icon-search"></i>
                      <input type="search" class="form-control" placeholder="Buscar producto" />
                    </form>
                    <a href="create" class="btn btn-success">Crear Producto</a>
                  </li>
                </ul>

              </div>
              <div class="row">
                <?php foreach (['', ''] as $producto): ?>
                  <div class="col-sm-6 col-xl-4">
                    <div class="card product-card">
                      <div class="card-img-top">
                        <a href="blusa-levis-manga-larga">
                          <img src="https://img.freepik.com/fotos-premium/fotografia-blanco-embalaje-producto-generico-yogur-frutas-frescas_1061358-10705.jpg" alt="image" class="img-prod img-fluid" />
                        </a>
                      </div>
                      <div class="card-body">
                        <a href="ecom_product-details.html">
                          <p class="prod-content mb-0 text-muted">Nombre del producto</p>
                        </a>
                        <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
                          <h4 class="mb-0 text-truncate"><b>Descripcion del producto</b>
                          </h4>
                          <div class="d-inline-flex align-items-center">
                            <i class="ph-duotone ph-star text-warning me-1"></i>
                            slug del producto
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="flex-shrink-0">

                            <!-- <button class="btn btn-danger" onclick="alert(<?php echo $tarjeta->id ?>)">Delete</button> -->
                            <button class="btn btn-danger">Delete</button>

                            <!-- <a href="edit/<?php echo $tarjeta->slug ?>" class="btn btn-primary w-auto">editar</a> -->
                            <a href="edit/blusa-levis-manga-larga" class="btn btn-primary w-auto">Editar</a>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="d-grid">

                              <!-- <a href="<?php echo $tarjeta->slug ?>" class="btn btn-link-secondary btn-prod-card">ir al producto</a> -->
                              <a href="blusa-levis-manga-larga" class="btn btn-link-secondary btn-prod-card">Ir al producto</a>
                            </div>

                            <!-- <form method="POST" action="controller" id="deleteForm">
			
                                <input type="hidden" name="action" value="deleteProduct">
                                <input type="hidden" name="productId" id="productIdHidden">
                                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">
												
                							</form> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
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

  <script>
    function alert(productId) {

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {

          document.getElementById("productIdHidden").value = productId
          document.getElementById("deleteForm").submit()

          Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          });
        }
      });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
<!-- [Body] end -->

</html>