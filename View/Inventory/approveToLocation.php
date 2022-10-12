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
      $data1 = $UserUtils-> getUnApprovedAndNonDecliedProductRequest($conn);
    
?>
<!-- HEADER -->

<style>
/* Style The Dropdown Button */

.table, .th, .td {
    border: 1px solid;
    }
    .table .td {
  border: solid 1px #666 !important;
  width: 110px !important;
  word-wrap: break-word !important;
  font-size: xx-small !important;
}
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
                  <h4 class="font-weight-bold mb-0">Product Approval</h4>
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


          <div class="container-flued">
            <div class="table-responsive">
              <table id="data-table-basic" class="customers">
                <thead>
                  <tr>
                    <th width="10.5%">S/N</th>
                    <th width="10.5%">Request Number</th>
                    <th width="10.5%">Product</th>
                    <th width="10.5%">Location</th>
                    <th width="10.5%">Request Date</th>
                    <th width="10.5%">Quantity</th>
                    <th width="22.5%">Reason</th>
                    <th class="text-center" width="12.5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                      foreach ($data1 as $index => $value) {   
                               
                    ?>
                  <tr>
                    <td><?php echo $index+1 ?></td>
                    <td><?php echo $value["requestId"] ?></td>
                    <td><?php echo $value["productName"] ?></td>
                    <td><?php echo $value["locationName"] ?></td>
                    <td><?php echo date('d/m/y',strtotime($value["requestDate"])) ?></td>
                    <td><?php echo $value["quantity"] ?></td>
                    <td><p><?php echo $value["reason"] ?></p></td>
                    <td>
                    <div>
                      <div class="d-flex justify-content-start align-items-center">
                        <form action="../../Utils/approveProductToLocation.php" method="post">
                            <input  name="reqId" type="hidden" class="form-control" id="exampleInputUsername1" value="<?php echo $value["requestId"] ?>" >
                            <button href="#" class="badge badge-pill badge-success" style="text-decoration: none;border:green 3px;" onClick="viewFunc('<?php echo $value["requestId"] ?>')">Approve</button>              
                        </form>      
                        <button  href="#" class="badge badge-pill badge-danger" style="text-decoration: none;border:red 3px;" data-bs-toggle="modal" data-bs-target="#declineModal" onClick="decline('<?php echo $value["requestId"] ?>')">Decline</button>                    
                      </div>                               
                    </div>
                    </td>
                  </tr> 
                  <?php
                      }
                    ?>                        
                </tbody>                    
              </table>
            </div>
          </div>
          <br/>
            
          <br/>
   

            <!-- Modal -->
            <div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content ">
                    <div class="modal-header gbgn">
                    </div>
                    <div class="modal-body gbgn">
                        Are you sure you want to decline request <span class="num"></span> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        <form action="../../Utils/declineToLocation.php" method="post">
                        <input name="reqId" type="hidden" class="form-control dec" id="exampleInputUsername1" >
                        <button type="submit" name="decline" class="btn btn-danger text-white" data-bs-dismiss="modal" onclick="loading93(this)">Ok</button>
                        </form>
                        <script>
                            function loading93(btn) {                             
                                var child = btn.lastElementChild; 
                                while (child) {
                                    btn.removeChild(child);
                                    child = btn.lastElementChild;
                                }
                    
                                btn.innerText = "Declining ..."
                                let newSpan = document.createElement("span");
                                newSpan.classList.add("spinner-border")
                                newSpan.classList.add("spinner-border-sm")
                    
                                btn.appendChild(newSpan);
                                
                            }  
                            
                            </script>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header gbgn">
                    <h5 class="modal-title" id="exampleModalLabel">User Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body gbgn">
                    <div class="row">
                      <div class="col-12 grid-margin ">
                        <div class="" >
                          <div class="">
                            <div class="container">
                              <!-- body -->

                                <div class="container-flued">
                                    <!-- <div class="container"> -->
                                 
                                    <!-- body -->
                                  <div class="table-responsive pt-3">
                                    <table class="table">
                                              <tbody>
                                              
                                              <!-- head -->
                                              <tr>
                                                  <td class="td" rowspan="2" colspan="5">
                                                  <div class="row">
                                                    
                                                      <div class="col-12">
                                                      <h5 style="color:#02679a;font-size:25px">Comparative Table</h5>
                                                      <div>
                                                  </div>
                                                  </td>                      
                                                                        
                                              </tr>
                                              <tr>                    
                                              
                                              </tr>
                                              <!--End head -->
                                              
                                              <tr>
                                                  <td class="td" colspan="3">
                                                  <div class="row">
                                                      <div class="col-3"><span style="color: #02679a;">Request Id: </span>&nbsp;&nbsp;&nbsp; <span class="reqid"> </span></div>
                                                    
                                                  </div>                                      
                                                  </td>
                                                  <td class="td" colspan="2">
                                                  <div class="row">
                                                      <div class="col-3"><span style="color: #02679a;"> Request Name: </span>&nbsp;&nbsp;&nbsp; <span class="for"> </span></div>
                                                
                                                  </div>  
                                                  </td>
                                              </tr>
                                                        
                                              </tbody>
                                          </table>
                                          <div class="table-responsive pt-3">
                                            <table class="table" id="customers" >
                                                <tr>
                                                    <th class="text-center th"  ><span style="color: #02679a;"> Items Details</span></th>
                                                    <th class="text-center th"  ><span style="color: #02679a;">Vendors Involve</span></th>
                                                    <th class="text-center th"  ><span style="color: #02679a;">Cheapest Option</span></th>
                                                  
                                                </tr>
                                                <tr>
                                                    <td class="td">
                                                        <table class="table">
                                                            <tr>
                                                                <th class="td">Item Name</th>
                                                                <th class="td">Desc</th>
                                                                <th class="td">Qty</th>
                                                                <th class="td">UM</th>
                                                            </tr>
                                                            <tbody class="itbod">
                                                          

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="td">
                                                        <table class="table">
                                                          <thead class="hed">
                                                        
                                                          </thead>
                                                          <tbody class="bod">
                                                          
                                                          </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="td">
                                                        <table class="table">
                                                            <tr>
                                                                <th class="td">Unit Price</th>
                                                                <th class="td">Total</th>
                                                                <th class="td">Vendor</th>
                                                            </tr>
                                                            <tbody class="chipbody">
                                                          
                                                            </tbody>
                                                            
                                                        </table>
                                                    </td>
                                                </tr>
                                            
                                            </table>
                                  </div>
                                </div>
                                </div>
                              <!-- body -->
                             
                              <br>
                              <br>
                              <hr>
                              <div class="row">
                                <div class="col-4 sups text-center" style="line-height: 9px;font-size: xx-small;">
                                    
                                </div>
                                
                                <div class="col-4">
                                    <form action="../../Controller/cApproveController.php" method="post">
                                      <input name="preqNo" type="hidden" class="form-control prno" id="exampleInputUsername1">
                                      <input name="date" type="hidden" class="form-control prno" id="exampleInputUsername1"  value="<?php echo date('Y-m-d');?>">
                                      <div class="row">
                                          <div class="col-12">
                                            <div class="form-group">
                                              <label for="exampleFormControlSelect1">Approve Or Decline</label>
                                              <select required  name="approval" class="form-control form-control" id="exampleFormControlSelect1">
                                                <option value="">__Sellect__</option>
                                                <option value="approve">Approve</option>
                                                <option value="decline">Decline</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-12">
                                            <div class="form-group">
                                              <label for="exampleTextarea1">Remark (optional)</label>
                                              <textarea required name="remark" class="form-control summ" id="exampleTextarea1" rows="2"></textarea>
                                            </div> 
                                          </div>
                                      </div>
                                      <button name="man" type="submit" class="btn  btn-icon-text btn-block  text-white" style="background-color: #02679a;" onClick="approving(this)">
                                        <i class="ti-check-box btn-icon-append"></i>                          
                                        Approve
                                      </button> 
                                    </form>
                                </div>
                                <div class="col-4 mnds" style="line-height: 9px;font-size: xx-small;">
                                    <p class="text-warning">Pending</p>
                                    <p class="text-warning">Managing Director</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br/>
          <!-- Data Table area End-->
             
                  

         <!-- <div class="container"> -->
      
         <?php
                  if (isset($_REQUEST['fail'])){          
                                   
            ?>

         <!--BODY -->
         <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 14">
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
         <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 14">
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
      
          
        <!-- </div> -->
        </div>
        <?php include("../partials/_footer.php"); ?>
        <!-- </div> -->
        </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- FOOTER -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div> <!-- end of side nav -->
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
 function decline(reqId){
    let dec = document.querySelector(".dec"); 
    let num = document.querySelector(".num"); 

    let child = num.lastElementChild; 
    while (child) {
    bb.removeChild(child);
        child = bb.lastElementChild;
    }

    dec.value = reqId;
    num.innerHTML = reqId;
  }

 function deleteId1(par){
    let myid = document.querySelector(".delid1"); 
    // console.log(par)
    myid.value = par
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