<?php 
  include_once "../../app/config.php";


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
                      <h4 class="mb-0">375</h4>
                      <span class="badge bg-light-success ms-2">36%</span>
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
              <div class="col-lg-3 col-xxl-3">
                <div class="card overflow-hidden">
                  <div class="card-body position-relative">
                    <div class="text-center mt-3">
                      <div class="chat-avtar d-inline-flex mx-auto">
                        <img
                          class="rounded-circle img-fluid wid-90 img-thumbnail"
                          src="../assets/images/user/avatar-1.jpg"
                          alt="User image"
                        />
                        <i class="chat-badge bg-success me-2 mb-2"></i>
                      </div>
                      <h5 class="mb-0">William Bond</h5>
                      <p class="text-muted text-sm">DM on <a href="#" class="link-primary"> @williambond </a> 😍</p>
                      <ul class="list-inline mx-auto my-4">
                        <li class="list-inline-item">
                          <a href="#" class="avtar avtar-s text-white bg-dribbble">
                            <i class="ti ti-brand-dribbble f-24"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="avtar avtar-s text-white bg-amazon">
                            <i class="ti ti-brand-figma f-24"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="avtar avtar-s text-white bg-pinterest">
                            <i class="ti ti-brand-pinterest f-24"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="avtar avtar-s text-white bg-behance">
                            <i class="ti ti-brand-behance f-24"></i>
                          </a>
                        </li>
                      </ul>
                      <div class="row g-3">
                        <div class="col-4">
                          <h5 class="mb-0">86</h5>
                          <small class="text-muted">Post</small>
                        </div>
                        <div class="col-4 border border-top-0 border-bottom-0">
                          <h5 class="mb-0">40</h5>
                          <small class="text-muted">Project</small>
                        </div>
                        <div class="col-4">
                          <h5 class="mb-0">4.5K</h5>
                          <small class="text-muted">Members</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                
                
              </div>
              <div class="col-lg-7 col-xxl-9">
                <div class="tab-content" id="user-set-tabContent">
                  <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel" aria-labelledby="user-set-profile-tab">
                  
                    <div class="card">
                      <div class="card-header">
                        <h5>Datos personales</h5>
                      </div>
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item px-0 pt-0">
                            <div class="row">
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Nombre completo</p>
                                <p class="mb-0">Anshan Handgun</p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Correo electronico</p>
                                <p class="mb-0">Mr. Deepen Handgun</p>
                              </div>
                            </div>
                          </li>
                          <li class="list-group-item px-0">
                            <div class="row">
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Numero celular</p>
                                <p class="mb-0">(+1-876) 8654 239 581</p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Ciudad</p>
                                <p class="mb-0">New York</p>
                              </div>
                            </div>
                          </li>
                          
                          <li class="list-group-item px-0 pb-0">
                            <h5>Direccion</h5>
                            <div class="row">
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Calle y numero exterior</p>
                                <p class="mb-0">(+1-876) 8654 239 581</p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Codigo postal</p>
                                <p class="mb-0">New York</p>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <p class="mb-1 text-muted">Ciudad</p>
                                <p class="mb-0">(+1-876) 8654 239 581</p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Provincia</p>
                                <p class="mb-0">New York</p>
                              </div>
                            </div>

                          </li>
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
                                  <th>Fecha</th>
                                  <th>Metodo de pago</th>
                                  <th>Estatus</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Unity Pugh</td>
                                  <td>9958</td>
                                  <td>Curicó</td>
                                  <td>2005/02/11</td>
                                </tr>
                                
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
  

  </body>
  <!-- [Body] end -->
</html>

<?php 

include "../layouts/footer.php";

?>

<?php 

include "../layouts/scripts.php";

?>