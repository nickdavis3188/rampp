<?php
   session_start();
   if(isset($_SESSION['validuser']))
   {
     include("../partials/_header.php");
     $title = "Home";
     $nav = "";
     include("../../Utils/sidebarUtils.php");
      
?>
<!-- HEADER -->
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php  include("../partials/_navbar.php"); ?>
    <!-- TOP NAV -->
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include($nav); ?>
      <!-- SIDE NAV -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper gbgn">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Dashboard</h4>
                </div>
                <!-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> -->
              </div>
            </div>
          </div>
          
         <!--BODY -->
         <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bgn"  >
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Category</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">34040</h3>
                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    <!-- <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> -->
                  </div>  
                  <!-- <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ms-1"><small>(30 days)</small></span></p> -->
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bgn" >
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Prouduct</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">47033</h3>
                    <i class="ti-archive icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <!-- <p class="mb-0 mt-2 text-danger">0.47% <span class="text-black ms-1"><small>(30 days)</small></span></p> -->
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bgn" >
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Low In Stock</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">40016</h3>
                    <i class="ti-stats-down icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <!-- <p class="mb-0 mt-2 text-success">64.00%<span class="text-black ms-1"><small>(30 days)</small></span></p> -->
                </div>
              </div>
            </div>
            <!-- <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Returns</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">61344</h3>
                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ms-1"><small>(30 days)</small></span></p>
                </div>
              </div>
            </div> -->
          </div>
         
          <div class="row">
				  
				    <div class="col-12 grid-margin stretch-card">
              <div class="card bgn" >
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-md-12 grid-margin">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <p class="card-title mb-0">Top Products</p>
                        </div>
                        <div>
                          <button type="button" class="btn btn-outline-info btn-icon-text">
                            Export
                            <i class="ti-export btn-icon-append"></i>                                                                              
                          </button>
                           
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Product</th>
                        <th>Min Level</th>
                        <th>Current Level</th>
                        <th>Re-stock Item</th>
                        <th>Delete</th>
                      </tr>
                      </thead>
                      <tbody>
                     
                        <tr>
                          <td>Jacob</td>
                          <td>Photoshop</td>
                          <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>Flash</td>
                          <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>Premier</td>
                          <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>After effects</td>
                          <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                          <td><label class="badge badge-success">Completed</label></td>
                          <td><label class="badge badge-success">Completed</label></td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>Flash</td>
                          <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>				
          </div>

         <!--BODY -->
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- FOOTER -->
        <?php include("../partials/_footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div> <!-- end of side nav -->
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<!-- SCRIPT -->
<?php 
 
 include("../partials/_script.php");
 }
 else
 {
     header("Location: ../../index.php?message=loginNot");
     exit;
 }
?>