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
      $data1 = $UserUtils-> getAllSubUnApproveC($conn);
    
?>
<!-- HEADER -->

<style>
  .table, .th, .td {
    border: 1px solid;
    }
    .table .td {
  border: solid 1px #666 !important;
  width: 110px !important;
  word-wrap: break-word !important;
  font-size: xx-small !important;
}

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
.customers tbody{
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
                  <h4 class="font-weight-bold mb-0">Approval By Supervisor</h4>
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
                    <td><?php echo $value["preqno"] ?></td>
                    <td><?php echo $value["from"] ?></td>
                    <td><?php echo $value["subject"] ?></td>
                    <td><?php echo date('d/m/y',strtotime($value["date"])) ?></td>
                    <td>
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                        <button href="#" class="badge badge-pill badge-success" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value["preqno"] ?>')">Approve/Decline</button>                    
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
                    <h5 class="modal-title" id="exampleModalLabel">Info</h5>
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
                                        <!-- </div> -->
                                    <!-- body -->
            
                                </div>
                                </div>
                                <!-- </div> -->
                              <!-- body -->
                    
                              <br>
                              <br>
                              <hr>
                              <div class="row">
                                <div class="col-4">
                                   <form action="../../Controller/cApproveController.php" method="post">
                                    <input name="preqNo" type="hidden" class="form-control prno" id="exampleInputUsername1">
                                    <input name="date" type="hidden" class="form-control prno" id="exampleInputUsername1"  value="<?php echo date('Y-m-d');?>">
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
                                    <button name="sup" type="submit" class="btn  btn-icon-text btn-block  text-white" style="background-color: #02679a;" onClick="approving(this)">
                                      <i class="ti-check-box btn-icon-append"></i>                          
                                      Approve
                                    </button> 
                                  </form>                    
                                </div>
                                <div class="col-4 mns"style="line-height: 9px;font-size: xx-small;" >
                                    <p class="text-warning">Pending</p>
                                    <p class="text-warning">Manager</p>
                                </div>
                                <div class="col-4 mnds"style="line-height: 9px;font-size: xx-small;" >
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
      
          
        <!-- </div> -->
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
// view
function viewFunc(params) {
    
    // let par = new URLSearchParams(window.location.search)
        // if (par.has("reqno")) {
            let reqno = document.querySelector(".reqid"); 
            let subj = document.querySelector(".for"); 
            let hed = document.querySelector(".hed"); 
          let bod = document.querySelector(".bod"); 
          let chipbody = document.querySelector(".chipbody"); 
            let tbodyy = document.querySelector(".itbod");
            let prno = document.querySelector(".prno");
         
          var child1 = bod.lastElementChild; 
          while (child1) {
            bod.removeChild(child1);
              child1 = bod.lastElementChild;
          }
          var child2 = chipbody.lastElementChild; 
          while (child2) {
            chipbody.removeChild(child2);
              child2 = chipbody.lastElementChild;
          }
          var child3 = tbodyy.lastElementChild; 
          while (child3) {
            tbodyy.removeChild(child3);
              child3 = tbodyy.lastElementChild;
          }
          var child4 = hed.lastElementChild; 
          while (child4) {
            hed.removeChild(child4);
              child4 = hed.lastElementChild;
          }
            let mydata = JSON.stringify({"pRegNo":params})
            fetch("../../Utils/getAllVendorQuoteUtills.php", {
            method: 'POST',
            body: mydata,
            headers: {"Content-Type": "application/json; charset=utf-8"}
            }).then(res=>res.json()).then(function(data) {
    
              reqno.innerText = data[0].preqno
              subj.innerText = data[0].subject
              prno.value = data[0].preqno
    
    
             
              let vvdata = []
              data[1].forEach(vv => {
                vvdata.push(
                  {
                    pregNo:vv.pregno,
                    venid:vv.vendorid,
                    for:vv.for,
                    venname:vv.vname,
                    form:vv.from,
                    date:vv.date,
                    itemPrice:[]
                  }
                )
              });
    
              for(let v = 0; v < vvdata.length; v++){
                for (let i = 0; i < data[2].length; i++) {
                  if (data[2][i].vendorId == vvdata[v].venid) {
                    vvdata[v].itemPrice.push(data[2][i])
                  }
                  
                }
              }
    
//////////////
              let vvdataItem = vvdata[0].itemPrice
            data[3].forEach((element,ind) => {
                let list1 = document.createElement("tr");
                list1.innerHTML = `       
                    <td class="td" style="border: 1px solid;">${element.itemname}</td>
                    <td class="td" style="border: 1px solid;">${element.description}</td>
                    <td class="td" style="border: 1px solid;">${element.qty}</td>   
                    <td class="td"># ${element.um}</td>                                                              
                    `;
                    tbodyy.appendChild(list1);       
            }) 
            let arr = []
            let count = 0
            let trr = document.createElement("tr");
            vvdata.forEach(element1 => {
              let thr = document.createElement("td");
              thr.classList.add("td")
              thr.style.border = "1px solid"
              thr.innerText =element1.venname 
              trr.appendChild(thr);              
              count++
              arr.push(arr.length + 1) 
            });
            hed.appendChild(trr);
    
    ////////////
    
    
    ///LOOPING ROWS AND COLUMNS FOR EACH VENDOR UNIT PRICE ALSO CALCULATE THE LOWEST PRICE FOR EACH ITEM FROM EACH VENDOR
            let lpoArr = []        
            let lpoArr1 = []    
              vvdataItem.forEach(element => {
                lpoArr1.push(lpoArr1.length+1)
              });
                lpoArr1.sort()
              for (let b = 0; b < lpoArr1.length; b++) {
                  let incr = 0
                  let rowar = []
                while (incr < vvdata.length) {//loop for each obj //each item to get each row
                  // console.log("eachlog",vvdata[incr])
                  let main1 = vvdata[incr].itemPrice
                  for (let i = 0; i < main1.length; i++) {//loop for items in each obj
                    if (parseInt(main1[i].itemNumber) == lpoArr1[b]) {//check for rach row
                      rowar.push(main1[i])
                    }           
                  }
                  
                  incr++
                }
                let higherPrice = 1000000000000000000
                let higherItem = []
                let trr1 = document.createElement("tr");
                rowar.forEach(element1 => {           
                  let td = document.createElement("td");
                  td.classList.add("td")
                  td.style.border = "1px solid"
                  td.innerText =  Number(element1.vendorUnitPrice) != 0? "#"+Number(element1.vendorUnitPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'):"N/A"
                  trr1.appendChild(td);              
                  if (parseFloat(element1.vendorUnitPrice) < higherPrice && parseFloat(element1.vendorUnitPrice) != 0) {
                    higherPrice = parseInt(element1.vendorUnitPrice)
                    if (higherItem.length > 0) {
                      higherItem = []
                      higherItem.push(element1)
                     
                    }else{
                      higherItem.push(element1)
                     
                    }
                  }
                // count++
                });
                bod.appendChild(trr1);
               
                higherItem.forEach((element4,ind) => {
                let list1 = document.createElement("tr");
                list1.innerHTML = `       
                    <td class="td" style="border: 1px solid;">${"#"+Number(element4.vendorUnitPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                    <td class="td" style="border: 1px solid;">${"#"+(Number(element4.vendorUnitPrice)*Number(element4.itemQuantity)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                    <td class="td" style="border: 1px solid;">${element4.venname}</td>   
                    `;
                    chipbody.appendChild(list1);
                    lpoArr.push(element4)
                                                                                     
                })          
                rowar = []//empty the row array
                incr = 0 //initialize new incr for each vendor
               
                
              }
    // ROW AND COLUMN LOOPING ENDS HEAR

   
              
            }).catch(err=>{
              if (err) {
                alert("Error:"+err)
                console.log("error",err)
             
              }
            })
        // }
    // view
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