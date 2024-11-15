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
            <li class="pc-item ">
              <a href="#!" class="pc-link">
                <span class="pc-micon">
                  <i class="ph-duotone ph-gauge"></i>
                </span>
                <span class="pc-mtext">Dashboard</span>
                <span class="pc-badge">2</span>
              </a>
              
            </li>

            
            <!-- products -->
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span class="pc-micon">
                  <i class="ph-duotone ph-shopping-cart"></i>
                </span>
                <span class="pc-mtext">Productos</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
              ></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="<?= BASE_PATH ?>products/">Lista de productos</a></li>
                <li class="pc-item"><a class="pc-link" href="<?= BASE_PATH ?>products/create">Añadir Producto</a></li>
                
              </ul>
            </li>
          

            <!-- clients -->

            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span class="pc-micon">
                  <i class="ph-duotone ph-newspaper"></i>
                </span>
                <span class="pc-mtext">Clientes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
              ></a>
              <ul class="pc-submenu">
                 <li class="pc-item"><a class="pc-link" href="../admins/course-dashboard.html">Clientes</a></li>
                 <li class="pc-item"><a class="pc-link" href="../admins/course-dashboard.html">Añadir Cliente</a></li>
              </ul> 
          
              
          
            </li>

            <!-- orders -->
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">
                <span class="pc-micon">
                  <i class="ph-duotone ph-newspaper"></i>
                </span>
                <span class="pc-mtext">Ordenes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
              ></a>
              <ul class="pc-submenu">
                 <li class="pc-item"><a class="pc-link" href="../admins/course-dashboard.html">Lista de ordenes</a></li>
                 <li class="pc-item"><a class="pc-link" href="../admins/course-dashboard.html">Añadir Cliente</a></li>
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