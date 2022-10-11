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
      $data1 = $UserUtils->getAllOrderedItem($conn);
      // print_r($data1);
      // $data = $UserUtils-> getAllDepartment();
?>
<!-- HEADER -->

<style>
/* Style The Dropdown Button */
.dropbtn {
  /* background-color: #28a745; */
  color:  #28a745;
  padding: 16px;
  font-size: 23px !important;
  border: none;
  cursor: pointer;
  box-shadow: 10px #9d0d5c9e;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
  overflow-y: visible;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  color: #28a745;
}
.ddd{
  display:block;
}
.customers {
  font-family: "Roboto", sans-serif !important;
  font-size:16px !important;
  border-collapse: collapse !important;
  width: 100% !important;


}

.customers td, #customers th {
  border:none !important;
  padding: 8px !important;

}
tbody{
  border-bottom: 1px solid #dee2e6 !important;
  border-top: 1px solid #dee2e6 !important;
}
.customers td{
  font-size:0.875rem !important;
  /* color:#212529 !important; */
  font-family: system-ui;
  border-bottom: 1px solid #dee2e6 !important;
  border-top: 1px solid #dee2e6 !important;
}

.customers tr:nth-child(even){background-color: #f2f2f2 !important;}

.customers tr:hover {background-color: #ddd !important;}

.customers th {
  padding-top: 12px !important;
  padding-bottom: 12px !important;
  text-align: left !important;
  border-top: 0 !important;
  border-bottom-width: 1px !important;
  font-weight: bold !important;
  font-size:13.2px !important;
  background-color: #02679a;
  color: white;
}
i{
  display:inline;
  padding-left:0;
}

.dataTables_wrapper .dataTables_filter input {
    margin-left: 0.5em;
    border: 1px solid #02679a;
}
[name="data-table-basic_length"]{
  border: 1px solid #02679a;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
  border: 1px solid #02679a;
}

</style>

<style>
</style>

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
        <button  type="button" id="back" class="btn btn-icon-text text-white" style="background:#56565830;" onClick="window.history.back()">
          <i class="ti-shift-left-alt btn-icon-append"></i>                          
          Back
        </button>
          <br/>
          <br/>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Manage Order</h4>
                </div>
                <!-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> -->
              </div>
            </div>
          </div>
          
         <!--BODYtable-striped -->
      
    <br/>

 
<!-- <button onclick="playSound('../../sound/start.wav');">start</button>  
<button onclick="playSound('../../sound/remove.wav');">remove</button>  
<button onclick="playSound('../../sound/back.wav');">back</button>   -->

    <div class="container-flued">
      <div class="table-responsive">
        <table id="data-table-basic" class="customers">
          <thead>
              <tr>
                  <th class="text-center">S/N</th>
                  <th class="text-center">Order Number</th>
                  <th class="text-center">Location</th>
                  <th class="text-center">OrderDate</th>
                  <th class="text-center">Orderd At</th>
                  <th>Status</th>
                  <th style="padding-left: 80px;">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
                     
                      
              foreach ($data1 as $index => $value) { 
                if ($value['receipt'] == 0) {                                
                  $retVal2 = "";
                  $deleteBtn = false;
                  if ($value['br'] == 0 && $value['kch']==1) {
                    $retVal2 = ($value["status"] == "1"? "<label class='badge badge-success'>Completed</label>" :"<label class='badge badge-secondary'>Pending</label>") ; 
                    $deleteBtn = ($value["status"] == "1"?true:false);
                  } elseif($value['br'] == 1 && $value['kch'] == 0){
                    $retVal2 = ($value["status"] == "1"? "<label class='badge badge-success'>Completed</label>" :"<label class='badge badge-secondary'>Pending</label>") ; 
                    $deleteBtn = ($value["status"] == "1"?true:false);
                  }else if($value['br'] == 1 && $value['kch'] == 1){
                    if ($value['k'] == 1 && $value['b'] == 1 && $value['status'] == 1) {
                      $retVal2 = "<label class='badge badge-success'>Completed</label>";
                      $deleteBtn = true;
                    }elseif($value['k'] == 1 || $value['b'] == 1 && $value['status'] == 0){
                      
                      $retVal2 = "<label class='badge badge-warning'>Progressing</label>";
                      $deleteBtn = true;
                    }else{
                      $retVal2 = "<label class='badge badge-secondary'>Pending</label>";
                      $deleteBtn = false;
                    }
                  }

            ?>
                <tr>
                  <td class="text-left"><?php echo $index + 1 ?></td>
                  <td class="text-left"><?php echo $value['orderid']; ?></td>
                  <td class="text-left"><?php echo $value['locationName']; ?></td>
                  <td class="text-left"><?php echo date('d/m/Y',strtotime($value["orderdate"])) ?></td>
                  <td class="text-left"><?php echo $value["odertime"]; ?></td>
                  <td><?php echo $retVal2 ?></td>
                  <td>
                  <div class="dropdown ">
                    <div class="d-flex justify-content-between align-items-center">
                    <span data-bs-toggle="tooltip" data-bs-placement="left"  title="View">
                      <i class="ti-menu-alt btn-icon-append dropbtn " style="color:#02679a;" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="listItem(<?php echo $value['orderid']; ?>)"></i>
                    </span>
                  <?php
                    if (!$deleteBtn) {
                  ?>
                    <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Delete">
                      <i class="ti-trash btn-icon-append dropbtn text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onClick="deleteId('<?php echo $value["orderid"] ?>','')"></i>
                    </span>
                    <?php
                    }
                    ?>
                  
                    </div>                               
                  </div>
                  </td>
              </tr> 
        <?php
         }
          }
        ?>           
              
          </tbody>
                       
                  </table>
                </div>
    </div>
          <!-- <div class="row">
				  
				    <div class="col-12 grid-margin stretch-card">
              <div class="card bgn" >
                <div class="card-body">
                  
                 <br/>
                 <br/>
                  
              </div>
            </div>
          </div>				
        </div> -->
    <br/>


<!-- Modal -->
         <a href="../../sound/"></a>
 <!-- Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header gbgn">
            <h5 class="modal-title" id="exampleModalLabel">Orderd Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body gbgn">
            <div class="row">
                <div class="col-12 grid-margin ">
                <div class="" >
                    <div class="">
                    <div class="container">
                        <!-- body -->
                      
                        <!-- body -->
                        <div class="table-responsive pt-3">                   
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Product Category</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Prepared At</th>
                                        <th class="text-center">Status</th>
                                        <!-- <th class="text-left">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody class="ttb">
                            
                                        <span  class="spinner-border spinner-border-sm text-primary" id="spin"></span>                                                      
                            
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <br>
   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        </div>
    </div>

                    <!-- /////////////////////// -->

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content ">
                <div class="modal-header gbgn">
                </div>
                <div class="modal-body gbgn">
                    Are you sure you want to delete this ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                    <form  action="../../Controller/deletlOrderController.php" method="post">
                        <input name="orderid" type="hidden" class="form-control lpo" id="exampleInputUsername1">
                        <input name="date22" hidden type="date" class="form-control" value="<?php echo date('Y-m-d');?>">
                        <button type="submit" name="delete" class="btn btn-danger" data-bs-dismiss="modal" >Delete</button>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
    <br/>
    <!-- Data Table area End-->
             
                  

         
         <!--BODY -->
         <!--BODY2 -->
      
         <!-- <div class="container"> -->
      
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


   

         <!--BODY2 -->
      
          
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
 
   function displayHtml(obj,ele){

        let child = ele.lastElementChild; 
        while (child) {
        ele.removeChild(child);
            child = ele.lastElementChild;
        }

        obj.forEach(function(item,ind) {

                let list = document.createElement("tr");
                list.innerHTML = `     
                        <td class="text-center">${item.productname}</td>
                        <td class="text-center">${item.productcat}</td>
                        <td class="text-center">${item.description}</i></td>
                        <td class="text-center">${item.prepAt}</i></td>
                        <td class="text-center">${item.finish == 1?`<label class='badge badge-success'>Completed</label>`:`<label class='badge badge-warning'>Progressing</label>`}</i></td>
                        `;
                        ele.appendChild(list);
                        
                        // <td> <input ${item.finish != 0?"checked":""} value="${item.sn}"  type="checkbox" onChange="checkItem(${item.orderid},this)"></td>  

        })
    }

    function listItem(orId,className,spinName){
        let body = document.querySelector(".ttb"); 
        let spin = document.querySelector("#spin"); 

        let mydata = JSON.stringify({ "productId":orId })
        fetch("../../Utils/orderdItemsUtils.php", {
        method: 'POST',  
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data){
            // console.log(data)
            if (data.status == "success") {
                spin.classList.add("d-none");
                displayHtml(data.data,body)
            }
        })
    }

  function deleteId(par){
    let myid = document.querySelector(".lpo"); 
    myid.value = par
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
     
      if(data.message.ff == 1){
        if(data.message.c == 0){
          playSound("../../sound/start.wav")
           setInterval(
              function(){
                  window.location.reload();
              }
              , 2000);
        }else if(data.message.c == 1){
          playSound("../../sound/back.wav");

          // let mydata = JSON.stringify({ "orderId":data.ord })
          // fetch("../../Utils/updateCompleteOrderCountUtils.php",{
          // method: 'POST',
          // body: mydata,
          // headers: {"Content-Type": "application/json; charset=utf-8"}
          // }).then(res=>res.json()).then(function(data){
          //     console.log(data)
          //     if (data.status) {
                setInterval(
                  function(){
                      window.location.reload();
                  }
               , 2000);
          //     } else {
          //       // console.log(data)
          //     }
          // });

      
        }else{
          playSound("../../sound/select.wav");
          setInterval(
                function(){
                    window.location.reload();
                }
              , 2000);  
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