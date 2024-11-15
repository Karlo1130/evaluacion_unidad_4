<?php
include_once "../../app/config.php";
include_once "../../app/productController.php";
include_once "../../app/brandController.php";

// $data = $productController->getProductBySlug();
// $brands = $brandController->getBrands();

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
                <h2 class="mb-0">Editar producto</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h5>Datos del producto</h5>
            </div>
            <div class="card-body">
              <form method="POST" action="controller" class="p-3" id="editForm">
                <div class="row">
                  <div class="col-md-6">
                    <h5>Nombre</h5>
                    <input type="text" class="form-control name" required name="name" value="Nombre">

                    <h5>Slug</h5>
                    <input type="text" class="form-control slug" required name="slug" value="Slug">

                    <h5>Descripcion</h5>
                    <textarea type="text" class="form-control description" required name="description">Descripcion</textarea>

                    <h5>Caracteristicas</h5>
                    <textarea type="text" class="form-control features" required name="features">Caracteristicas</textarea>
                  </div>
                  <div class="col-md-6">

                    <h5>Id</h5>
                    <input type="text" class="form-control id" required name="id" value="Id">

                    <h5>Marca</h5>
                    <select class="form-control brand_id" required name="brand_id">
                      <?php foreach ([''] as $brand): ?>
                        <option value="id">Nombre de la marca</option>
                      <?php endforeach; ?>

                    </select>

                    <h5>Categorias</h5>
                    <select class="form-control" required name="category_id">
                      <?php foreach ([''] as $category): ?>
                        <option value="id">Nombre de Category</option>
                      <?php endforeach; ?>
                    </select>

                    <h5>Tags</h5>
                    <select class="form-control" required name="tag_id">
                      <?php foreach ([''] as $tag): ?>
                        <option value="id">Nombre de Tags</option>
                      <?php endforeach; ?>
                    </select>
                  </div>


                  <!-- <input type="hidden" name="action" value="editProduct">
                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>"> -->

                
              </div>
              <button class="btn btn-primary mt-3" type="submit">Confirm</a>
            </form>
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php

  include "../layouts/footer.php";

  ?>
  <?php

  include "../layouts/scripts.php";

  ?>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>