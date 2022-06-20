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
      $data1 = $UserUtils-> getAllManUnApproveF();
    
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
                  <h4 class="font-weight-bold mb-0">View/ Modify/ Delete New Personnel Record</h4>
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
                    <th>PRNO</th>
                    <th>Requisitioner</th>
                    <th>For</th>
                    <th>Date Created</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
             
                      foreach ($data1 as $index => $value) {           
                    ?>
                  <tr>
                    <td><?php echo $index+1 ?></td>
                    <td><?php echo $value["fregno"] ?></td>
                    <td><?php echo $value["from"] ?></td>
                    <td><?php echo $value["subject"] ?></td>
                    <td><?php echo $value["datecreated"] ?></td>
                    <td>
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                        <button href="#" class="badge badge-pill badge-success" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value["fregno"] ?>')">Approve/Decline</button>                    
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
                              <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                <tbody>
                                  
                                  <!-- head -->
                                  <tr>
                                    <td rowspan="2" colspan="2">
                                      <div class="row">
                                        <div class="col-md-6">
                                          <img src="../../Upload/logo.jpeg"/ style="width:200px">
                                        </div>
                                        <div class="col-md-6">
                                          <h5 style="color: #02679a;">Purchase Requisition</h5>
                                        <div>
                                      </div>
                                    </td>                      
                                    <td colspan="3">
                                      <div class="row">
                                        
                                        <div class="col-3"><span style="color: #02679a;"> P-REGNO:</span></div>
                                        <div class="col-9"><p class="reqno"> </p></div>
                                      </div>                                
                                    </td>                        
                                  </tr>
                                  <tr>                    
                                    <td colspan="3">
                                      <div class="row">
                                        <div class="col-3"><span style="color: #02679a;"> DATE:  </span></div>
                                        <div class="col-9"><p class="dprep"></p></div>
                                      </div>                                        
                                    </td>
                                  </tr>
                                  <!--End head -->
                                  <tr>
                                    <td colspan="2">
                                      <div class="row">
                                        <div class="col-2"><span style="color: #02679a;"> For:  </span></div>
                                        <div class="col-10"><p class="frrr"></p></div>
                                      </div>                                      
                                    </td>
                                    <td colspan="3">
                                      <div class="row">
                                        <div class="col-2"><span style="color: #02679a;">TO:  </span></div>
                                        <div class="col-10"><p class="to"></p></div>
                                      </div>                                      
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">
                                      <div class="row">
                                        <div class="col-3"><span style="color: #02679a;"> REQUISITIONER:  </span></div>
                                        <div class="col-9"><p class="reqner"></p></div>
                                      </div>  
                                    </td>
                                                             
                                      <td colspan="2">
                                        <div class="row">
                                          <div class="col-3"><span style="color: #02679a;"> AMOUNT:  </span></div>
                                          <div class="col-9"><p class="amm"></p></div>
                                        </div>  
                                      </td>
                                  </tr>
                                  <tr>
                                      <td colspan="2">
                                        <div class="row">
                                          <div class="col-3"><span style="color: #02679a;"> AMOUNT WORD:  </span></div>
                                          <div class="col-9"><p class="ammw"></p></div>
                                        </div>  
                                      </td>
                                      <td colspan="3">
                                        <div class="row">
                                          <div class="col-4"><span style="color: #02679a;">JUSTIFICATION:  </span></div>
                                          <div class="col-8"><p class="jus"></p></div>
                                        </div>  
                                      </td>                                  
                                  </tr>
                               
                                
                                </tbody>
                                </table>
                               
                              </div>
                              <br>
                              <br>
                              <hr>
                              <div class="row">
                                <div class="col-4 sups">
                                                                                     
                                </div>
                                
                                  <div class="col-4">
                                    <form action="../../Controller/fApprovalController.php" method="post">
                                      <input name="freqNo" type="hidden" class="form-control frno" id="exampleInputUsername1">
                                     
                                      <div class="row">
                                          <div class="col-12">
                                            <div class="form-group">
                                              <label for="exampleFormControlSelect1">Approve Or Decline</label>
                                              <select name="approval" class="form-control form-control" id="exampleFormControlSelect1">
                                                <option value="">__Sellect__</option>
                                                <option value="approve">Approve</option>
                                                <option value="decline">Decline</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-12">
                                            <div class="form-group">
                                              <label for="exampleTextarea1">Remark (optional)</label>
                                              <textarea name="remark" class="form-control summ" id="exampleTextarea1" rows="2"></textarea>
                                            </div> 
                                          </div>
                                      </div>
                                      <button name="man" type="submit" class="btn  btn-icon-text btn-block  text-white" style="background-color: #02679a;" onClick="approving(this)">
                                        <i class="ti-check-box btn-icon-append"></i>                          
                                        Approve
                                      </button> 
                                    </form>
                                  </div>
                                  <div class="col-4 mnds">
                                  
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




 function viewFunc(tag){
  let reqno = document.querySelector(".reqno"); 
  let ureqno = document.querySelector(".frno"); 
    let subj = document.querySelector(".frrr"); 
    let from = document.querySelector(".reqner"); 
    let dateprep = document.querySelector(".dprep"); 
    // let summ = document.querySelector(".summ");  
    // let tbodyy = document.querySelector("#tbb"); 
    let manStatus = document.querySelector(".mns"); 
    let manDStatus = document.querySelector(".mnds"); 
    let supStatus = document.querySelector(".sups"); 
    let amount = document.querySelector(".amm"); 
    let amountword = document.querySelector(".ammw"); 
    let justification = document.querySelector(".jus"); 
    let to = document.querySelector(".to"); 
 

    let mydata = JSON.stringify({ "fRegNo":tag })
    fetch("../../Utils/getSingleFundRegUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
        console.log(data)
        reqno.innerText = data.fregno
        ureqno.value = data.fregno
        dateprep.innerText = data.datecreated
        subj.innerText = data.subject
        from.innerText = data.from
        // summ.innerText = data.summary
        amount.innerText = data.ammount
        amountword.innerText = data.ammountword
        justification.innerText = data.justification
        to.innerText = data.to

     

    

      let mandstat = ()=>{
        let child = manDStatus.lastElementChild; 
        while (child) {
          manDStatus.removeChild(child);
            child = manDStatus.lastElementChild;
        }
        if (data.mandsatus == "Pending") {
          manDStatus.innerHTML = `<p class="text-warning">Pending</p>` 
        } else if(data.mandsatus == "decline") {
          manDStatus.innerHTML = `<p style="color: #02679a;">Decline</p>`         
        }else{
          if (data.mandsig) {
            manDStatus.innerHTML = `<img src="../${data.mandsig}" width="100px"/>` 
          } else {
            manDStatus.innerHTML = `<p class="text-success">Approve</p>`   
          }
        }
      }

      let supstat = ()=>{
        let child = supStatus.lastElementChild; 
        while (child) {
          supStatus.removeChild(child);
            child = supStatus.lastElementChild;
        }
        if (data.supstatus == "Pending") {
          supStatus.innerHTML = `<p class="text-warning">Pending</p>` 
        } else if(data.supstatus == "decline") {
          supStatus.innerHTML = `<p style="color: #02679a;">Decline</p>`         
        }else{
          if (data.supsig) {
            supStatus.innerHTML = `<img src="../${data.supsig}" width="100px"/>`          
          } else {
            supStatus.innerHTML = `<p class="text-success">Approve</p>` 
          }
        }
      }
  
     
      mandstat()
      supstat()
  
     
     
    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)
     
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