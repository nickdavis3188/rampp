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
    
     
      $conn =conString1();
     $UserUtils = new GeneralController();
      
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
                  <h4 class="font-weight-bold mb-0">Fund Reqisition</h4>
                </div>
                <!-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> -->
              </div>
            </div>
          </div>
          <?php
            // srand ((double) microtime() * 1000000);
            // $random3 = rand(1000,9999);
            ?>

         <!--BODY -->
         <div class="row">
         <div class="col-12 grid-margin ">
              <div class="" >
                <div class="">
                  <h4 class="card-title"></h4>
                
                  <form class="forms-sample" action="../../Controller/fundrequisitionController.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">To</label>
                                <input name="to" type="text" class="form-control" id="exampleInputUsername1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Requisition Number</label>
                                <input readonly name="reqno"  type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $UserUtils->getFunNp($conn); ?>" >
                            </div>
                        </div>
                      
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">From</label>
                              <input readonly name="from" type="text" class="form-control" id="exampleInputUsername1"  value="<?php echo $_SESSION['firstName']." ".$_SESSION['lastName'] ?>">
                          </div>    
                           
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Date</label>
                              <input name="date" type="date" class="form-control" id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>">
                          </div>    
                        </div>
                      
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                        <div class="form-group">
                              <label for="exampleInputUsername1">Required Amount(#)</label>
                              <input name="amount" type="number" class="form-control" id="exampleInputUsername1">
                          </div>
                         
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Amount In Words</label>
                            <input name="amountword" type="text" class="form-control" id="exampleInputUsername1">
                          </div> 
                        </div>                     
                    </div>
         
                    <div class="form-group row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Subject</label>
                              <input name="subject" type="text" class="form-control" id="exampleInputUsername1">
                          </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="mb-3 form-group">
                              <label for="formFile" class="form-label">Supporting Document</label>
                              <input 
                              name="document"
                              class="form-control" type="file" id="formFile"style="background:#02679a;color:white;">
                            </div>
                        
                        </div>
                      
                    </div>
                    <div class="form-group row">                     
                        <div class="col-12">
                          <div class="form-group">
                            <label for="exampleTextarea1">Background/Justification</label>
                            <textarea 
                            name="justification"
                            class="form-control summ" id="exampleTextarea1" rows="3"></textarea>
                          </div>               
                        </div>
                    </div>
                    

                    <button name="submitF" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="loading(this)">Submit</button>
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
<!-- SCRIPT -->
<?php 
 }
 else
 {
     header("Location: ../../index.php?message=loginNot");
     exit;
 }
?>