<?php
  include "View/partials/AuthPartials/_header.php"
?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="www/images/logo.jpeg" alt="logo">
              </div>
              <br>
              <?php  
                if (isset($_REQUEST['message'])) {
                     if ( $_REQUEST['message'] == "Incorrect credentials") {                   
              ?>
                <h4 class="text-danger"><?php echo $_REQUEST['message']?></h4>
              <?php
                }else if($_REQUEST['message'] == "Please confirm your inputs"){               
              ?>
              <h4 class="text-info"><?php echo $_REQUEST['message']?></h4>
              <?php
                }else{              
              ?>
                <h4 class="text-success"><?php echo $_REQUEST['message']?></h4>
              <?php            
                }
              } 
              ?>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="Controller/loginController.php" method="post">
                <div class="form-group">
                  <input name="username" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" >
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onClick="loading(this)" style="background:#02679a;color:white;">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                 
                  <a href="forgotpassword.php" class="auth-link text-black">Forgot password?</a>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <?php
  include "View/partials/AuthPartials/_script.php"
  ?>
  <!-- endinject -->
</body>

</html>
