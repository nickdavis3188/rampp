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
     $data = $UserUtils-> getAllCategory($conn);
     $data2 = $UserUtils-> getAlloderingMeasurment($conn);
     $data3 = $UserUtils-> getApprovepReqForTheMonth($conn,date('m'));
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
                  <h4 class="font-weight-bold mb-0">ADD EXPENSES</h4>
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
         <div class="col-12 grid-margin ">
              <div class="" >
                <div class="">
                  <!-- <h4 class="card-title">New Product form</h4> -->
                
                  <form class="forms-sample" action="../../Controller/expensesController.php" method="post">
                      <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Date</label>
                                <input name="date" type="date" class="form-control" id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>">
                            </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Expenses No</label>
                                <input name="expNo" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $UserUtils->getExpNo($conn); ?>" readonly>
                            </div>    
                        </div>
                                         
                    </div>
       
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Staff ID</label>
                                <input name="staffId" type="number" class="form-control" id="exampleInputUsername1" value="<?php echo $_SESSION['id'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Purchaser</label>
                                <input name="purch" type="text" class="form-control" id="exampleInputUsername1" >
                            </div>
                        </div>                  
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Expenses Type</label>
                            <select name="expTy"  class="form-control form-control" id="exampleFormControlSelect1">
                              <option selected >__select__</option>
                              <option value="reinvestment">Reinvestment</option>
                              <option value="recurrent">Recurrent</option>
                              <option value="capital">Capital</option>
                            </select>
                          </div>    
                        </div> 
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Item Bought</label>
                            <select name="itemB"  class="form-control form-control ib" id="exampleFormControlSelect1" onchange="itemBought(this)">
                              <?php
                                 foreach ($items3 as $index => $value1) {                              
                              ?>
                                 <option value="<?php echo $value1["preqno"] ?>"><?php echo $value1["subject"] ?></option>
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
                                <label for="exampleInputUsername1">Description</label>
                                <input name="desc" type="text" class="form-control ds" id="exampleInputUsername1" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Amount</label>
                                <input name="amount" type="number" class="form-control" id="exampleInputUsername1" >
                            </div>
                        </div>                  
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Justification</label>
                                <textarea name="just" class="form-control" id="exampleInputUsername1" rows="4"></textarea>
                               
                            </div>
                        </div>                 
                    </div>
                  

                  
                    <!-- /////////////////////// -->

       
                    <button name="expenses" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="loading(this)">Submit</button>
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

  function saleable(inp){
    if (inp.checked) {
      // console.log("Yes")
      // console.log(inp.checked)
      let saleableOption = document.querySelectorAll(".dd"); 
      saleableOption.forEach((v)=>v.classList.remove("d-none"))
      console.log(saleableOption)
      // saleableOption.classList.remove("d-none")
    }else{
      // console.log("No")
      let saleableOption = document.querySelectorAll(".dd"); 
      saleableOption.forEach((b)=>b.classList.add("d-none"))
      console.log(saleableOption)
      // saleableOption.classList.add("d-none")
    }
  }
  function itemBought(inp){
    let ds = document.querySelector(".ds"); 

    let mydata = JSON.stringify({ "pRegNo":inp.value })
    fetch("../../Utils/getSinglePurchaseRegUtils.php", {
    method: 'PUT',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
        // reqno.innerText = data[0].preqno
        ds.value = data[0].summary
    })
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