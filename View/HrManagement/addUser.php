<?php
   session_start();
   if(isset($_SESSION['validuser']))
   {
     include("../partials/_header.php");
     $title = "Home";
     $nav = "";
     include("../../Utils/sidebarUtils.php");
     include("../../Utils/sidebarUtils.php");
      
     require("../../Controller/generalController.php");
     include("../../Env/env.php");
     require("../../Connection/dbConnection.php");
   

     $conn = conString1();

     $UserUtils = new GeneralController();
     $data3 = $UserUtils->staffT($conn);
      
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
                  <h4 class="font-weight-bold mb-0">New User Record</h4>
                </div>
                <!-- <div>
                   <div class="alert alert-danger" role="alert">
                     somthing is wrong
                   </div>
                </div> -->
              </div>
            </div>
          </div>
          
         <!--BODY -->
         <div class="row">
         <div class="col-12 grid-margin ">
              <div class="" >
                <div class="">
                  <!-- <h4 class="card-title">Enter Personnel Info</h4> -->
                
                  <form class="forms-sample" action="../../Controller/userController.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">First Name</label>
                                <input name="fname" type="text" class="form-control" id="exampleInputUsername1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Last Name</label>
                                <input name="lname" type="text" class="form-control" id="exampleInputUsername1" >
                            </div>
                        </div>                   
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Sex</label>
                            <select name="sex" class="form-control form-control" id="exampleFormControlSelect1">
                              <option value="">__select__</option>
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

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputUsername1">
                            </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Home Address</label>
                                <input name="address" type="text" class="form-control" id="exampleInputUsername1">
                            </div>
                        </div>                     
                    </div>
                    
    
    
    
                    <div class="form-group row ">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Designation</label>
                                <select name="office" class="form-control form-control" id="exampleFormControlSelect1" onchange="desig(this)" >
                                    <option value="">__select__</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Managing Director">Managing Director</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Staff">Staff</option>                                      
                                </select>
                            </div>    
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Role</label>
                            <select name="role" class="form-control form-control" id="exampleFormControlSelect1">
                              <option value="">__select__</option>
                              <option value="Admin">Admin</option>
                              <option value="Supervisor">Supervisor</option>
                              <option value="Managing Director">Managing Director</option>
                              <option value="Manager">Manager</option>
                              <option value="Accountant">Accountant</option>
                              <option value="SelsePerson">SelsePerson</option>
                              <option value="Bar">Bar</option>
                              <option value="Kitchen">Kitchen</option>
                              <option value="Porter">Porter</option>
                            </select>
                          </div>    
                        </div>
                                       
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">User Name</label>
                                <input name="username" type="text" class="form-control" id="exampleInputUsername1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputUsername1" >
                            </div>
                        </div>                   
                    </div>
                    <div class="form-group row pp">
                      <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label for="formFile" class="form-label">Signature</label>
                              <input name="signature" class="form-control" type="file" id="formFile"style="background:#02679a;color:white;">
                            </div>    
                        </div> 
                        <div class="col-sm-6">
                            <div class="mb-3 form-group">
                              <label for="formFile" class="form-label">Profile Pic</label>
                              <input name="profilepic" class="form-control" type="file" id="formFile"style="background:#02679a;color:white;">
                            </div>    
                        </div>                
                    </div>

                    <div class="form-group row d-none dd">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">SELECT STAFF</label>
                            <select name="staffTag"  class="form-control form-control ib" id="exampleFormControlSelect1">
                              <option selected value="">__SELECT STAFF__</option>
                              <?php
                                 foreach ($data3 as $index => $value1) {                              
                              ?>
                                 <option value="<?php echo $value1["stafftag"] ?>"><?php echo $value1["fname"]." ".$value1["fname"]?></option>
                              <?php
                                 }
                              ?>
                            
                            </select>
                          </div>    
                        </div>      
                      </div>

                    <button name="submit" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="loading(this)">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
         </div>
        

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
         <!-- FOOTER -->
        <?php include("../partials/_footer.php"); ?>
        </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- FOOTER -->
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
<script>
    function desig(inp){
    if (inp.value == "Staff") {
      let staffOption = document.querySelector(".dd");
      let ppOption = document.querySelector(".pp"); 
      staffOption.classList.remove("d-none")
      ppOption.classList.add("d-none")
      
    }else{
      let staffOption2 = document.querySelector(".dd"); 
      let ppOption = document.querySelector(".pp"); 
      staffOption2.classList.add("d-none")
      ppOption.classList.remove("d-none")
    }
  }
</script>
<?php  
 }
 else
 {
     header("Location: ../../index.php?message=loginNot");
     exit;
 }
?>