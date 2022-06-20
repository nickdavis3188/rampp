<?php
    include("../partials/AuthPartials/_header.php");
?>

<div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo.jpeg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="../../Controller/signupController.php" method="post">
                <div class="form-group">
                  <input name="firstName" type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="FirstName">
                </div>
                <div class="form-group">
                  <input name="lastName" type="test" class="form-control form-control-lg" id="exampleInputUsername" placeholder="LastName">
                </div>
                <div class="form-group">
                  <input name="userName" type="test" class="form-control form-control-lg" id="exampleInputUsername" placeholder="UserName">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <select name="privilege" class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option selected disabled >---Sellect Privilege--</option>
                    <option value="adminuser" >adminuser</option>
                    <option value="basicuser" >basicuser</option>                   
                  </select>
                </div>
                
                <div class="mt-3">
                  <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit" value="SIGN UP"/>
                 
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
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



<?php
     include("../partials/AuthPartials/_script.php");
?>