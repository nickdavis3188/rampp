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
      $data1 = $UserUtils-> lpoTableDisplay($conn);
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
                  <h4 class="font-weight-bold mb-0">Manage LPO</h4>
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
                  <th>PRegNo</th>
                  <th>Vendor</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th style="padding-left: 80px;">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
               foreach ($data1 as $index => $value) { 
                $stat = "";
                if ($value["approvemand"] == "Pending") {
                  $stat = "<label class='badge badge-warning'>Pending</label>";
                }elseif($value["approvemand"] == "approve"){
                    $stat = "<label class='badge badge-success'>Approve</label>";
                }else{
                  $stat = "<label class='badge badge-danger'>Decline</label>";
                }
                $retVal2 = ($value["approvesup"] == "decline" || $value["approveman"] == "decline") ? "<label class='badge badge-danger'>Decline</label>" :$stat ;            
            ?>
          <tr>
            <td><?php echo $index + 1 ?></td>
            <td><?php echo $value["purchaseId"] ?></td>
            <td><?php echo $value["venname"] ?></td>
            <td><?php echo date('d/m/y',strtotime($value["lpodate"])) ?></td>
            <td><?php echo $retVal2 ?></td>
            <td>
            <div class="dropdown ">
              <div class="d-flex justify-content-between align-items-center">
              <span data-bs-toggle="tooltip" data-bs-placement="left"  title="View">
                <i class="ti-menu-alt btn-icon-append dropbtn " style="color:#02679a;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value["vendorId"] ?>','<?php echo $value["purchaseId"] ?>')"></i>
              </span>
              <?php if($_SESSION['privilege'] == "Admin")
              {
                ?>
              <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Delete">
                <i class="ti-trash btn-icon-append dropbtn text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onClick="deleteId('<?php echo $value["lpono"] ?>')"></i>
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

 <!-- Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header gbgn">
            <h5 class="modal-title" id="exampleModalLabel">LPO Info</h5>
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
                                    <h5 style="color:#02679a;font-size:25px">Local Purchase Request</h5>
                                    <div>
                                </div>
                                </td>                      
                                <td colspan="3">
                                <div class="row">
                              
                                    <div class="col-3"><span style="color:#02679a"> LPONO:</span>&nbsp;&nbsp;<span class="lreqno"></span></div>
                                    <!-- <div class="col-9"><p class="lreqno"> </p></div> -->
                                </div>                                
                                </td>                        
                            </tr>
                            <tr>                    
                                <td colspan="3">
                                <div class="row">
                                    <div class="col-3"><span style="color:#02679a"> P-RegNo:</span>&nbsp;&nbsp;<span class="preqno"></span></div>
                                    <!-- <div class="col-9"><p class="preqno"></p></div> -->
                                </div>                                        
                                </td>
                            </tr>
                            <!--End head -->
                            <tr>
                                <td colspan="3">
                                <div class="row">
                                    <div class="col-2"><span style="color:#02679a"> To:</span>&nbsp;&nbsp;<span class="to"></span></div>
                                    <!-- <div class="col-10"><p class="to"></p></div> -->
                                </div>                                      
                                </td>
                                <td colspan="2">
                                <div class="row">
                                    <div class="col-3"><span style="color:#02679a">DATE:</span>&nbsp;&nbsp;<span class="ldate"></span></div>
                                    <!-- <div class="col-9"><p class="ldate"></p></div> -->
                                </div>  
                                </td>
                            </tr>
                         
                            
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                SN
                                </th>
                                <th>
                                Item Name
                                </th>
                                <th>
                                Desc
                                </th>
                                <th>
                                Qty
                                </th>
                                <th>
                                Unit Price
                                </th>
                                <th>
                                Total
                                </th>
                            </tr>
                            </thead>
                            <tbody id="tbb">                                   
                            </tbody>
                            <tr>
                                <td colspan="4"></td>                          
                                <td class="text-right">
                                  <span style="color:#02679a">Discount  <span class="dis"></span></span>                              
                                </td>
                                <td>
                                  <b><p class="disc"></p></b>
                                </td>                          
                            
                            </tr>
                            <tr>
                              <td colspan="4"></td> 
                                <td class="text-right">
                                 <span style="color:#02679a">Vat  <span class="vt"></span> </span>                             
                                </td>
                                <td>
                                  <b><p class="vat"></p></b>
                                </td> 
                            
                            </tr>
                            <tr>
                              <td colspan="4"></td> 
                                <td class="text-right">
                                  <span style="color:#02679a"> SUB TOTAL</span>                               
                                </td>
                                <td>
                                 <b><p class="subtot"></p></b> 
                                </td> 
                            </tr>
                            <tr>
                              <td colspan="4"></td> 
                                <td class="text-right">
                                  <span style="color:#02679a"> GRAND TOTAL</span>                               
                                </td>
                                <td>
                                 <b><p class="tot"></p></b> 
                                </td> 
                            </tr>
                            <tr>                          
                              <td  class="text-right">
                                <span style="color:#02679a">Amount In Words </span>                               
                              </td>
                              <td colspan="5">
                                <b><p class="amw"></p></b> 
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
                                    <p class="text-info">Supervisor</p>
                                </div>  
                            </div>
                            <div class="col-4">
                              <div class="mns text-center">
                                <p class="text-info">Pending</p>
                                <p class="text-info">Manager</p>
                              </div>   
                            </div>
                            <div class="col-4">
                              <div class="mnds text-center">
                                <p class="text-info">Pending</p>
                                <p class="text-info">Managing Director</p>
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
                    <form  action="../../Controller/deleteLpoController.php" method="post">
                    <input name="lpono" type="hidden" class="form-control lpo" id="exampleInputUsername1">
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
 function viewFunc(v,p){
    let lponum = document.querySelector(".lreqno"); 
    let prno = document.querySelector(".preqno"); 
    let vendor = document.querySelector(".to"); 
    let date = document.querySelector(".ldate"); 
    let tbodyy = document.querySelector("#tbb");  
    let descount = document.querySelector(".disc"); 
    let vat = document.querySelector(".vat");
    let stotal = document.querySelector(".subtot"); 
    let gtotal = document.querySelector(".tot"); 
    let disc = document.querySelector(".dis"); 
    let vt = document.querySelector(".vt"); 
    let manStatus = document.querySelector(".mns"); 
    let manDStatus = document.querySelector(".mnds"); 
    let supStatus = document.querySelector(".sups"); 
    let print = document.querySelector(".prt"); 
    let amw = document.querySelector(".amw"); 

    const dateFormat = (date)=>{
      var today = new Date(date);
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); 
      var yyyy = today.getFullYear();

      //today = mm + '/' + dd + '/' + yyyy;
        today = dd + '/' + mm + '/' + yyyy;
      return today
    }


    let mydata = JSON.stringify({ "venid":v,"pregno":p})
    fetch("../../Utils/chipitemanduniqvendorUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {

      amw.innerText = data[1][0].mountwords;
        lponum.innerText = data[1][0].lpono;
        prno.innerText = data[1][0].purchaseId;
        vendor.innerText = data[1][0].venname;
        date.innerText = dateFormat(data[1][0].lpodate);
        descount.innerText = "#"+Number(data[1][0].discount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        vat.innerText = "#"+Number(data[1][0].vat).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') 
        stotal.innerText = "#"+Number(data[1][0].subtotal).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') ;
        gtotal.innerText = "#"+Number(data[1][0].grandtotal).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') ;
        disc.innerText = data[1][0].disc+"%";
        vt.innerText = data[1][0].vt+"%";
        print.setAttribute("vid",v);
        print.setAttribute("pid",p);
     
        if (data[0].length < 1) {
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
            data[0].forEach((element,ind) => {

                let list2 = document.createElement("tr");
                list2.innerHTML = `       
                    <td>${ind+1}</td>
                    <td>${element.itemName}</td>
                    <td>${element.itemDescription}</td>
                    <td>${element.itemQuantity}</td>   
                    <td># ${ Number(element.vendorUnitPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                      
                    <td># ${(Number(element.itemQuantity)*Number(element.vendorUnitPrice)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                    
                `;
                tbodyy.appendChild(list2);
                
            }) 
      }
    //   console.log("response",manStatus,manDStatus,supStatus)



    
    let manstat = ()=>{
        let child = manStatus.lastElementChild; 
        while (child) {
            manStatus.removeChild(child);
            child = manStatus.lastElementChild;
        }
        if (data[1][0].approveman == "Pending") {
            manStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Manager</p>` 
        } else if(data[1][0].approveman == "decline") {
            manStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Manager</p><br/><p class="text-danger">${data[1][0].remman}</p><br/><p class="text-danger">${dateFormat(data[1][0].mandate)}</p>`         
        }else{
          if (data[1][0].sigman) {
            manStatus.innerHTML = `<img src="../${data[1][0].sigman}" width="100px"/><br/><p class="text-success">Manager</p><br/><p class="text-success">${data[1][0].remman}</p><br/><p class="text-success">${dateFormat(data[1][0].mandate)}</p>` 
            
          } else {
            manStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Manager</p><br/><p class="text-success">${data[1][0].remman}</p><br/><p class="text-success">${dateFormat(data[1][0].mandate)}</p>`
          }
        }
      }

      let mandstat = ()=>{
        let child = manDStatus.lastElementChild; 
        while (child) {
            manDStatus.removeChild(child);
            child = manDStatus.lastElementChild;
        }
        if (data[1][0].approvemand == "Pending") {
            manDStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Managing Director</p>` 
        } else if(data[1][0].approvemand == "decline") {
            manDStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Managing Director</p><br/><p class="text-danger">${data[1][0].remmand }</p><br/><p class="text-danger">${dateFormat(data[1][0].mandate)}</p>`         
        }else{
          if (data[1][0].sigmand) {
            manDStatus.innerHTML = `<img src="../${data[1][0].sigmand}" width="100px"/><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[1][0].remmand}</p><br/><p class="text-success">${dateFormat(data[1][0].mandate)}</p>` 
          } else {
            manDStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[1][0].remmand}</p><br/><p class="text-success">${dateFormat(data[1][0].mandate)}</p>`   
          }
        }
      }


      let supstat = ()=>{
        let child = supStatus.lastElementChild; 
        while (child) {
            supStatus.removeChild(child);
            child = supStatus.lastElementChild;
        }
        if (data[1][0].approvesup == "Pending") {
            supStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Supervisor</p>` 
        } else if(data[1][0].approvesup == "decline") {
            supStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-success">Supervisor</p><br/><p class="text-danger">${data[1][0].remsup}</p><br/><p class="text-danger">${dateFormat(data[1][0].supdate)}</p>`         
        }else{
          if (data[1][0].sigsup) {
            supStatus.innerHTML = `<img src="../${data[1][0].sigsup}" width="100px"/><br/><p class="text-success">Supervisor</p><br/><p class="text-success">${data[1][0].remsup}</p><br/><p class="text-success">${dateFormat(data[1][0].supdate)}</p>`          
          } else {
            supStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Supervisor</p><br/><p class="text-success">${data[1][0].remsup}</p><br/><p class="text-success">${dateFormat(data[1][0].supdate)}</p>` 
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
    let myid = document.querySelector(".lpo"); 
    myid.value = par
  }

  function printP(it){
     let vno =it.getAttribute("vid"); 
     let pno =it.getAttribute("pid"); 
    window.open(window.location.origin+"/View/printLpo.html?v="+Number(vno)+"&p="+Number(pno), "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=700,width=700,height=700")
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