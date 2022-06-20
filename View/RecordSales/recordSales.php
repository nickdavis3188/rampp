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
        <button type="button" id="back" class="btn btn-icon-text text-white" style="background:#dddce1;" onClick="window.history.back()">
          <i class="ti-shift-left-alt btn-icon-append"></i>                          
          Back
        </button>
          <br/>
          <br/>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Record Sale</h4>
                </div>
                <!-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      Report
                    </button>
                </div> -->
              </div>
            </div>
          </div>
          
         <!--BODY -->
         
          <div class="row">
				  	<div class="container">
            <form action="" method="get">
                
                <div class="form-group row">
                    <div class="col-md-5">
                      <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input type="number" class="form-control form-control-lg" >
                    </div>
                    <div class="col-sm-5">
                      <button type="submit" class= "btn  text-white bg-pry btn-block" style="background-color: #02679a;">
                        <i class="ti-plus btn-icon-prepend text-white"></i> Add
                      </button>                                                       
                    </div>                                                  
                </div>
              </form>
              <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Profit</th>
                      <th>Amount</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Millo</td>
                        <td>345</td>
                        <td>89</td>                       
                        <td>4360-</td>
                        <td>-765467</td>
                        <td>                      
                          <i class="ti-trash text-danger btn-icon-append" style="font-size: 24px">                                                                         
                        </td>
                      </tr>
                      <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th style="color: #02679a;">Total Amount</th>
                      <th style="color: #02679a;">Total Profitt</th>
                      <th></th>
                    </tr>
                    
                      <tr>
                        <td colspan="1">Total:</td>
                        <td></td>
                        <td></td>
                        <td></td>                       
                        <td>29678</label></td>
                        <td>765678</label></td>
                        <td></td>
                      </tr>
                                     
                    </tbody>
                  </table>
                  <br/>
                </div>
                <tfooter>
                <button type="button" class="btn  btn-icon-text  btn-block text-white br-pry" style="background-color: #02679a;">
                  <i class="ti-save btn-icon-append"></i>                          
                  Save
                </button>               
                </tfooter>

            </div>
          <!-- <div class="col-12 grid-margin stretch-card">
            <div class="card bgn">
              <div class="card-body">    btn-rounded
               <h4 class="card-title">Specify sale details</h4>           
   
                <div>
                 
                
              </div>
            </div>
          </div>
          </div> -->

         <!--BODY -->
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      </div>
      <!-- FOOTER -->
      <?php include("../partials/_footer.php"); ?>
      <!-- partial -->
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