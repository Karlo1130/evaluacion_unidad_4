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
    <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->


    <!-- [ Main Content ] start -->
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
            <div class="card border-0 table-card user-profile-list">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="pc-dt-simple">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="../assets/images/user/avatar-1.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0">Quinn Flynn</h6>
                              <p class="m-b-0 text-primary">Android developer</p>
                            </div>
                          </div>
                        </td>
                        <td>Support Lead</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>
                          <span class="badge bg-light-success">Active</span>
                          <div class="overlay-edit">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a
                              ></li>
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a
                              ></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="../assets/images/user/avatar-2.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0">Garrett Winters</h6>
                              <p class="m-b-0 text-primary">Android developer</p>
                            </div>
                          </div>
                        </td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>
                          <span class="badge bg-light-danger">Disabled</span>
                          <div class="overlay-edit">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a
                              ></li>
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a
                              ></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="../assets/images/user/avatar-3.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0">Ashton Cox</h6>
                              <p class="m-b-0 text-primary">Android developer</p>
                            </div>
                          </div>
                        </td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>
                          <span class="badge bg-light-danger">Disabled</span>
                          <div class="overlay-edit">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a
                              ></li>
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a
                              ></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="../assets/images/user/avatar-4.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0">Cedric Kelly</h6>
                              <p class="m-b-0 text-primary">Android developer</p>
                            </div>
                          </div>
                        </td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <td>
                          <span class="badge bg-light-success">Active</span>
                          <div class="overlay-edit">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a
                              ></li>
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a
                              ></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="../assets/images/user/avatar-4.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0">Airi Satou</h6>
                              <p class="m-b-0 text-primary">Android developer</p>
                            </div>
                          </div>
                        </td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td>
                          <span class="badge bg-light-success">Active</span>
                          <div class="overlay-edit">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a
                              ></li>
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a
                              ></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="../assets/images/user/avatar-5.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0">Brielle Williamson</h6>
                              <p class="m-b-0 text-primary">Android developer</p>
                            </div>
                          </div>
                        </td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012/12/02</td>
                        <td>
                          <span class="badge bg-light-danger">Disabled</span>
                          <div class="overlay-edit">
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a
                              ></li>
                              <li class="list-inline-item m-0"
                                ><a href="#" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a
                              ></li>
                            </ul>
                          </div>
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
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
      <div class="footer-wrapper container-fluid">
        <div class="row">
          <div class="col-sm-6 my-1">
            <p class="m-0">Made with &#9829; by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank"> Phoenixcoded</a></p>
          </div>
          <div class="col-sm-6 ms-auto my-1">
            <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
              <li class="list-inline-item"><a href="../index.html">Home</a></li>
              <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/" target="_blank">Documentation</a></li>
              <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/" target="_blank">Support</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
 <!-- Required Js -->
<script src="../assets/js/plugins/popper.min.js"></script>
<script src="../assets/js/plugins/simplebar.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>
<script src="../assets/js/fonts/custom-font.js"></script>
<script src="../assets/js/pcoded.js"></script>
<script src="../assets/js/plugins/feather.min.js"></script>

   
<script>
  layout_change('light');
</script>
   
<script>
  layout_sidebar_change('light');
</script>
  
<script>
  change_box_container('false');
</script>
 
<script>
  layout_caption_change('true');
</script>
   
<script>
  layout_rtl_change('false');
</script>
 
<script>
  preset_change('preset-1');
</script>


    <!-- [Page Specific JS] start -->
    <script src="../assets/js/plugins/simple-datatables.js"></script>
    <script>
      const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
        sortable: false,
        perPage: 5
      });
    </script>
    <!-- [Page Specific JS] end -->
    <div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
      <div class="offcanvas-header justify-content-between">
        <h5 class="offcanvas-title">Settings</h5>
        <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas" aria-label="Close"
          ><i class="ti ti-x"></i
        ></button>
      </div>
      <div class="pct-body customizer-body">
        <div class="offcanvas-body py-0">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="pc-dark">
                <h6 class="mb-1">Theme Mode</h6>
                <p class="text-muted text-sm">Choose light or dark mode or Auto</p>
                <div class="row theme-color theme-layout">
                  <div class="col-4">
                    <div class="d-grid">
                      <button class="preset-btn btn active" data-value="true" onclick="layout_change('light');">
                        <span class="btn-label">Light</span>
                        <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                      </button>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="d-grid">
                      <button class="preset-btn btn" data-value="false" onclick="layout_change('dark');">
                        <span class="btn-label">Dark</span>
                        <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                      </button>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="d-grid">
                      <button
                        class="preset-btn btn"
                        data-value="default"
                        onclick="layout_change_default();"
                        data-bs-toggle="tooltip"
                        title="Automatically sets the theme based on user's operating system's color scheme."
                      >
                        <span class="btn-label">Default</span>
                        <span class="pc-lay-icon d-flex align-items-center justify-content-center">
                          <i class="ph-duotone ph-cpu"></i>
                        </span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <h6 class="mb-1">Sidebar Theme</h6>
              <p class="text-muted text-sm">Choose Sidebar Theme</p>
              <div class="row theme-color theme-sidebar-color">
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn" data-value="true" onclick="layout_sidebar_change('dark');">
                      <span class="btn-label">Dark</span>
                      <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                    </button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn active" data-value="false" onclick="layout_sidebar_change('light');">
                      <span class="btn-label">Light</span>
                      <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                    </button>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <h6 class="mb-1">Accent color</h6>
              <p class="text-muted text-sm">Choose your primary theme color</p>
              <div class="theme-color preset-color">
                <a href="#!" class="active" data-value="preset-1"><i class="ti ti-check"></i></a>
                <a href="#!" data-value="preset-2"><i class="ti ti-check"></i></a>
                <a href="#!" data-value="preset-3"><i class="ti ti-check"></i></a>
                <a href="#!" data-value="preset-4"><i class="ti ti-check"></i></a>
                <a href="#!" data-value="preset-5"><i class="ti ti-check"></i></a>
                <a href="#!" data-value="preset-6"><i class="ti ti-check"></i></a>
                <a href="#!" data-value="preset-7"><i class="ti ti-check"></i></a>
                <a href="#!" data-value="preset-8"><i class="ti ti-check"></i></a>
                <a href="#!" data-value="preset-9"><i class="ti ti-check"></i></a>
                <a href="#!" data-value="preset-10"><i class="ti ti-check"></i></a>
              </div>
            </li>
            <li class="list-group-item">
              <h6 class="mb-1">Sidebar Caption</h6>
              <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
              <div class="row theme-color theme-nav-caption">
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn active" data-value="true" onclick="layout_caption_change('true');">
                      <span class="btn-label">Caption Show</span>
                      <span class="pc-lay-icon"
                        ><span></span><span></span><span><span></span><span></span></span><span></span
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="d-grid">
                    <button class="preset-btn btn" data-value="false" onclick="layout_caption_change('false');">
                      <span class="btn-label">Caption Hide</span>
                      <span class="pc-lay-icon"
                        ><span></span><span></span><span><span></span><span></span></span><span></span
                      ></span>
                    </button>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="pc-rtl">
                <h6 class="mb-1">Theme Layout</h6>
                <p class="text-muted text-sm">LTR/RTL</p>
                <div class="row theme-color theme-direction">
                  <div class="col-6">
                    <div class="d-grid">
                      <button class="preset-btn btn active" data-value="false" onclick="layout_rtl_change('false');">
                        <span class="btn-label">LTR</span>
                        <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                      </button>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="d-grid">
                      <button class="preset-btn btn" data-value="true" onclick="layout_rtl_change('true');">
                        <span class="btn-label">RTL</span>
                        <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item pc-box-width">
              <div class="pc-container-width">
                <h6 class="mb-1">Layout Width</h6>
                <p class="text-muted text-sm">Choose Full or Container Layout</p>
                <div class="row theme-color theme-container">
                  <div class="col-6">
                    <div class="d-grid">
                      <button class="preset-btn btn active" data-value="false" onclick="change_box_container('false')">
                        <span class="btn-label">Full Width</span>
                        <span class="pc-lay-icon"
                          ><span></span><span></span><span></span><span><span></span></span
                        ></span>
                      </button>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="d-grid">
                      <button class="preset-btn btn" data-value="true" onclick="change_box_container('true')">
                        <span class="btn-label">Fixed Width</span>
                        <span class="pc-lay-icon"
                          ><span></span><span></span><span></span><span><span></span></span
                        ></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-grid">
                <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
              </div>
            </li>
          </ul>
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