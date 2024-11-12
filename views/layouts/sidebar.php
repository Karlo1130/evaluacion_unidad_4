<!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->
     <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
      <div class="navbar-wrapper">
        <div class="m-header">
          <a href="index.html" class="b-brand text-primary">
            <!-- ========   Change your logo from here   ============ -->
            <img src="<?= BASE_PATH ?>assets/images/logo-dark.svg" alt="logo image" class="logo-lg" />
            <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version">v1.2.0</span>
          </a>
        </div>
        <div class="navbar-content">
          <ul class="pc-navbar">
            <li class="pc-item pc-caption">
              <label>Navigation</label>
              <i class="ph-duotone ph-gauge"></i>
            </li>
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span class="pc-micon">
                  <i class="ph-duotone ph-gauge"></i>
                </span>
                <span class="pc-mtext">Dashboard</span>
                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                <span class="pc-badge">2</span>
              </a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="index.html">Analytics</a></li>
                <li class="pc-item"><a class="pc-link" href="affiliate.html">Affiliate</a></li>
                <li class="pc-item"><a class="pc-link" href="finance.html">Finance</a></li>
                <li class="pc-item"><a class="pc-link" href="../admins/helpdesk-dashboard.html">Helpdesk</a></li>
                <li class="pc-item"><a class="pc-link" href="invoice.html">Invoice</a></li>
              </ul>
            </li>
            
           
            
            
            
            
            
            
            
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span class="pc-micon">
                  <i class="ph-duotone ph-shopping-cart"></i>
                </span>
                <span class="pc-mtext">E-commerce</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
              ></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="<?= BASE_PATH ?>products/">Product</a></li>
                <li class="pc-item"><a class="pc-link" href="../application/ecom_product-details.html">Product details</a></li>
                <li class="pc-item"><a class="pc-link" href="../application/ecom_product-list.html">Product List</a></li>
                <li class="pc-item"><a class="pc-link" href="../application/ecom_product-add.html">Add New Product</a></li>
                <li class="pc-item"><a class="pc-link" href="../application/ecom_checkout.html">Checkout</a></li>
              </ul>
            </li>
           
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span class="pc-micon">
                  <i class="ph-duotone ph-newspaper"></i>
                </span>
                <span class="pc-mtext">Invoice 1</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
              ></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="../application/invoice-list.html">Invoice List</a></li>
                <li class="pc-item"><a class="pc-link" href="../application/invoice-create.html">Create</a></li>
                <li class="pc-item"><a class="pc-link" href="../application/invoice-view.html">Preview</a></li>
                <li class="pc-item"><a class="pc-link" href="../admins/invoice-dashboard.html">Dashboard</a></li>
                <li class="pc-item"><a class="pc-link" href="../admins/invoice-create.html">Create</a></li>
                <li class="pc-item"><a class="pc-link" href="../admins/invoice-view.html">Details</a></li>
                <li class="pc-item"><a class="pc-link" href="../admins/invoice-list.html">List</a></li>
                <li class="pc-item"><a class="pc-link" href="../admins/invoice-edit.html">Edit</a></li>
              </ul>
            </li>
            
            
           
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span class="pc-micon">
                  <i class="ph-duotone ph-books"></i>
                </span>
                <span class="pc-mtext">Online Courses</span>
                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
              </a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="../admins/course-dashboard.html">Dashboard</a></li>
                <li class="pc-item pc-hasmenu">
                  <a class="pc-link" href="#!"
                    >Teacher<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                  ></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="../admins/course-teacher-list.html">List</a></li>
                    <li class="pc-item"><a class="pc-link" href="../admins/course-teacher-apply.html">Apply</a></li>
                    <li class="pc-item"><a class="pc-link" href="../admins/course-teacher-add.html">Add</a></li>
                  </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                  <a class="pc-link" href="#!"
                    >Student<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                  ></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="../admins/course-student-list.html">list</a></li>
                    <li class="pc-item"><a class="pc-link" href="../admins/course-student-apply.html">Apply</a></li>
                    <li class="pc-item"><a class="pc-link" href="../admins/course-student-add.html">Add</a></li>
                  </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                  <a class="pc-link" href="#!"
                    >Courses<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                  ></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="../admins/course-course-view.html">View</a></li>
                    <li class="pc-item"><a class="pc-link" href="../admins/course-course-add.html">Add</a></li>
                  </ul>
                </li>
                <li class="pc-item"><a class="pc-link" href="../admins/course-pricing.html">Pricing</a></li>
                <li class="pc-item"><a class="pc-link" href="../admins/course-site.html">Site</a></li>
                <li class="pc-item pc-hasmenu">
                  <a class="pc-link" href="#!"
                    >Setting<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                  ></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="../admins/course-setting-payment.html">Payment</a></li>
                    <li class="pc-item"><a class="pc-link" href="../admins/course-setting-pricing.html">Pricing</a></li>
                    <li class="pc-item"><a class="pc-link" href="../admins/course-setting-notifications.html">Notifications</a></li>
                  </ul>
                </li>
              </ul>
            </li>
           
            

           
            
            
            
            
          </ul>
          <div class="card nav-action-card bg-brand-color-4">
            <div class="card-body" style="background-image: url('<?= BASE_PATH ?>assets/images/layout/nav-card-bg.svg')">
              <h5 class="text-dark">Help Center</h5>
              <p class="text-dark text-opacity-75">Please contact us for more questions.</p>
              <a href="https://phoenixcoded.support-hub.io/" class="btn btn-primary" target="_blank">Go to help Center</a>
            </div>
          </div>
        </div>
        <div class="card pc-user-card">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <img src="<?= BASE_PATH ?>assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-45 rounded-circle" />
              </div>
              <div class="flex-grow-1 ms-3">
                <div class="dropdown">
                  <a href="#" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="0,20">
                    <div class="d-flex align-items-center">
                      <div class="flex-grow-1 me-2">
                        <h6 class="mb-0">Jonh Smith</h6>
                        <small>Administrator</small>
                      </div>
                      <div class="flex-shrink-0">
                        <div class="btn btn-icon btn-link-secondary avtar">
                          <i class="ph-duotone ph-windows-logo"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="dropdown-menu">
                    <ul>
                      <li>
                        <a class="pc-user-links">
                          <i class="ph-duotone ph-user"></i>
                          <span>My Account</span>
                        </a>
                      </li>
                      <li>
                        <a class="pc-user-links">
                          <i class="ph-duotone ph-gear"></i>
                          <span>Settings</span>
                        </a>
                      </li>
                      <li>
                        <a class="pc-user-links">
                          <i class="ph-duotone ph-lock-key"></i>
                          <span>Lock Screen</span>
                        </a>
                      </li>
                      <li>
                        <a class="pc-user-links">
                          <i class="ph-duotone ph-power"></i>
                          <span>Logout</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->