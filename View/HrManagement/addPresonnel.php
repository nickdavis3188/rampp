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

     $UserUtils = new GeneralController();
     $data = $UserUtils-> getAllDepartment($conn);
      
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
                  <h4 class="font-weight-bold mb-0">New Staff Record</h4>
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
            <div class="col-md-8 grid-margin ">
              <div class="" >
                <div class="">
                  <h4 class="card-title">Enter Personnel Info</h4>
                
                  <form class="forms-sample" action="../../Controller/staffController.php" method="post">

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">First Name</label>
                                <input name="firstname" type="text" class="form-control" id="exampleInputUsername1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Last Name</label>
                                <input name="lastname" type="text" class="form-control" id="exampleInputUsername1" >
                            </div>
                        </div>
                      
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Sex</label>
                            <select name="sex" class="form-control form-control" id="exampleFormControlSelect1">
                              <option value="">__Sellect__</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Phone Number</label>
                                <input name="phone" type="number" class="form-control" id="exampleInputUsername1" >
                            </div>    
                        </div>
                      
                    </div>
                    <?php
                        srand ((double) microtime() * 1000000);
                        $random3 = rand(1000,9999);
                        ?>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Staff Sales Tag</label>
                                <input name="staffTag" type="number" class="form-control" id="exampleInputUsername1" value="<?php echo $random3; ?>">
                            </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Staff Incentive(%)</label>
                                <input name="insentive" type="number" class="form-control" id="exampleInputUsername1">
                            </div>
                        </div>                     
                    </div>
         
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Home Address</label>
                                <input name="address" type="text" class="form-control" id="exampleInputUsername1">
                            </div>    
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Department</label>
                            <select name="id" class="form-control form-control" id="exampleFormControlSelect1">
                              <?php
                                    foreach ($data as $index => $value) {                                  
                                  ?>
                                  <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
                                  <?php
                                    }
                                ?>
                              </select>
                          </div>   
                        </div>                  
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Salary Per Month</label>
                                <input name="paymonth" type="number" class="form-control"  onchange="getValue(this)">
                            </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Salary Per Annum</label>
                                <input name="payannum" type="number" class="form-control annum" id="exampleInputUsername1">
                            </div>
                        </div>                     
                    </div>

                    <button name="submtNewPersonnel" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="loading(this)">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin " style="border-left: solid;border-color:#dddce1;">
            <br>
              <div class="" >
                <div class="">
                  <h4 class="card-title">New Department Form</h4>
                  
                  <form class="forms-sample"  action="../../Controller/staffController.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Department</label>
                        <input name="name" type="text" class="form-control" id="exampleInputUsername1">
                      </div>
                      <button name="dpt" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="loading(this)">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                    <br/>
                    <hr/>
                    <br/>
                    <h4 class="card-title">Delete Department</h4>
                    <form class="forms-sample"  action="../../Controller/staffController.php" method="post">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Department</label>
                        <select name="id" class="form-control form-control" id="exampleFormControlSelect1">
                        <?php
                                foreach ($data as $index => $value) {
                                  
                                
                              ?>
                              <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
                              <?php
                                }
                              ?>
                          </select>
                      </div>
                      <button name="deldpt" type="submit" class="btn btn-danger me-2" style="background:#dc3545;color:white;" onClick="deleting(this)">Delete</button>
                      <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
         </div>

         <!--BODY -->
          <!-- models -->
               
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
          <!-- models -->
       
          
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
  

  function getValue(par) {
    console.log(par.value)
    let payannum = document.querySelector(".annum"); 
    payannum.value =  parseFloat(Number(par.value * 12).toFixed(2))  
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