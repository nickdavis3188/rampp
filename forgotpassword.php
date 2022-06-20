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
                $msg = '';
               if (isset($_REQUEST['password']))
               {
                 $text = $_REQUEST['password'];
                 
                 $msg = "<h4 style='color:#459cfd'>$text<h4>";
                  
                }elseif(isset($_REQUEST['fail'])){
                  $text = $_REQUEST['fail'];
                 
                 $msg = "<h4 class='text-danger'>$text<h4>";
                }

              echo($msg);
            

              ?>
               <h4 >Password Retrieval</h4>
              <form class="pt-3"action="../../Controller/forgotPasswordController.php" method="post">
                <div class="form-group">
                  <input name="firstName" type="text" class="form-control form-control-lg"  placeholder="FirstName" required>
                </div>
                <div class="form-group">
                  <input name="userName" type="text" class="form-control form-control-lg"  placeholder="UserName" required>
                </div>
                <div class="mt-3">
                  <button name="submit" type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onClick="loading(this)" style="background:#02679a;color:white;">RETRIVE</button>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit" value="RETRIVE" >
              </div> -->
              <a  href="index.php" class="auth-link text-black">Back To Login</a>
                
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
