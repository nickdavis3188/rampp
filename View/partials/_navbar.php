<style>
  .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .count-indicator .count {
    background:#02679a;
  }
  /* #02679a */
  /* #eb0e41 */
</style>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row ">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center bgn">
        <a class="navbar-brand brand-logo me-5" href="index.html"><img src="../../www/images/logo.jpeg" class="me-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../www/images/icon.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end bgn">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <?php
            if ($_SERVER['REQUEST_URI'] == '/View/RecordSales/recordSales.php') {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle bel22" id="notificationDropdown" href="#" data-bs-toggle="dropdown" onclick="changeIndicator()">
                <i class="ti-bell mx-0"></i>
                <span class="count c22"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <div class="cont">
                    
                  <!-- <a class=" dropdown-item" >
                    <div class="item-thumbnail">
                      <div class="item-icon bg-success">
                        <i class="ti-shopping-cart-full mx-0"></i>
                      </div>
                    </div>
                    <div class="item-content">
                      <h6 class="font-weight-normal">Settings</h6> 
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Order Number 2
                        <span class="count bg-success text-light p-1 rounded-top rounded-bottom">Kitchen</span>
                        <span class="count bg-secondary text-light p-1 rounded-top rounded-bottom">Bar</span>
                      </p>
                    </div>
                  </a> -->

                  </div>         
                  <a class=" dropdown-item" >
                    <div class="item-content">
                      <!-- <h6 class="font-weight-normal">Settings</h6> -->
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Manage Notifications...
                      </p>
                    </div>
                  </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <img src="../../www/images/faces/face28.jpg" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="../settings/userSettings.php?modify=0">
                  <i class="ti-settings text-primary"></i>
                  Settings
                </a>
                <form action="../../index.php?message=logout successful" method="post">
                  <button class="dropdown-item" type="submit" name="submit">
                    <i class="ti-power-off text-primary"></i>
                    Logout
                  </button>
                </form>
              </div>
            </li>
            <?php
            }else{
              ?>
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <img src="../../www/images/faces/face28.jpg" alt="profile"/>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="../settings/userSettings.php?modify=0">
                      <i class="ti-settings text-primary"></i>
                      Settings
                    </a>
                    <form action="../../index.php?message=logout successful" method="post">
                      <button class="dropdown-item" type="submit" name="submit">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                      </button>
                    </form>
                  </div>
                </li>
            <?php
            }
            ?>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
   