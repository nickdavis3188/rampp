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
    
      $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
      $conn->connect();

      $UserUtils = new GeneralController();
      $data1 = $UserUtils-> purchasePTableDisplay();
    
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
                  <h4 class="font-weight-bold mb-0">Manage Purchase Requisition</h4>
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
                    <th>S/N</th>
                    <th>ReqNo</th>
                    <th>Requisitioner</th>
                    <th>For</th>
                    <th>Date Created</th>
                    <th>Status</th>           
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      foreach ($data1 as $index => $value) {       
                        $stat = "";
                        if ($value["mandapprove"] == "Pending") {
                          $stat = "<label class='badge badge-warning'>Pending</label>";
                        }elseif($value["mandapprove"] == "approve"){
                            $stat = "<label class='badge badge-success'>Approve</label>";
                        }else{
                          $stat = "<label class='badge badge-danger'>Decline</label>";
                        }
                        $retVal2 = ($value["supapprove"] == "decline" || $value["manapprove"] == "decline") ? "<label class='badge badge-danger'>Decline</label>" :$stat ;    
                    ?>
                  <tr>
                    <td><?php echo $index+1 ?></td>
                    <td><?php echo $value["preqno"] ?></td>
                    <td><?php echo $value["from"] ?></td>
                    <td><?php echo $value["subject"] ?></td>
                    <td><?php echo $value["date"] ?></td>
                    <td><?php echo $retVal2 ?></td>
                    
                    <td>
                    <div class="dropdown ">
                      <div class="d-flex justify-content-between align-items-center">
                      <span data-bs-toggle="tooltip" data-bs-placement="left"  title="View">
                        <i class="ti-menu-alt btn-icon-append dropbtn " style="color:#02679a;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value["preqno"] ?>')"></i>
                      </span>
                      <!-- <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Edit">
                        <i class="ti-pencil-alt btn-icon-append dropbtn" data-bs-toggle="modal" data-bs-target="#editModal" onClick="editFunc('<?php echo $value["preqno"] ?>')"></i>
                      </span> -->
                      <?php 
                        if ($_SESSION['userName'] == $value['reqfrom']) {                
                      ?>
                      <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Delete">
                        <i class="ti-trash btn-icon-append dropbtn text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onClick="deleteId(<?php echo $value["preqno"] ?>)"></i>
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
                    ?>                        
                </tbody>                   
              </table>
            </div>
          </div>
            
          <br/>
   

            <!-- Modal -->

            <!-- Modal -->
            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header gbgn">
                    <h5 class="modal-title" id="exampleModalLabel">P-Requisition Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body gbgn">
                    <div class="row">
                      <div class="col-12 grid-margin ">
                        <div class="" >
                          <div class="">
                            <div class="container">
                              <!-- body -->
                              <div class="row">
                                <div class="col-md-12 grid-margin">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <hp class="font-weight-bold mb-0">.</hp>
                                    </div>
                                    <div>
                                      <button  class="btn btn-primary btn-icon-text btn-rounded prt" style="background:#02679a;color:white;" onClick="printP(this)">
                                          <i class="ti-printer btn-icon-prepend"></i>Print
                                      </button>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              <!-- body -->
                              <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                  <tbody>
                                  
                                    <!-- head -->
                                    <tr>
                                      <td rowspan="2" colspan="2">
                                        <div class="row">
                                          <!-- <div class="col-md-6">
                                            <img src="../../Upload/logo.jpeg" style="width:200px">
                                          </div> -->
                                          <div class="col-12">
                                            <h5 style="color:#02679a;font-size:25px">Purchase Requisition</h5>
                                          <div>
                                        </div>
                                      </td>                      
                                      <td colspan="3">
                                        <div class="row">
                                          
                                          <div class="col-12"><span style="color:#02679a"> PR-NO: </span> &nbsp;&nbsp;&nbsp; <span class="reqno"> </span></div>
                                          <!-- <div class="col-9"></div> -->
                                        </div>                                
                                      </td>                        
                                    </tr>
                                    <tr>                    
                                      <td colspan="3">
                                        <div class="row">
                                          <div class="col-12"><span style="color:#02679a"> DATE: </span>&nbsp;&nbsp;<span class="dprep"></span></div>
                                          <!-- <div class="col-9"></div> -->
                                        </div>                                        
                                      </td>
                                    </tr>
                                    <!--End head -->
                                    <tr>
                                      <td colspan="3">
                                        <div class="row">
                                          <div class="col-2"><span style="color:#02679a"> For: </span>&nbsp;&nbsp;<span class="frrr"></span></div>
                                          <!-- <div class="col-10"><p class="frrr"></p></div> -->
                                        </div>                                      
                                      </td>
                                      <td colspan="2">
                                        <div class="row">
                                          <div class="col-6"><span style="color:#02679a"> REQUISITIONER: </span>&nbsp;&nbsp;<span class="reqner"></span></div>
                                          <!-- <div class="col-6"><p class="reqner"></p></div> -->
                                        </div>  
                                      </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                          <div class="row">
                                            <div class="col-2"><span style="color:#02679a"> SUMMARY: </span>&nbsp;&nbsp;<span class="summ"></span></div>
                                            <!-- <div class="col-10"><p class="summ"></p></div> -->
                                          </div>  
                                        </td>
                                        <!-- <td colspan="3">
                                          <span style="color:#02679a">For: </span><span >Restock</span>
                                        </td> -->
                                    </tr>
                                  
                                  </tbody>
                                </table>
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th  width="5%">
                                        SN
                                      </th>
                                      <th width="25%">
                                        Item Name
                                      </th>
                                      <th width="35%">
                                        Desc
                                      </th>
                                      <th width="5%">
                                        Qty
                                      </th>
                                      <th  width="15%">
                                        Unit Price
                                      </th>
                                      <th  width="15%">
                                        SubTotal
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody id="tbb">                                   
                                  </tbody>
                                  <tr>
                                    <td colspan="4">
                                      
                                    </td>
                                    <td class="text-right">
                                      <span style="color:#02679a"> GRAND TOTAL  </span>
                                    </td>
                                    <td>
                                      <div class="row">
                                          <div class="col-12"> <b><p class="tot"> </p></b></div>
                                      </div>                                 
                                    </td>
                                    
                                  </tr>
                                </table>
                              </div>
                              <br>
                              <br>
                              <hr>
                              <div class="row">
                              <div class="col-4">
                                <div class="sups text-center">
                                    <p class="text-info">Pending</p>

                                </div>
                              
                                   
                            </div>
                            <div class="col-4">
                                <div class="mns text-center">
                                    <p class="text-info">Pending</p>
                                </div>
                                
                               
                            </div>
                            <div class="col-4">
                                <div class="mnds text-center">
                                    <p class="text-info">Pending</p>
                                </div>
                                
                               
                            </div>
                              </div>
                              <hr>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content ">
                  <div class="modal-body gbgn">
                    Are you sure you want to delete this ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                    <form action="../../Controller/purchaseRequsitionDetailsController.php" method="get">
                      <input name="preqNo" type="hidden" class="form-control delid" id="exampleInputUsername1" >
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

function printP(ins){
  let ggd = ins.getAttribute("gg")
  window.open(window.location.origin+"/Rampp/View/prequisitionPrint.html"+ggd, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=700,width=700,height=700")
}


 function viewFunc(tag){
    let reqno = document.querySelector(".reqno"); 
    let subj = document.querySelector(".frrr"); 
    let from = document.querySelector(".reqner"); 
    let dateprep = document.querySelector(".dprep"); 
    let summ = document.querySelector(".summ");  
    let tbodyy = document.querySelector("#tbb"); 
    let total = document.querySelector(".tot");
    let manStatus = document.querySelector(".mns"); 
    let manDStatus = document.querySelector(".mnds"); 
    let supStatus = document.querySelector(".sups"); 
    let prt = document.querySelector(".prt"); 
  
 

    let mydata = JSON.stringify({ "pRegNo":tag })
    fetch("../../Utils/getSinglePurchaseRegUtils.php", {
    method: 'PUT',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
         reqno.innerText = data[0].preqno
        dateprep.innerText = data[0].dateprepared
        subj.innerText = data[0].subject
        from.innerText = data[0].from
        summ.innerText = data[0].summary
        total.innerText = "# "+Number(data[0].total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
        prt.setAttribute("gg","?pRegNo="+data[0].preqno)
      console.log(data)

      if (data[1].length < 1) {
        let list1 = document.createElement("tr");
        let hypertest = `      
            <td colspan="6" class="test-center">NO DATA AVILABLE</td>                   
        `;
        list1.innerHTML = hypertest
        tbodyy.appendChild(list1)
      } else {
        
        let child = tbodyy.lastElementChild; 
        while (child) {
          tbodyy.removeChild(child);
            child = tbodyy.lastElementChild;
        }
        data[1].forEach((element,ind) => {

              let list2 = document.createElement("tr");
              list2.innerHTML = `       
                  <td>${ind+1}</td>
                  <td>${element.itemname}</td>
                  <td>${element.description}</td>
                  <td>${element.qty}</td>   
                  <td># ${ Number(element.unitprice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                      
                  <td># ${Number(element.subtotal).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                    
              `;
              tbodyy.appendChild(list2);
              
          }) 
      }

  

      let manstat = ()=>{
        let child = manStatus.lastElementChild; 
        while (child) {
          manStatus.removeChild(child);
            child = manStatus.lastElementChild;
        }
        if (data[0].manapprove == "Pending") {
          manStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Manager</p>` 
        } else if(data[0].manapprove == "decline") {
          manStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Manager</p><br/><p class="text-danger">${data[0].manremark}</p><br/><p class="text-danger">${data[0].mandate}</p>`         
        }else{
          if (data[0].mansig) {
            manStatus.innerHTML = `<img src="../${data[0].mansig}" width="100px"/><br/><p class="text-success">Manager</p><br/><p class="text-success">${data[0].manremark}</p><br/><p class="text-success">${data[0].mandate}</p>` 
            
          } else {
            manStatus.innerHTML = `<p class="text-success">Approve</p><br/><br/><p class="text-success">Manager</p><p class="text-success">${data[0].manremark}</p><br/><p class="text-success">${data[0].mandate}</p>`
          }
        }
      }
      let mandstat = ()=>{
        let child = manDStatus.lastElementChild; 
        while (child) {
          manDStatus.removeChild(child);
            child = manDStatus.lastElementChild;
        }
        if (data[0].mandapprove == "Pending") {
          manDStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Managing Director</p>` 
        } else if(data[0].mandapprove == "decline") {
          manDStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Managing Director</p><br/><p class="text-danger">${data[0].mandremark }</p><br/><p class="text-danger">${data[0].manddate}</p>`         
        }else{
          if (data[0].mandsig) {
            manDStatus.innerHTML = `<img src="../${data[0].mandsig}" width="100px"/><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[0].mandremark}</p><br/><p class="text-success">${data[0].manddate}</p>` 
          } else {
            manDStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[0].mandremark}</p><br/><p class="text-success">${data[0].manddate}</p>`   
          }
        }
      }

      let supstat = ()=>{
        let child = supStatus.lastElementChild; 
        while (child) {
          supStatus.removeChild(child);
            child = supStatus.lastElementChild;
        }
        if (data[0].supapprove == "Pending") {
          supStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Supervisor</p>` 
        } else if(data[0].supapprove == "decline") {
          supStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Supervisor</p><br/><p class="text-danger">${data[0].supremark}</p><br/><p class="text-danger">${data[0].supdate}</p>`         
        }else{
          if (data[0].supsig) {
            supStatus.innerHTML = `<img src="../${data[0].supsig}" width="100px"/><br/><p class="text-success">Supervisor</p><br/><p class="text-success">${data[0].supremark}</p><br/><p class="text-success">${data[0].supdate}</p>`          
          } else {
            supStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Supervisor</p><br/><p class="text-success">${data[0].supremark}</p><br/><p class="text-success">${data[0].supdate}</p>` 
          }
        }
      }
  
      manstat()
      mandstat()
      supstat()
     


    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)
     
      }
    })
  }

function deleteId(par){
  let myid = document.querySelector(".delid"); 
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