<?php
include_once "../../app/config.php";
include "../../app/productController.php";

if (!isset($_GET['slug'])) {
  header("Location: products");
  exit;
}

// $data = $productController->getProductBySlug();

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
                <h2 class="mb-0">Producto</h2>
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
              <div class="row">
                <div class="col-md-6">
                  <img src="https://img.freepik.com/fotos-premium/fotografia-blanco-embalaje-producto-generico-yogur-frutas-frescas_1061358-10705.jpg" class="d-block w-100" alt="Product images" />
                </div>
                <div class="col-md-6">
                  <span class="badge bg-success f-14">Marca</span>
                  <h5 class="my-3">Nombre del producto</h5>
                  <div class="card">
            <div class="card-header pb-0">
              <ul class="nav nav-tabs profile-tabs mb-0" id="myTab" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="ecomtab-tab-1"
                    data-bs-toggle="tab"
                    href="#ecomtab-1"
                    role="tab"
                    aria-controls="ecomtab-1"
                    aria-selected="true">Caracteristicas
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="ecomtab-tab-2"
                    data-bs-toggle="tab"
                    href="#ecomtab-2"
                    role="tab"
                    aria-controls="ecomtab-2"
                    aria-selected="true">Tags
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="ecomtab-tab-3"
                    data-bs-toggle="tab"
                    href="#ecomtab-3"
                    role="tab"
                    aria-controls="ecomtab-3"
                    aria-selected="true">Descripcion
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="ecomtab-tab-4"
                    data-bs-toggle="tab"
                    href="#ecomtab-4"
                    role="tab"
                    aria-controls="ecomtab-4"
                    aria-selected="true">Categorias
                  </a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="ecomtab-1" role="tabpanel" aria-labelledby="ecomtab-tab-1">
                  <div class="table-responsive">
                    <p class="text-muted">Caracteristicas del producto</p>
                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-2" role="tabpanel" aria-labelledby="ecomtab-tab-2">
                  <div class="row gy-3">
                    <div class="table-responsive">
                      <p class="text-muted">
                        Tags
                      </p>

                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-3" role="tabpanel" aria-labelledby="ecomtab-tab-3">
                  <div class="table-responsive">
                    <p class="text-muted">
                      Descripcion del producto
                    </p>

                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-4" role="tabpanel" aria-labelledby="ecomtab-tab-4">
                  <div class="table-responsive">
                    <p class="text-muted">
                      Categorias
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="card">
            <div class="card-header">
              <h5>Presentaciones y ordenes</h5>
            </div>
            <div class="card-body">
              <div class="container mt-5">

                <!-- Tabla de Presentaciones -->
                <?php foreach (['', ''] as $presentation): ?>
                  <h3 class="text-center mb-4">Presentaciones #1</h3>
                  <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                      <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Código</th>
                        <th>Peso (g)</th>
                        <th>Estado</th>
                        <th>Stock</th>
                        <th>Stock Min</th>
                        <th>Stock Max</th>
                        <th>Precio Actual</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Id</td>
                        <td>Descripcion</td>
                        <td>Codigo</td>
                        <td>Peso en gramos</td>
                        <td>Status</td>
                        <td>Stock</td>
                        <td>Stock minimo</td>
                        <td>Stock maximo</td>
                        <td>Precio</td>
                      </tr>
                    </tbody>
                  </table>

                  <?php foreach (['', ''] as $order): ?>
                    <!-- Tabla de Órdenes -->
                    <h3 class="text-center mb-4">Orden #1</h3>
                    <table class="table table-bordered table-hover">
                      <thead class="table-dark">
                        <tr>
                          <th>ID</th>
                          <th>Folio</th>
                          <th>Total</th>
                          <th>Pagado</th>
                          <th>Cliente ID</th>
                          <th>Dirección ID</th>
                          <th>Estado del Pedido</th>
                          <th>Tipo de Pago</th>
                          <th>Cupon ID</th>
                          <th>Cantidad</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Id</td>
                          <td>Folio</td>
                          <td>Total</td>
                          <td>Pagado</td>
                          <td>Cliente id</td>
                          <td>Direccion id</td>
                          <td>Estado de pedido id</td>
                          <td>tipo de pago id</td>
                          <td>cupon id</td>
                          <td>Cantidad</td>
                        </tr>
                      </tbody>
                    </table>
                  <?php endforeach; ?>
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
    // quantity start
    function increaseValue(temp) {
      var value = parseInt(document.getElementById(temp).value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      document.getElementById(temp).value = value;
    }

    function decreaseValue(temp) {
      var value = parseInt(document.getElementById(temp).value, 10);
      value = isNaN(value) ? 0 : value;
      value < 1 ? (value = 1) : '';
      value--;
      document.getElementById(temp).value = value;
    }
    // quantity end
  </script>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>