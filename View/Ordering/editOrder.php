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
      $data1 = $UserUtils->getCustomers($conn);
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
                  <h4 class="font-weight-bold mb-0">Edit Order</h4>
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
            <form >
                       
              <div class="form-group row">
                  <div class="col-sm-6">
                      <label for="exampleFormControlSelect1">Select Customer</label>
                      <select  name="pname" class="form-control form-control-lg cusId" id="exampleFormControlSelect1">
                        <option value="">_select_</option>
                            <?php                         
                            foreach ($data1 as $index => $value) {                                                 
                            ?>
                                <option value="<?php echo $value['customerId']?>"><?php echo $value['customerName']?></option>
                            <?php
                            }
                            ?>
                  </select>
                    </div>
                          
                  
                  <div class="col-sm-6" style="padding-top: 30px;">
                    <button type="button" class= "btn  text-white bg-pry btn-block" style="background-color: #02679a;" onclick="getItem(this)">
                      get all order
                    </button>                                                       
                  </div>                                                  
              </div>
            </form>
            <div class="table-responsive">
            <table class="table table-hover">
          <thead>
              <tr>
                  <th class="text-center">S/N</th>
                  <th class="text-center">Order Number</th>
                  <th class="text-center">Product Name</th>
                  <th class="text-center">Qty</th>
                  <th class="text-center">M Unit</th>
                  <th style="padding-left: 80px;">Action</th>
              </tr>
          </thead>
          <tbody class="ttb">                       
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
<!-- 
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
    </div> -->
    <br/>
    <!-- Data Table area End-->
    <div class="modal fade" id="reduceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <h4 class="card-title"></h4>
    <div class="modal-content ">
    <form action="../../Utils/reduceOrderUtils.php" method="post">
      <div class="modal-header gbgn">
        <p>Reduce <Span id="itdr" style="color:#02679a;"></Span></p>
        
      </div>
      <div class="modal-body gbgn">
        <div class="form-group row">
          <input name="oderItemid" type="hidden" class="form-control orItid" id="exampleInputUsername1" >
          <input name="oderid" type="hidden" class="form-control orid" id="exampleInputUsername1" >
          <input name="inventryid" type="hidden" class="form-control invid" id="exampleInputUsername1" >
          <input name="date" type="hidden" class="form-control " id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>">
          <div class="form-group row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Quantity Reduced</label>
                      <input name="qtyrem" type="number" class="form-control rd" id="exampleInputUsername1" required>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Reason</label>
                      <input name="reason" type="text" class="form-control delid2" id="exampleInputUsername1" >
                  </div>
              </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">      
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                <button type="submit" name="restock" class="btn " onClick="loading44(this)"  style="background:#02679a;color:white;">Reduce</button>  
            </div>
          </div>
         
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

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
        <form action="../../Utils/removeOrderUtil.php" method="post">
          <input name="oderItemid" type="hidden" class="form-control orderItemid" id="exampleInputUsername1" >
          <input name="oderid" type="hidden" class="form-control orderid" id="exampleInputUsername1" >
          <input name="inventryid" type="hidden" class="form-control inventryid" id="exampleInputUsername1" >
          <input name="date" type="hidden" class="form-control " id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>">
          <!-- <input name="id" type="hidden" class="form-control delid1" id="exampleInputUsername1" > -->
          <button type="submit" name="deleteInventory" class="btn btn-danger" data-bs-dismiss="modal" >Delete</button>
        </form>
     
      </div>
    </div>
  </div>
</div>
                  

         
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
 function loading44(btn) {
      var rd = document.querySelector('.rd')
      if (rd.value != "") {
        console.log("B Iam clicked",btn)
          var child = btn.lastElementChild; 
          while (child) {
              btn.removeChild(child);
              child = btn.lastElementChild;
          }
  
          btn.innerText = "Reducing ..."
          let newSpan = document.createElement("span");
          newSpan.classList.add("spinner-border")
          newSpan.classList.add("spinner-border-sm")
  
          btn.appendChild(newSpan);
        
      }

    }
   function displayHtml(obj,ele){

        let child = ele.lastElementChild; 
        while (child) {
        ele.removeChild(child);
            child = ele.lastElementChild;
        }

        obj.forEach(function(item,ind) {

                let list = document.createElement("tr");
                list.innerHTML = `     
                        <td class="text-center">${ind+1}</td>
                        <td class="text-center">${item.orderid}</td>
                        <td class="text-center">${item.productname}</td>
                        <td class="text-center">${item.quantity}</td>
                        <td class="text-center">${item.unitOfMeasure}</i></td>
                        <td class="text-center">${item.prepAt}</i></td>
                        <td class="text-center">
                            <div class="dropdown ">
                                <div class="d-flex justify-content-between align-items-center">

                                    <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Reduce">
                                        <i class="ti-minus btn-icon-append dropbtn text-secondary" data-bs-toggle="modal" data-bs-target="#reduceModal" onClick="reduce2('${Number(item.orderid)}','${item.productId}','${item.id}')"></i>
                                    </span>

                                    <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Delete">
                                        <i class="ti-trash btn-icon-append dropbtn text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onClick="deleteId1('${Number(item.orderid)}','${item.productId}','${item.id}')"></i>
                                    </span>

                                </div>                               
                            </div>
                        </td>
             
                        `;
                        ele.appendChild(list);
                        
                        // <td> <input ${item.finish != 0?"checked":""} value="${item.sn}"  type="checkbox" onChange="checkItem(${item.orderid},this)"></td>  

        })
    }


  function reduce2(oid,inid,id){
    let orid = document.querySelector(".orid"); 
    let invid = document.querySelector(".invid"); 
    let orItid = document.querySelector(".orItid"); 
    orid.value = oid;
    invid.value = inid;
    orItid.value = id;
    // console.log(oid,inid,id);
  }
  function deleteId1(oid,inid,id){
    let orid = document.querySelector(".orderid"); 
    let invid = document.querySelector(".inventryid"); 
    let orItid = document.querySelector(".orderItemid"); 
    orid.value = oid;
    invid.value = inid;
    orItid.value = id;
    // console.log(oid,inid,id);
  }
  
function clearEle(k){
    let child = k.lastElementChild; 
        while (child) {
            k.removeChild(child);
            child = k.lastElementChild;
        }
}
  function getItem(k){
    let cusId = document.querySelector(".cusId"); 
    let body = document.querySelector(".ttb"); 
 
    if(cusId.value == ""){
        alert("customer not selected");
    }else{

        clearEle(k);

        k.innerHTML = `<span  class="spinner-border spinner-border-sm text-primary" id="spin"></span> `
        // 
        let mydata = JSON.stringify({ "cusId":cusId.value})
        fetch("../../Utils/getSingleCustomerOrderUtils.php", {
        method: 'POST',  
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data){
            if (data.status == "success") {
                clearEle(k)
                k.innerText = " get all order";
                console.log(data)
                displayHtml(data.data.sort((a,b)=>a.orderid - b.orderid),body)
            
            }
        });

    } 
        

    
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