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
    $order =  $UserUtils->getAllKitchenOrder($conn);
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
                  <h4 class="font-weight-bold mb-0">Kitchen Order</h4>
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
                                <th class="text-center" width="20%">Order Number</th>
                                <th class="text-center" width="30%">Order Description</th>
                                <th class="text-center" width="25%">Order Time</th>
                                <th class="text-center" width="25%">Due Time</th>
                                <th class="text-left" width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $data22 =  $UserUtils->check_in_array($order, function($i){ 
                          $ans = array();
                          foreach ($i as $index => $v) { 
                              if ($v['k'] == 0) {
                                  $ans[] = $v;
                              }
                          }
                          return (count($ans) == 0?array():$ans);            
                          });
                           if (count($data22) < 1) {             
                        ?>
                        <tr>
                        <th colspan="4" class="text-center">No Kitchen Order</th>
                        </tr>
                          <?php
                           }else{
                           
                              foreach ($data22 as $index => $value) { 
                          ?>
                              <tr>
                                <td class="text-center"><?php echo $value['orderid'] ?></td>
                                <td class="text-center">
                                  <div class="row">
                                  <?php
                                  $data =  $UserUtils->getAllOrderItems($conn,$value['orderid']);
                                  $data2 =  $UserUtils->check_in_array($data, function($i){ 
                                    $ans = array();
                                    foreach ($i as $index => $v) { 
                                        if ($v['prepAt'] == "Kitchen") {
                                            $ans[] = $v;
                                        }
                                    }
                                    return (count($ans) == 0?array():$ans);            
                                    });
                                      foreach ($data2 as $index => $value2) { 
                                        $min = $value['min']+$value['kt'];
                                        // echo $min;
                                  ?>
                                    <div class="col-12">
                                    <p class="font-weight-bold mb-0"><?php echo $value2["quantity"]."".$value2["unitOfMeasure"]." of ". $value2['productname'] ?></p>
                                    </div>
                                  <?php
                                    }
                                  ?>
                                  </div>
                                </td>
                                <td class="text-center"><?php echo $value['odertime']?> &nbsp;&nbsp; <?php echo "".$value['hr'].":".$min." ".$value['ampm']?> </td>
                                <?php
                                $h = date("h")+1;
                                $m = date("i");
                                $s = date("s");
                                $ts = "$h:$m";
                                $hr = $value['hr'];
                                $ot = "$hr:$min";
                                $dd = date("h:i",strtotime($ts));
                                $ee = date("h:i",strtotime($ot));
 
                                  if ($dd > $ee){
                                 
                                ?>
                                 <td class="text-center"><label class='badge badge-danger rounded-circle text-danger'>.</label> </td>
                                <?php
                                 
                                }else{
                                  
                                  ?>
                                  <td class="text-center"><label class='badge badge-success rounded-circle text-success'>.</label> </td>
                                <?php
        
                                }
                              ?>
                                  <td class="text-left "><input class="text-primary" value="1"  type="checkbox" onChange="checkItem(<?php echo $value['orderid'] ?>,this)"></td>
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
                //   window.location = window.location.origin+"/rampp/View/Ordering/bar.php?fail=Warning:"+data.msg;
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
                //   window.location = window.location.origin+"/rampp/View/Ordering/bar.php?fail=Warning:"+data.msg;
                // }
            })         
      }
    }

    
</script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>
    function playSound(url) {
      const audio = new Audio(url);
      audio.play();
    }
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('6635d1fe09ee5548385f', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
     
      if(data.message.ff == 0){
        if(data.message.kk == 1){
          playSound("../../sound/select.wav")
          setInterval(
            function(){
              window.location.reload();
            }
          , 11000);
          }
      }
    });
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