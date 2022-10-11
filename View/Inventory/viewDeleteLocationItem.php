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
      $location= $UserUtils->getLocation($conn);
      
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
                  <h4 class="font-weight-bold mb-0">View and manage location product</h4>
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
                  <th>Location</th>
                  <th>Products</th>
                  <th style="padding-left: 80px;">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
               foreach ($location as $index => $value) {
              
            ?>
          <tr>
            <td><?php echo $index +1 ?></td>
            <td><?php echo $value["salesLocationName"] ?></td>
            <td><?php echo $value["productQty"] ?></td>
            <td>
            <div class="dropdown ">
              <div class="d-flex justify-content-between align-items-center">
                <span data-bs-toggle="tooltip" data-bs-placement="left"  title="View">
                    <i class="ti-menu-alt btn-icon-append dropbtn " style="color:#02679a;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value['salesLocationId'] ?>')"></i>
                </span>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header gbgn">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Product Info</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body gbgn">
      <div class="row">
         <div class="col-12 grid-margin ">
              <div class="" >
                <div class="">
                  <!-- <h4 class="card-title">Enter Personnel Info</h4> -->
                  <div class="container">
		<div class="row align-items-center flex-row-reverse">
      <!-- <div class="col-12">
				<div class="about-avatar">
					<img src="../../Upload/avatar7.png" alt="avater" width="100%" style="height: 350px">
				</div>
			</div> -->
			<div class="col-12">
				<div class="about-text go-to">
					
                    <div class="history-holder">
                        <h6>Product</h6>
                        <div style="max-height:300px; overflow-y:auto;">

                        <!-- body -->
                        <div class="table-responsive">
                                <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="tbb">
                                                
                                </tbody>
                                </table>
                            </div>
                        
                        <!-- body -->
                        </div>
                    </div>
         <br>
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header gbgn">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body gbgn">
        <div class="row">
        <div class="col-12 grid-margin">
              <div class="" >
                <div class="">
                  <!-- <h4 class="card-title">Edit Product</h4> -->
                
                  <!-- <hr/> -->
                  <div class="row">
         <div class="col-12 grid-margin ">
              <div class="" >
                <div class="">
                  <!-- <h4 class="card-title">Enter Personnel Info</h4> -->
                  <!-- enctype="multipart/form-data" -->
                  <form class="forms-sample" action="../../Controller/inventoryDetailsController.php" method="post">
                    <input name="id" type="hidden" class="form-control ide" id="exampleInputUsername1">
                      <div class="form-group row">
                     
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">product Category</label>
                            <select name="catname"  class="form-control form-control cn" id="exampleFormControlSelect1">
                              <?php
                                foreach ($cati  as $index => $value) {
                                  
                                
                              ?>
                              <option value="<?php echo $value['catname']?>"><?php echo $value['catname']?></option>
                              <?php
                                }
                              ?>
                              </select>
                          </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Product Name</label>
                                <input name="pname" type="text" class="form-control pn" id="exampleInputUsername1" >
                            </div>    
                        </div>
                      
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Quantity Added</label>
                                <input name="qtyadded" type="text" class="form-control qty" id="exampleInputUsername1" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Minimum Level</label>
                                <input name="minlevle" type="text" class="form-control minl" id="exampleInputUsername1" >
                            </div>
                        </div>
                      
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Cost Price</label>
                                <input name="costp" type="text" class="form-control cp" id="exampleInputUsername1" >
                            </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Selling Price</label>
                                <input name="sallingp" type="text" class="form-control sp" id="exampleInputUsername1" onChange="calcProfit(this)">
                            </div>
                        </div>                     
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Profit</label>
                                <input name="profit" type="text" class="form-control pft" id="exampleInputUsername1">
                            </div>    
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Preparation Time</label>
                            <select name="preptime" class="form-control form-control pt" id="exampleFormControlSelect1">
                  
                              <?php
                               for ($i=1; $i <= 60; $i++) { 
                                if ($i == 1) {                               
                                  echo("<option selected='selected' value=$i>$i Minute</option>"); 
                                }else{
                                  echo("<option value=$i>$i Minutes</option>"); 
                                }                          
                              }
                              
                              ?>
                             
                              </select>
                          </div>    
                        </div>
                      
                    </div>
                    <!-- /////////////////////// -->

       
                    
                    <button name="updateinventory" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="loading(this)">Update</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
         </div>
      <!-- </div> -->
                    <!-- /////////////////////// -->

       
                    <!-- <button type="submit" class="btn text-light  me-2" style="background-color: #02679a;">Edit</button>
                    <button class="btn btn-light">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
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
        <form action="../../Controller/inventoryDetailsController.php" method="get">
          <input name="id" type="hidden" class="form-control delid1" id="exampleInputUsername1" >
          <button type="submit" name="deleteInventory" class="btn btn-danger" data-bs-dismiss="modal" >Delete</button>
        </form>
     
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="restockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
     <h4 class="card-title"></h4>
    <div class="modal-content ">
    <form action="../../Utils/restockInventory.php" method="post">
      <div class="modal-header gbgn">
        <p>Restock <Span id="itd" style="color:#02679a;"></Span></p>     
      </div>
      <div class="modal-body gbgn">
        <div class="form-group row">
          <input name="id" type="hidden" class="form-control delid2" id="exampleInputUsername1" >
          <input name="date" type="hidden" class="form-control delid2" id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>">

          <div class="form-group row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Quantity Added</label>
                      <input name="qtyadded" type="number" class="form-control rs" id="exampleInputUsername1" required >
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
                    <button type="submit" name="restock" class="btn " onClick="loading33(this)"  style="background:#02679a;color:white;">Restock</button>  

              </div>
          </div>
         
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="reduceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <h4 class="card-title"></h4>
    <div class="modal-content ">
    <form action="../../Utils/reducedInventry.php" method="post">
      <div class="modal-header gbgn">
        <p>Reduce <Span id="itdr" style="color:#02679a;"></Span></p>
        
      </div>
      <div class="modal-body gbgn">
        <div class="form-group row">
          <input name="id" type="hidden" class="form-control delid3" id="exampleInputUsername1" >
          <input name="date" type="hidden" class="form-control delid3" id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>">
          <div class="form-group row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Quantity Reduced</label>
                      <input name="qtyadded" type="number" class="form-control rd" id="exampleInputUsername1" required>
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
<div class="modal fade" id="moveToLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <h4 class="card-title"></h4>
    <div class="modal-content ">
    <form action="../../Utils/sendToLocationUtils.php" method="post">
      <div class="modal-header gbgn">
        <p>Send <Span id="itdr22" style="color:#02679a;"></Span> to...</p>
      </div>
      <div class="modal-body gbgn">
        <div class="form-group row">

          <input name="productId" type="hidden" class="form-control productId" id="exampleInputUsername1" >
          <input name="productName" type="hidden" class="form-control productName22" id="exampleInputUsername1" >
       
          <div class="form-group row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Sales Location</label>
                      <select required name="location" class="form-control form-control-lg loc" id="exampleFormControlSelect1">
                      <option value="">__SELECT_LOCATION__</option>
                        <?php                           
                          foreach ($location as $index => $value) {                         
                        ?>
                          <option value="<?php echo $value['salesLocationId']?>"><?php echo $value['salesLocationName']?></option>
                        <?php
                          }
                        ?>
                    
                      </select>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Quantity</label>
                      <input required name="quantity" type="number" class="form-control delid2" id="exampleInputUsername1" >
                  </div>
              </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">      
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                <button type="submit" name="sendTo" class="btn " onClick="loading99(this)"  style="background:#02679a;color:white;">Send</button>  
            </div>
          </div>
         
        </div>
      </div>
    </form>
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

 function viewFunc(id){
  
    let his = document.querySelector(".tbb"); 

    let mydata = JSON.stringify({ "id":id })
    fetch("../../Utils/getLocationItem.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
      
      // console.log("response",data[1])
   
       //  display history
        let child = his.lastElementChild; 
        while (child) {
          his.removeChild(child);
            child = his.lastElementChild;
        }
        if(data.length == 0){
          his.innerHTML = `<td class="text-center" colspan='4'>NO PRODUCT</td>`;
        }else{
          data.forEach(function(item,ind) {
              let list = document.createElement("tr");
  
              list.innerHTML = `
              
                  <td class=" text-left" >${ind+1}</td>
                  <td class=" text-left" >${item.productName}</td>
                  <td class=" text-left" >${item.quantityAdded}</td>
                  <td class=" text-left" >
                
                    <button class="btn btn-danger" onClick="deleteFromLocation(${item.productId},${item.locationId},'${item.productName}')">Remove</button>
                  
                  </td> 
                  
              `;
              his.appendChild(list)   
          })
        }
    // 

    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)
     
      }
    })
 }

function deleteFromLocation(pId,lId,pn){
    console.log(pId,lId)
   let retVal =  confirm(`Are you sure you want to remove ${pn} from this location?`)
   if (retVal == true) {
      let mydata = JSON.stringify({ "productId":pId,"locationId":lId})
      fetch("../../Utils/removeLocationItemUtils.php", {
      method: 'POST',
      body: mydata,
      headers: {"Content-Type": "application/json; charset=utf-8"}
      }).then(res=>res.json()).then(function(data) {
        if (data.status == "success") {
          window.location = window.location.origin+"/rampp/View/Inventory/viewDeleteLocationItem.php?msg=Product successfully removed from the specified location";
        } else {
          window.location = window.location.origin+"/rampp/View/Inventory/viewDeleteLocationItem.php?fail="+data.msg;
        }
      }).catch(err=>{
        if (err) {
          alert("Error:"+err)
          console.log("error",err)
        }
      })
   } else {
    console.log("hello Not OK")
   }
}

  function editFunc(id){
    let catname = document.querySelector(".cn"); 
    let prudname = document.querySelector(".pn"); 
    let qty = document.querySelector(".qty"); 
    let minimumL = document.querySelector(".minl"); 
    let costPrice = document.querySelector(".cp");  
    let sellingPrice = document.querySelector(".sp"); 
    let profit = document.querySelector(".pft"); 
    let timeP = document.querySelector(".pt"); 
    let idd = document.querySelector(".ide"); 
    
    
    // console.log(idd)
    
   
    let mydata = JSON.stringify({ "id":id })
    fetch("../../Utils/getSingleInventoryUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
      // console.log("response",data[0])
      catname.value = data[0].catname
      prudname.value = data[0].productname
      qty.value = data[0].quantityadded
      minimumL.value = data[0].minnimumlevle
      costPrice.value = data[0].minnimumlevle
      sellingPrice.value = data[0].sellingprice
      profit.value = data[0].profit
      timeP.value = data[0].preparationtime
      idd.value = data[0].id
  
   
    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        // console.log("error",err)
     
      }
    })
  }

  function deleteId1(par){
    let myid = document.querySelector(".delid1"); 
    // console.log(par)
    myid.value = par
  }
function restock2(pars,name) {
  let myid2 = document.querySelector(".delid2"); 
  let itd = document.querySelector("#itd"); 
  myid2.value = pars
  itd.innerHTML = name
}
function reduce2(pars,name) {
  let myid3 = document.querySelector(".delid3"); 
  let itdr = document.querySelector("#itdr"); 
  myid3.value = pars
  itdr.innerHTML = name
}
function sendTo(pars,name) {
  let myid3 = document.querySelector(".productId"); 
  let itdr22 = document.querySelector("#itdr22"); 
  let productName = document.querySelector(".productName22"); 
  myid3.value = pars
  itdr22.innerText = name
  productName.value = name
}



function loading33(btn) {
      var rs = document.querySelector('.rs')
      if (rs.value != "") {
        console.log("B Iam clicked",btn)
          var child = btn.lastElementChild; 
          while (child) {
              btn.removeChild(child);
              child = btn.lastElementChild;
          }
  
          btn.innerText = "Restocking ..."
          let newSpan = document.createElement("span");
          newSpan.classList.add("spinner-border")
          newSpan.classList.add("spinner-border-sm")
  
          btn.appendChild(newSpan);
        
      } 

    }
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
    function loading99(btn) {
      var child = btn.lastElementChild; 
      while (child) {
          btn.removeChild(child);
          child = btn.lastElementChild;
      }

      btn.innerText = "Sending ..."
      let newSpan = document.createElement("span");
      newSpan.classList.add("spinner-border")
      newSpan.classList.add("spinner-border-sm")

      btn.appendChild(newSpan);
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