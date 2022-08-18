<?php
   session_start();
   if(isset($_SESSION['validuser']))
   {
     include("../partials/_header.php");
     $title = "Home";
     $nav = "";
     require("../../Controller/generalController.php");
     include("../../Utils/sidebarUtils.php");
     include("../../Env/env.php");
     require("../../Connection/dbConnection.php");
   
    
     $conn = conString1();
    $UserUtils = new GeneralController();
    $order =  $UserUtils->getCompletedOrderById($conn);
    // print_r($order);
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
                  <h4 class="font-weight-bold mb-0">Completed Order Bill/Receipt</h4>
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
                <!-- body -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="20%">Order Id</th>
                                <th class="text-center" width="30%">Order Description</th>
                                <th class="text-center" width="25%">Status</th>
                                <th class="text-left" width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                      
                           if (count($order) < 1) {             
                        ?>
                        <tr>
                        <th colspan="4" class="text-center">No Completed Order</th>
                        </tr>
                          <?php
                           }else{
                           
                              foreach ($order as $index => $value) { 
                                // print_r($value);
                          ?>
                              <tr>
                                <td class="text-center"><?php echo $value['orderid'] ?></td>
                                <td class="text-center">
                                  <div class="row">
                                  <?php
                                  $data =  $UserUtils->getAllOrderItems($conn,$value['orderid']);
                                 
                                      foreach ($data as $index => $value2) { 
                                        $min = $value['min']+$value['totaltime'];
                                        // echo $min;
                                  ?>
                                    <div class="col-12">
                                      <p class="font-weight-bold mb-0"><?php echo $value2["description"]." of ". $value2['productname'] ?></p>
                                    </div>
                                  <?php
                                    }
                                  ?>
                                  </div>
                                </td>
                                <td class="text-center"><label class='badge badge-success'>Completed</label></td>
                                  <td class="text-left ">
                                  <?php
                                    if ($value['bill'] == 0) {                                                                   
                                  ?>
               
                                    <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Print Bill">
                                        <i class="ti-ticket btn-icon-append dropbtn text-secondary" data-bs-toggle="modal11" data-bs-target="#receptModal" onClick="bill('<?php echo $value["orderid"] ?>','<?php echo $value['sellerid']?>')"style="font-size:28px"></i>
                                    </span>  
                                    <?php                                
                                    }else{
                                  ?>                             
                                    <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Print Receipt">
                                        <i class="ti-receipt btn-icon-append dropbtn text-secondary" data-bs-toggle="modal" data-bs-target="#receptModal" onClick="receipt('<?php echo $value["orderid"] ?>','<?php echo $value['sellerid']?>')"style="font-size:28px"></i>
                                    </span> 
                                    <?php                                 
                                    }
                                  ?> 
                                </td>
                              </tr>
                              <?php
                              }
                              }
                                ?>
                            

                        </tbody>
                    </table>
                </div>
                <!-- body -->
                
                </div>
              </div>
            </div>
         </div>
        
              <!-- //model -->
              <div class="modal fade" id="receptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content ">
                      <div class="modal-header gbgn">
                      </div>
                      <div class="modal-body gbgn">
                        <div class="form-group ">
                          <label for="exampleFormControlSelect1">Payment Method</label>
                          <select   class="form-control form-control payM" id="exampleFormControlSelect1">
                            <option selected>__Select__</option>                         
                            <option value="Cash">Cash</option>                         
                            <option value="POS">POS</option>                         
                            <option value="Transfer">Bank Transfer</option>                         
                          </select>
                        </div> 
                      </div>
                      <div class="modal-footer">
                        <input name="orderid" type="hidden" class="form-control orno" id="exampleInputUsername1">
                        <input name="sid" type="hidden" class="form-control sidd" id="exampleInputUsername1">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        <button type="submit" name="delete" class="btn" data-bs-dismiss="modal" style="background:#02679a;color:white;" onclick="printReceipt()">Print Receipt</button>    
                      </div>
                  </div>
              </div>
            </div>
                            <!-- //model -->
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
   

    function checkItem(orid,input){
       
        if (input.checked){
            let mydata = JSON.stringify({"orderId":orid,"prepAt":"Kitchen"})
            fetch("../../Utils/checkItemUtils.php", {
            method: 'POST',
            body: mydata,
            headers: {"Content-Type": "application/json; charset=utf-8"}
            }).then(res=>res.text()).then(function(data){
                console.log(data)
                // if (data.status =='success') {
                //   console.log("Done")                 
                // }else{
                //   window.location = window.location.origin+"/Rampp/View/Ordering/bar.php?fail=Warning:"+data.msg;
                // }
            })
           
        }else{
            let mydata = JSON.stringify({"orderId":orid,"prepAt":"Kitchen"})
            fetch("../../Utils/uncheckItemUtils.php", {
            method: 'POST',
            body: mydata,
            headers: {"Content-Type": "application/json; charset=utf-8"}
            }).then(res=>res.text()).then(function(data){
              console.log(data)
                // if (data.status = "success") {
                //     console.log("Done")                   
                // }else{
                //   window.location = window.location.origin+"/Rampp/View/Ordering/bar.php?fail=Warning:"+data.msg;
                // }
            })         
      }
    }
    function receipt(it,sid){
    let orno = document.querySelector(".orno"); 
    let sidd = document.querySelector(".sidd"); 
    orno.value = it;
    sidd.value = sid;
    
   }

  function bill(id){
    let payM = document.querySelector(".payM"); 
    let orno = document.querySelector(".orno"); 
    window.open(window.location.origin+"/Rampp/View/bill.php?id="+Number(id), "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=700,width=700,height=700")
   }
  function printReceipt(){
    let payM = document.querySelector(".payM"); 
    let orno = document.querySelector(".orno"); 
    let sidd = document.querySelector(".sidd"); 
    window.open(window.location.origin+"/Rampp/View/receipt.php?id="+Number(orno.value)+"&pay="+payM.value+"&sid="+sidd.value+"", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=700,width=700,height=700")
   }
    setInterval(
        function(){
            window.location.reload();
        }
        , 11000);
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