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
      $data1 = $UserUtils-> expensesTableDisplay($conn);
    
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
                  <h4 class="font-weight-bold mb-0">Manage Expenses</h4>
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
                    <th>ExpensesNo</th>
                    <th>Expenses Type</th>
                    <th>Date Created</th>
                    <th>Staff Id</th>                
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                     
                <?php           
                      foreach ($data1 as $index => $value) {  
                     
                      ?>
                  <tr>
                    <td><?php echo $index+1 ?></td>
                    <td><?php echo $value["expensesNo"] ?></td>
                    <td><?php echo $value["expensesType"] ?></td>
                    <td><?php echo date('d/m/y',strtotime($value["date"])) ?></td>
                    <td><?php echo $value["staffId"] ?></td>                
                    <td>

                    <div class="dropdown ">
                      <div class="d-flex justify-content-between align-items-center">
                      <span data-bs-toggle="tooltip" data-bs-placement="left"  title="View">
                        <i class="ti-menu-alt btn-icon-append dropbtn " style="color:#02679a;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value["expensesNo"] ?>')"></i>
                      </span>
<!--      
                        <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Delete">
                          <i class="ti-trash btn-icon-append dropbtn text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onClick="deleteId(<?php echo $value["expensesNo"] ?>)"></i>
                        </span>
                     -->
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
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header gbgn">
                    <h5 class="modal-title" id="exampleModalLabel">Expenses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body gbgn">
                    <div class="row">
                      <div class="col-12 grid-margin ">
                        <div class="" >
                          <div class="">
                            <div class="container">   
                              <br>               
                                <samp><i style="color:#02679a;">Date Created:</i> &nbsp; <p class="dt"></p></samp>
                                <hr>
                                <samp><i style="color:#02679a;">Expenses No:</i> &nbsp; <p class="exno"></p></samp>
                                <hr>
                                <samp><i style="color:#02679a;">Expenses Type:</i> &nbsp; <p class="exty"></p></samp>
                                <hr>
                                <samp><i style="color:#02679a;">Item Bought:</i> &nbsp; <p class="itm"></p></samp>
                                <hr>
                                <samp><i style="color:#02679a;">Amount:</i> &nbsp; <p class="amun"></p></samp>
                                <hr>
                                <samp><i style="color:#02679a;">Description:</i> &nbsp; <p class="dec"></p></samp>
                                <hr>
                                <samp><i style="color:#02679a;">Justification:</i> &nbsp; <p class="jus"></p></samp>
                                <hr>
                                <samp><i style="color:#02679a;">Staf Id:</i> &nbsp; <p class="stfid"></p></samp>
                                <hr>
                                <samp><i style="color:#02679a;">Purchaser:</i> &nbsp; <p class="puch"></p></samp>
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
                      <input name="expNo" type="hidden" class="form-control delid" id="exampleInputUsername1">
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
// function printP(ins){
//   let ggd = ins.getAttribute("gg")
//   window.open(window.location.origin+"/rampp/View/prinFRequisition.html"+ggd, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=700,width=700,height=700")
// }

function viewFunc(tag){
  
    let dt = document.querySelector(".dt"); 
    let exno = document.querySelector(".exno"); 
    let exty = document.querySelector(".exty"); 
    let itm = document.querySelector(".itm"); 
    let amun = document.querySelector(".amun"); 
    let dec = document.querySelector(".dec"); 
    let jus = document.querySelector(".jus"); 
    let stfid = document.querySelector(".stfid"); 
    let puch = document.querySelector(".puch"); 
   
  
 

    const dateFormat = (date)=>{
      var today = new Date(date);
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); 
      var yyyy = today.getFullYear();

      // today = mm + '/' + dd + '/' + yyyy;
      today = dd + '/' + mm + '/' + yyyy;
      return today
    }
    let mydata = JSON.stringify({ "expNo":tag })
    fetch("../../Utils/getSingleExpensesUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) 
    {
        if (data.status == "success") {
            console.log(data)
              dt.innerText = dateFormat(data.data[0].date)
              exno.innerText = data.data[0].expensesNo
              exty.innerText = data.data[0].expensesType
              itm.innerText = data.data[0].itemBought
              amun.innerText = "#"+Number(data.data[0].amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
              dec.innerText = data.data[0].description
              jus.innerText =data.data[0].justification
              stfid.innerText = data.data[0].staffId
              puch.innerText = data.data[0].purchaser
            
        }

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