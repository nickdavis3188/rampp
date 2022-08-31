<?php
   session_start();
   if(isset($_SESSION['validuser']))
   {
     include("../partials/_header.php");
     $title = "Home";
     $nav = "";
     include("../../Utils/sidebarUtils.php");

     require("../../Controller/generalController.php");
     include("../../Env/env.php");
     require("../../Connection/dbConnection.php");
   
     $conn = conString1();

     $dashData = new GeneralController();
     $data = $dashData->getAllInventory($conn);
     $data1 = $dashData->getAllInventory1($conn);
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
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $dashData->getAllInventoryCat($conn) ?></h3>
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
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $dashData->getAllInventoryPro($conn) ?></h3>
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
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $dashData->getAllInventoryLow($conn) ?></h3>
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
                          <p class="card-title mb-0">Low In Stock Products</p>
                        </div>
                        <div>
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
                        <th>Category</th>
                        <th>Selling Price</th>
                        <th>Current Level</th>                  
                        <th>Min Level</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (count($data) == 0) { 
                        ?>
                        <tr>
                          <td colspan="8" class="text-center">NO DATA</td>
                        </tr>
                        <?php
                        }{
                          foreach ($data as $index => $value) {
            
                            $retVal = ($value["quantityadded"] > $value["minnimumlevle"]) ?"text-success" :"text-danger";
                            $retVal2 = ($value["quantityadded"] > $value["minnimumlevle"]) ?"ti-arrow-up" :"ti-arrow-down";
 
                            $retVal3 = ($value["salable"] == 2 ) ?"Salable" :"None Salable";
                            $retVal4 = ($value["salable"] == 2 ) ?"badge badge-info" :"badge badge-warning";
                           
                           
                        ?>
                        <tr>
                          <td><?php echo $index +1 ?></td>
                          <td><?php echo $value["productname"] ?></td>
                          <td><?php echo $value["catname"] ?></td>
                          <td><?php echo "#".number_format($value["sellingprice"],2,".",",") ?></td>
                          <td><?php echo $value["quantityadded"] ?></td>
                          <td class='<?php echo $retVal; ?>'><?php echo $value["minnimumlevle"]; ?><i class='<?php echo $retVal2; ?>'></td>
                          <td><label class='<?php echo $retVal4; ?>'><?php echo $retVal3; ?></label></td>
                          <td><label class="text-center">
                         <?php
                         if ($value["quantityadded"] < $value["minnimumlevle"]) {
                      
                         ?>
                          <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Restock">
                            <i style="color: #02679a;" class="ti-plus btn-icon-append dropbtn " data-bs-toggle="modal" data-bs-target="#restockModal" onClick="restock2('<?php echo $value['id'] ?>','<?php echo $value["productname"] ?>')"></i>
                          </span>
                          </label></td>
                          <?php                      
                         }                    
                         ?>

                        </tr>
                        <?php
                         
                            }
                            }
                          ?>  
                    
                      </tbody>
                    </table>
                  </div>
                  <br><br><br><br>
                  <!-- best sold -->
                  <div class="row">
                    <div class="col-md-12 grid-margin">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <p class="card-title mb-0">Best Sold Products</p>
                        </div>
                        <div>
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
                        <th>Category</th>
                        <th>Selling Price</th>
                        <th>Quantity Sold</th>                  
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (count($data1) == 0) { 
                        ?>
                        <tr>
                          <td colspan="8" class="text-center">NO DATA</td>
                        </tr>
                        <?php
                        }{
                          foreach ($data1 as $index => $value) {
                        ?>
                        <tr>
                          <td><?php echo $index +1 ?></td>
                          <td><?php echo $value["productname"] ?></td>
                          <td><?php echo $value["catname"] ?></td>
                          <td><?php echo "#".number_format($value["sellingprice"],2,".",",") ?></td>
                          <td><?php echo $value["numberSold"] ?></td>
                        </tr>
                        <?php
                         
                            }
                          }
                          ?>  
                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>				
          </div>

         <!--BODY -->
          
            <div class="modal fade" id="restockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered ">
                <h4 class="card-title"></h4>
                <div class="modal-content ">
                <form action="../../Utils/restockInventory.php" method="post">
                  <div class="modal-header gbgn">
                    <p>Restock <Span id="itd" style="color:#02679a;"></Span></p>     
                  </div>
                  <div class="modal-body gbgn">
                    <div class="form-group row">
                      <input name="id" type="hidden" class="form-control delid2" id="exampleInputUsername1" >
                      <input name="date" type="hidden" class="form-control delid2" id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>">

                      <div class="form-group row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Quantity Added</label>
                                  <input name="qtyadded" type="number" class="form-control rs" id="exampleInputUsername1" required >
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Reason</label>
                                  <input name="reason" type="text" class="form-control delid2" id="exampleInputUsername1" >
                              </div>
                          </div>
                      </div>
                      
                      <div class="col-sm-12">
                          <div class="form-group">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                                <button type="submit" name="restock" class="btn " onClick="loading33(this)"  style="background:#02679a;color:white;">Restock</button>  

                          </div>
                      </div>
                    
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          
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
  <?php
 include("../partials/_script.php");
 if (isset($_REQUEST['fail']))
 { 
?>
<script>
  let elemet = document.querySelector('#fail')
  new bootstrap.Toast(elemet,{animation:true,delay:6000}).show()
  
</script>
<?php
 }else{
   
?>
<script>
  let elemet2 = document.querySelector('#succ')
  new bootstrap.Toast(elemet2,{animation:true,delay:6000}).show() 
</script>
<?php
 }
?>
  <!-- container-scroller -->
<script>
  function restock2(pars,name) {
    let myid2 = document.querySelector(".delid2"); 
    let itd = document.querySelector("#itd"); 
    myid2.value = pars
    itd.innerHTML = name
  }
</script>
<!-- SCRIPT -->
<?php 
 
 }
 else
 {
     header("Location: ../../index.php?message=loginNot");
     exit;
 }
?>