<?php
include_once "../../app/config.php";
include_once "../../app/brandController.php";

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
                <h2 class="mb-0">Agregar un producto nuevo</h2>
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
              <h5>Datos del nuevo producto</h5>
            </div>
            <div class="card-body">
              <form method="POST" action="controller" class="p-3" enctype="multipart/form-data">
                <div class="row">
                  <!-- Primera columna -->
                  <div class="col-md-6">
                    <h5>Nombre</h5>
                    <input type="text" class="form-control" required name="name">

                    <h5>Slug</h5>
                    <input type="text" class="form-control" required name="slug">

                    <h5>Descripcion</h5>
                    <input type="text" class="form-control" required name="description">

                    <h5>Caracteristicas</h5>
                    <input type="text" class="form-control" required name="features">
                  </div>

                  <!-- Segunda columna -->
                  <div class="col-md-6">
                    <h5>Marca</h5>
                    <select class="form-control" required name="brand_id">
                      <?php foreach ([''] as $brand): ?>
                        <option value="id">Nombre de Brand</option>
                      <?php endforeach; ?>
                    </select>

                    <h5>Imagen</h5>
                    <input type="file" class="form-control" required name="cover">

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
                </div>

                <!-- Botón de confirmación -->
                <button class="btn btn-primary mt-3" type="submit">Confirm</button>
              </form>
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