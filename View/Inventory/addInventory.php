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
   
     $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();

     $UserUtils = new GeneralController();
     $data = $UserUtils-> getAllCategory();
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
                  <h4 class="font-weight-bold mb-0">ADD INVENTORY</h4>
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
         <!-- <div class="col-md-8 grid-margin stretch-card">

         </div> -->
         <div class="col-md-8 grid-margin ">
              <div class="" >
                <div class="">
                  <h4 class="card-title">New Product form</h4>
                
                  <form class="forms-sample" action="../../Controller/inventoryController.php" method="post">
                      <div class="form-group row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">product Category</label>
                            <select name="catname"  class="form-control form-control" id="exampleFormControlSelect1">
                              <?php
                                foreach ($data as $index => $value) {
                                  
                                
                              ?>
                              <option value="<?php echo $value['catname']?>"><?php echo $value['catname']?></option>
                              <?php
                                }
                              ?>
                              </select>
                          </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Name</label>
                                <input name="pname" type="text" class="form-control" id="exampleInputUsername1" >
                            </div>    
                        </div>
                      
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Quantity Added</label>
                                <input name="qtyadded" type="text" class="form-control" id="exampleInputUsername1" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Minimum Level</label>
                                <input name="minlevle" type="text" class="form-control" id="exampleInputUsername1" >
                            </div>
                        </div>
                      
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Cost Price</label>
                                <input name="costp" type="text" class="form-control cp" id="exampleInputUsername1" >
                            </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Selling Price</label>
                                <input name="sallingp" type="text" class="form-control sp" id="exampleInputUsername1" onChange="calcProfit(this)">
                            </div>
                        </div>                     
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Profit</label>
                                <input name="profit" type="text" class="form-control pft" id="exampleInputUsername1">
                            </div>    
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Preparation Time</label>
                            <select name="preptime" class="form-control form-control" id="exampleFormControlSelect1">
                  
                              <?php
                               for ($i=1; $i <= 60; $i++) { 
                                if ($i == 1) {                               
                                  echo("<option selected='selected' value=$i Minute>$i Minute</option>"); 
                                }else{
                                  echo("<option value=$i Minutes>$i Minutes</option>"); 
                                }                          
                              }
                              
                              ?>
                             
                              </select>
                          </div>    
                        </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                              
                            <div class="form-check">
                              <label class="form-check-label" style="background:#02679a;color:white;">
                                <input value="2" name="salable" type="checkbox" class="form-check-input"  style="background:#02679a;color:white;">
                                Salable
                              </label>
                            </div>
                        </div>
                           
                        </div>
                      
                    </div>
                    <!-- /////////////////////// -->

       
                    <button name="inventory" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="loading(this)">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin " style="border-left: solid;border-color:#dddce1;">
              <div class="" >
                <div class="">
                  <h4 class="card-title">New Category Form</h4>
                  
                  <form class="forms-sample"  action="../../Controller/inventoryController.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Category Name</label>
                        <input name="catname" type="text" class="form-control" id="exampleInputUsername1">
                      </div>
                      <button name="category" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="loading(this)">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                    <br/>
                    <hr/>
                    <br/>
                    <h4 class="card-title">Delete Category</h4>
                    <form class="forms-sample"  action="../../Controller/inventoryController.php" method="post">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category</label>
                        <select name="id" class="form-control form-control" id="exampleFormControlSelect1">
                        <?php
                                foreach ($data as $index => $value) {
                                  
                                
                              ?>
                              <option value="<?php echo $value['id']?>"><?php echo $value['catname']?></option>
                              <?php
                                }
                              ?>
                          </select>
                      </div>
                      <button name="delcategory" type="submit" class="btn btn-danger me-2" style="background:#dc3545;color:white;" onClick="deleting(this)">Delete</button>
                      <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
         </div>

         <!--BODY -->
          
         <?php
                  if (isset($_REQUEST['fail'])){          
                                   
            ?>

         <!--BODY -->
         <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="fail" class="toast hide align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                <div class="toast-body">
                <?php            
                     echo $_REQUEST["fail"];                          
                  ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
            </div>
          </div>         
          <?php
              }

              if(isset($_REQUEST['msg'])){                        
            ?>
         <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="succ" class="toast hide align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                <div class="toast-body">
                  <?php                                          
                        echo $_REQUEST["msg"];                                                    
                  ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
            </div>
          </div>   
          <?php
              }              
            ?> 


          
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

<script>
  function calcProfit(){
    let sellingPrice = document.querySelector(".sp"); 
    let profit = document.querySelector(".pft"); 
    let costPrice = document.querySelector(".cp"); 

    profit.value =  parseFloat(Number(sellingPrice.value - costPrice.value ).toFixed(2)) 
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