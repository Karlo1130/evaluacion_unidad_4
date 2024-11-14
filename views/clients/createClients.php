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
          <div class="card">
              <div class="card-header">
                <h5>Basic Inputs</h5>
              </div>
              <div class="card-body">
                <div class="alert alert-primary">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
                    </div>
                    <div class="flex-grow-1 ms-3"> Basic HTML form components with custom style. </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email address</label>
                  <input type="email" class="form-control form-control" placeholder="email@company.com" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                  <small>Your password must be between 8 and 30 characters.</small>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="exampleSelect1">Select</label>
                  <select class="form-select" id="exampleSelect1">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="exampleSelect2">Multiple select</label>
                  <select multiple="" class="form-select" id="exampleSelect2">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                  <small>Hold shift or press ctrl for multi select.</small>
                </div>
                <div class="mb-0">
                  <label class="form-label" for="exampleTextarea">Textarea</label>
                  <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                </div>
              </div>
              <div class="card-footer pt-0">
                <button class="btn btn-primary me-2">Submit</button>
                <button type="reset" class="btn btn-light">Reset</button>
              </div>
            </div>
          <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
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