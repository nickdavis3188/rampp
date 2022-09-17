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
     $data = $UserUtils-> getSingleAudit($conn);
      
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
                  <h4 class="font-weight-bold mb-0">Audit Report</h4>
                </div>
                <!-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> -->
              </div>
            </div>
          </div>
          
         <!--BODY --->
         <div class="row">
            <div class="col-12 grid-margin ">
              <div class="" >
                <div class="row">                
                    </div>
              </div>
            </div>
             <!-- main -->
            <div class="col-12 grid-margin off" >
             
              <div class="row">
                <?php
                //  print_r($data);
                  if (count($data) == 0) {
                ?>
                      
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <p class="mms">Audit Not Generated</p> 
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      
                <?php
                 
                  }else{
                   
                ?>

                  <div class="col-12 grid-margin ">                    
                    <div class="container"> 

                        <div class="bod1">
                        <samp><i style="color:#02679a;">Total Expenses</i> &nbsp; 
                          <p class="dt">Capital Expenditure:&nbsp; <b><?php echo "#".number_format($data[0]['expensesCapital'],2,'.',',')  ?></b></p>
                          <p class="dt">Recurrent Expenditure:&nbsp; <b><?php echo "#".number_format($data[0]['expensesRecurrent'],2,'.',',')  ?></b></p>
                          <p class="dt">Reinvestment:&nbsp; <b><?php echo "#".number_format($data[0]['expensesReinvestment'],2,'.',',')  ?></b></p>
                      </samp>
                      <hr>
                      <samp><i style="color:#02679a;">Total Stock Value</i> &nbsp;
                          <p class="dt">Stock cost value:&nbsp; <b><?php echo "#".number_format($data[0]['stockCostValue'],2,'.',',' ) ?></b></p>
                          <p class="dt">Stock selling value:&nbsp; <b><?php echo "#".number_format($data[0]['stockSellingValue'],2,'.',',' )  ?></b></p>
                          <p class="dt">Stock profit:&nbsp; <b><?php echo "#".number_format($data[0]['stockProfit'],2,'.',',' )  ?></b></p>
                      </samp>
                      <hr>
                      <samp><i style="color:#02679a;">Total Sales</i> &nbsp;
                          <p class="dt">Bar Items:&nbsp; <b><?php echo "#".number_format($data[0]['totalBar'],2,'.',',' )  ?></b></p>
                          <p class="dt">Kitchen Items</b><?php echo "#".number_format($data[0]['totalKitchen'],2,'.',',' )  ?></p>
                      </samp>
                      <hr>
                      <samp><i style="color:#02679a;">Total Lost:</i> &nbsp;
                          <b><p class="dt"><?php echo "#".number_format($data[0]['lost'],2,'.',',' ) ?></p></b>
                      </samp>
                      <hr>
                      <samp><i style="color:#02679a;">Total Profit:</i> &nbsp;
                          <b><p class="dt"></p><?php echo "#".number_format($data[0]['salesProfit'],2,'.',',' ) ?></b>
                      </samp>
                      <hr>
                        </div>
                    </div>                      
                  </div>
                <?php
                  }
                ?>
                    </div>
          
            </div>
             <!-- main -->
            <!-- customize -->
        
             <!-- customize -->
         </div>

         <!--BODY -->
          <!-- models -->
               
         <?php
                  if (isset($_REQUEST['fail'])){          
                                   
            ?>

         <!--BODY -->
         <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="fail" class="toast hide align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"       aria-atomic="true">
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

 

 function addItem() {
  let dtf = document.querySelector(".dtf"); 
  let dtt = document.querySelector(".dtt"); 
  let tbodyy = document.querySelector(".bod1"); 
  let proft = document.querySelector(".proft"); 
  let amu = document.querySelector(".amu"); 
  let mms = document.querySelector(".mms"); 
  let alt = document.querySelector(".alt"); 
  
  let yy = new Date().getFullYear();
  let mm = new Date().getMonth() + 1;
       let mydata = JSON.stringify({ "mm":mm,"yy":yy})
       fetch("../../Utils/getCustomAuditUtils.php",{
           method: 'POST',
           body: mydata,
           headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {
            console.log(data)
          if (data.msg.length == 0) {
            alt.classList.add("show")
            mms.innerHTML = "Audit Not Generated"
          } else {
   
            let itemDisplayed = `
            <samp><i style="color:#02679a;">Total Expenses</i> &nbsp; 
                <p class="dt">Capital Expenditure:&nbsp; <b>${"#"+Number(data.msg[0].expensesCapital).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Recurrent Expenditure:&nbsp; <b>${"#"+Number(data.msg[0].expensesRecurrent).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Reinvestment:&nbsp; <b>${"#"+Number(data.msg[0].expensesReinvestment).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Stock Value</i> &nbsp;
                <p class="dt">Stock cost value:&nbsp; <b>${"#"+Number(data.msg[0].stockCostValue).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Stock selling value:&nbsp; <b>${"#"+Number(data.msg[0].stockSellingValue).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Stock profit:&nbsp; <b>${"#"+Number(data.msg[0].stockProfit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Sales</i> &nbsp;
                <p class="dt">Bar Items:&nbsp; <b>${"#"+Number(data.msg[0].totalBar).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Kitchen Items:&nbsp; <b>${"#"+Number(data.msg[0].totalKitchen).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Lost:</i> &nbsp;
                <b><p class="dt">${"#"+Number(data.data.lost).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</p></b>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Profit:</i> &nbsp;
                <b><p class="dt">${"#"+Number(data.msg[0].salesProfit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</p></b>
            </samp>
            <hr>
            `
            tbodyy.innerHTML = itemDisplayed;
            
          }
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