<?php
include_once "../../app/config.php";
include "../../app/productController.php";

if (!isset($_GET['slug'])) {
  header("Location: products");
  exit;
}

$data = $productController->getProductBySlug();
#var_dump($data);

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
                  <span class="badge bg-success f-14"><?php echo $data->brand->name ?></span>
                  <h5 class="my-3"><?php echo $data->name ?></h5>
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
                    aria-selected="true"><?php echo $data->features ?>
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
                    aria-selected="true">
                    Tags
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
                      <ul>
                        <?php foreach ($data->tags as $tag):?>
                          <li>
                            <a href="#"><?php echo $tag->name ?></a>
                          </li>
                          
                        <?php endforeach ?>
                        </ul>
                        </p>

                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-3" role="tabpanel" aria-labelledby="ecomtab-tab-3">
                  <div class="table-responsive">
                    <p class="text-muted">
                    <?php echo $data->description ?>
                   </p>

                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-4" role="tabpanel" aria-labelledby="ecomtab-tab-4">
                  <div class="table-responsive">
                    <p class="text-muted">
                    <ul>
                        <?php foreach ($data->categories as $category):?>
                          <li>
                            <a href="#"><?php echo $category->name ?></a>
                          </li>
                          
                        <?php endforeach ?>
                        </ul>                    
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
          
          <div class="row">
          <div class="col-lg-12 col-xxl-12">
            <div class="tab-content" id="presentation-tabContent">
              <div class="tab-pane fade show active" id="presentation-profile" role="tabpanel" aria-labelledby="presentation-tab">
              <?php foreach ($data->presentations as $presentation):?>

                <div class="card">
                  <div class="card-header">
                    <h5>Información de la Presentación</h5>
                  </div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush pb-2">
                      <li class="list-group-item px-0 pt-0">
                        <div class="row">
                          <div class="col-md-6">
                            <p class="mb-1 text-muted">Descripción</p>
                            <p class="mb-0"><?php echo $presentation->description ?></p>
                          </div>
                          <div class="col-md-6">
                            <p class="mb-1 text-muted">Código</p>
                            <p class="mb-0"><?php echo $presentation->code ?></p>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item px-0">
                        <div class="row">
                          <div class="col-md-6">
                            <p class="mb-1 text-muted">Peso (gramos)</p>
                            <p class="mb-0"><?php echo $presentation->weight_in_grams ?></p>
                          </div>
                          <div class="col-md-6">
                            <p class="mb-1 text-muted">Estado</p>
                            <p class="mb-0"><?php echo ucfirst($presentation->status) ?></p>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item px-0">
                        <div class="row">
                          <div class="col-md-6">
                            <p class="mb-1 text-muted">Stock</p>
                            <p class="mb-0"><?php echo $presentation->stock ?></p>
                          </div>
                          <div class="col-md-6">
                            <p class="mb-1 text-muted">Rango de Stock</p>
                            <p class="mb-0"><?php echo $presentation->stock_min . ' - ' . $presentation->stock_max ?></p>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item px-0">
                        <div class="row">
                          <div class="col-md-6">
                            <p class="mb-1 text-muted">Precio Actual</p>
                            <p class="mb-0">$<?php echo number_format($presentation->price[0]->amount, 2) ?></p>
                          </div>
                          <div class="col-md-6">
                            <p class="mb-1 text-muted">ID Producto</p>
                            <p class="mb-0"><?php echo $presentation->product_id ?></p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>

                  <div class="card-header">
                    <h5>Órdenes Asociadas</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table" id="order-table">
                        <thead>
                          <tr>
                            <th>Folio</th>
                            <th>Total</th>
                            <th>Pagado</th>
                            <th>Cliente</th>
                            <th>Dirección</th>
                            <th>Estatus</th>
                            <th>Tipo de Pago</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($presentation->orders as $order): ?>
                            <tr>
                              <td><?php echo $order->folio ?></td>
                              <td>$<?php echo number_format($order->total, 2) ?></td>
                              <td><?php echo $order->is_paid ? 'Sí' : 'No' ?></td>
                              <td><?php echo $order->client_id ?></td>
                              <td><?php echo $order->address_id ?></td>
                              <td><?php echo $order->order_status_id ?></td>
                              <td><?php echo $order->payment_type_id ?></td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>

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