<?php
include_once "../../app/config.php";
include '../../app/productController.php';

$productos = $productController->get();
#var_dump($productos); 
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php include "../layouts/head.php"; ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">

  <?php include "../layouts/sidebar.php"; ?>
  <?php include "../layouts/nav.php"; ?>

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
              <div class="offcanvas-xxl offcanvas-start ecom-offcanvas" tabindex="-1" id="offcanvas_mail_filter">
                <div class="offcanvas-body p-0 sticky-xxl-top">
                  
                </div>
              </div>
              <div class="ecom-content">
                <div class="d-sm-flex align-items-center mb-4">
                <div class="row">
                <?php foreach ($productos as $producto):  ?>
                   
                  <div class="col-sm-6 col-xl-4">
                    <div class="card product-card">
                      <div class="card-img-top">
                        <a href="ecom_product-details.html">
                          <img src="<?php echo $producto->cover ?>" alt="image" class="img-prod img-fluid" />
                        </a>
                        <div class="card-body position-absolute end-0 top-0">
                          <div class="form-check prod-likes">
                            <input type="checkbox" class="form-check-input" />
                            <i data-feather="heart" class="prod-likes-icon"></i>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <a href="ecom_product-details.html">
                        <p class="prod-content mb-0 text-muted">
                          <?php echo isset($producto->tags[1]->name) ? $producto->tags[1]->name : ''; ?>
                        </p>
                        </a>
                        <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
                          <h4 class="mb-0 text-truncate"
                            ><b><?php echo $producto->name?></b> 
                          
                          <div class="d-inline-flex align-items-center">
                           <small class="text-muted"><?php echo $producto->brand->name?></small>
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <a
                              href="<?php echo $producto->slug ?>"
                              class="avtar avtar-s btn-link-secondary btn-prod-card"
                   
                            >
                              <i class="ph-duotone ph-eye f-18"></i>
                            </a>
                          </div>
                          <div class="flex-grow-1 ms-3">
                          <a href="edit/<?php echo $producto->slug; ?>" class=" btn btn-success">Editar</a>

                          <button class="eliminar btn btn-danger" data-id="<?php echo $producto->id; ?>">Eliminar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach ?>

                  
                  
                     
                </div>
              </div>
            </div>
          </div>
          <!-- [ sample-page ] end -->
        </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>
  <form id="delete-form" method="POST" action="products">
      <input type="hidden" name="action" value="delete">
      <input type="hidden" name="productId" id="delete-id">
      <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">
    </form>


  <?php include "../layouts/footer.php"; ?>
  <?php include "../layouts/scripts.php"; ?>

  <!-- [Page Specific JS] start -->
  <script>
    // scroll-block
    var tc = document.querySelectorAll('.scroll-block');
    for (var t = 0; t < tc.length; t++) {
      new SimpleBar(tc[t]);
    }

    document.querySelectorAll('.eliminar').forEach(function (button) {
    button.addEventListener('click', function (event) {
        event.preventDefault(); 

        const productId = this.getAttribute('data-id'); 
        if (confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
            
            document.getElementById('delete-id').value = productId;
            document.getElementById('delete-form').submit();
        }
    });
});

  </script>

  <?php include "../layouts/modals.php"; ?>

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
