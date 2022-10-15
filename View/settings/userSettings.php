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
     $username = $_SESSION['validuser'];
     $data = $UserUtils-> getProfileDetails($conn,$username);
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
                  <h4 class="font-weight-bold mb-0">Profile Settings</h4>
                </div>
                <div>
                    <?php
                    if($_REQUEST['modify'] == 0){             
                    ?>
                    <a style="color:#02679a;" href="#" onclick="modify()"><i class="ti-write btn-icon-prepend" ></i> Modify</a>
                    <?php
                    }            
                    ?>
                    <!-- <button type="button" class="btn btn-primary btn-icon-text ">
                      <i class="ti-write btn-icon-prepend"></i>Modify
                    </button> -->
                </div>
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
              <?php
              if($_REQUEST['modify'] == 1){             
              ?>
                  <form class="forms-sample" action="../../Controller/settingsController.php" method="post" enctype="multipart/form-data">
                  <input  name="id" type="hidden" class="form-control" id="exampleInputUsername1" value="<?php echo $data[0]['id']?>">
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputUsername1" value="<?php echo $data[0]['email']?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1">User Name</label>
                                <input name="username" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $data[0]['uname']?>" >
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Password</label>
                                <input name="pwd" type="password" class="form-control" id="exampleInputUsername1" value="<?php echo $data[0]['pword']?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Signature</label>
                                <input name="signature" type="file" class="form-control" id="exampleInputUsername1" >
                            </div>
                        </div>
                      
                    </div>
                                  
                    <button name="update" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="updating(this)">Update</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                  <?php
                    }
                    else if($_REQUEST['modify'] == 0){   
                                
                    ?>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1"style="color:#02679a;">Email: </label>
                                <label for="exampleInputUsername1"><?php echo $data[0]['email']?></label>
                                <!-- <input disabled name="email" type="email" class="form-control" id="exampleInputUsername1" > -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1" style="color:#02679a;">User Name: </label>
                                <label for="exampleInputUsername1"><?php echo $data[0]['uname']?></label>
                                <!-- <input disabled name="username" type="text" class="form-control" id="exampleInputUsername1" > -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1"style="color:#02679a;">Password: </label>
                                <label for="exampleInputUsername1"><?php echo $data[0]['pword']?></label>
                                <!-- <input disabled name="pwd" type="password" class="form-control" id="exampleInputUsername1" > -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1"style="color:#02679a;">Signature: </label>
                                <?php 
                                    if ($data[0]['signature']) {              
                                ?>
                                <img src="<?php echo '../'.$data[0]['signature']?>" alt="signature">
                                <?php    
                                }else{
                                ?>
                                <label for="exampleInputUsername1">No Signature</label>
                                <?php    
                                }
                                ?>
                                <!-- <input disabled name="signature" type="file" class="form-control" id="exampleInputUsername1" > -->
                            </div>
                        </div>
                      
                    </div>
                  <?php
                    }            
                    ?>
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
  function modify(){
    window.location = window.location.origin+"/View/settings/userSettings.php?modify=1";
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