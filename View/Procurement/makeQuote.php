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
      $data1 = $UserUtils-> getAllManUnApproveP($conn);
    
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
                  <h4 class="font-weight-bold mb-0">Vendor's Quote</h4>
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
            <!-- <div class="container"> -->
            <!-- body -->
            <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <tbody>
                
                <!-- head -->
                <tr>
                    <td rowspan="2" colspan="3">
                    <div class="row">
                        <!-- <div class="col-md-6">
                        <img src="../../Upload/logo.jpeg"/ style="width:200px">
                        </div> -->
                        <div class="col-12">
                        <h5 style="color:#02679a;font-size:25px">Add vendor Quote</h5>
                        <div>
                    </div>
                    </td>  
                    <td rowspan="2" colspan="2">
                    <div class="row">
                        <div class="col-12"><span style="color: #02679a;">Request Id: </span>&nbsp;&nbsp;<span class="reqid"></span></div>
                       
                    </div>                                      
                    </td>                    
                                           
                </tr>
                <tr>                    
                
                </tr>
                 <!-- <div class="col-12"><span style="color: #02679a;">Request Id: </span>&nbsp;&nbsp;<span class="reqid"></span></div> -->
                <tr>
                  
                    <td colspan="3">
                    <div class="row">
                        <div class="col-12"><span style="color: #02679a;"> Request Name: </span>&nbsp;&nbsp;<span class="for"></span></div>
                    
                    </div>  
                    </td>
                    <td colspan="2">
                        <div class="row">
                        <div class="col-12"><span style="color: #02679a;">Date: </span>&nbsp;&nbsp;<span class="date"></span></div>
                     
                        </div>  
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="row">
                        <div class="col-12"><span style="color: #02679a;"> Creatro: </span>&nbsp;&nbsp;<span class="from"></span></div>
                   
                        </div>  
                    </td>
                  
                    <td colspan="2">
                        <div class="row">
                        <div class="col-12"><span style="color: #02679a;">Vendor: </span>&nbsp;&nbsp;<span class="vendor"></span></div>
                  
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
                    UM
                    </th>
                    <th>
                    Vendor Unit Price(#)
                    </th>
                </tr>
                </thead>
                <tbody id="tbb">                                   
                </tbody>
               
            </table>
          </div>
          <button name="vendor" type="button" class="btn btn-primary me-2  btn-block bbt" style="background:#02679a;color:white;" onClick="submitQuote(this)" >Submit Quote</button>
            <br>
            <br>
      
        <!-- </div> -->
          </div>
          <br/>
            
          <br/>
   

            <!-- Modal -->

            <!-- Modal -->
          
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






    let par = new URLSearchParams(window.location.search)
    if (par.has("id")&& par.has("reqno")) {
        let reqno = document.querySelector(".reqid"); 
        let subj = document.querySelector(".for"); 
        let from = document.querySelector(".from"); 
        let vendor = document.querySelector(".vendor"); 
        let date = document.querySelector(".date");
        let tbodyy = document.querySelector("#tbb"); 
         let total = document.querySelector(".tot");  
        
         const dateFormat = (date)=>{
              var today = new Date(date);
              var dd = String(today.getDate()).padStart(2, '0');
              var mm = String(today.getMonth() + 1).padStart(2, '0'); 
              var yyyy = today.getFullYear();

              today = mm + '/' + dd + '/' + yyyy;
              return today
            }
        let mydata = JSON.stringify({"pRegNo":par.get("reqno"),"venId":par.get("id")})
        fetch("../../Utils/getPurchaseReqVendorQuote.php", {
        method: 'POST',
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {
            reqno.innerText = data[0].preqno
            subj.innerText = data[0].subject
            from.innerText = data[0].from
            vendor.innerText =data[2][0].compname
            date.innerText = dateFormat(data[0].dateprepared)
            // total.innerText = "# "+Number(data[0].total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
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
              var dd = new Date().getDate()

                var mm = new Date().getMonth()+1

                var yy = new Date().getFullYear()

                var ds = `${yy}-${mm}-${dd}`


                  let list2 = document.createElement("tr");
                  list2.innerHTML = `       
                      <td>${ind+1}</td>
                      <td>${element.itemname}</td>
                      <td>${element.description}</td>
                      <td>${element.qty}</td>   
                      <td># ${element.um}</td>                      
                      <td><input pid="${data[0].preqno}" venid="${data[2][0].id}" itmName="${element.itemname}" itemNo="${ind+1}" des="${element.description}" qty="${element.qty}" um="${element.um}" from="${data[0].from}" date="${ds}" venname="${data[2][0].compname}" type="number" class="form-control form-control unitPrice" value="0.00"></td>                    
                  `;
                  tbodyy.appendChild(list2);
                  
              }) 
          }
    
     
        }).catch(err=>{
          if (err) {
            alert("Error:"+err)
            console.log("error",err)
         
          }
        })
    }
    
 
    function submitQuote(pa) {
      var child = pa.lastElementChild; 
      while (child) {
        pa.removeChild(child);
          child = ele.lastElementChild;
      }

      pa.innerText = "Submiting Quotes...";
      let newSpan = document.createElement("span");
      newSpan.classList.add("spinner-border");
      newSpan.classList.add("spinner-border-sm");

      pa.appendChild(newSpan);

      let allInput = document.querySelectorAll(".unitPrice")
      let obj = [];
      for (let i = 0; i < allInput.length; i++) {

          obj.push({
            purchaseId:allInput[i].getAttribute("pid"),
            vendorId:allInput[i].getAttribute("venid"),
            itemName:allInput[i].getAttribute("itmName"),
            itemDescription:allInput[i].getAttribute("des"),
            itemQuantity:allInput[i].getAttribute("qty"),
            itemUnitMeasure:allInput[i].getAttribute("um"),
            vendorUnitPrice:allInput[i].value,
            itemNumber:allInput[i].getAttribute("itemNo"),
            venname: allInput[i].getAttribute("venname")
          });       
        
      }
      let vendor = document.querySelector(".vendor");
      let subj = document.querySelector(".for"); 
      let from = document.querySelector(".from"); 
      let date = document.querySelector(".date");

      let mydata = JSON.stringify({"itemWithQuote":obj,"venid":par.get("id"),"pid":par.get("reqno"),"for":subj.innerText,"vname":vendor.innerText,"from":from.innerText,"date":date.innerText})
      fetch("../../Controller/vendorQuoteController.php", {
      method: 'POST',
      body: mydata,
      headers: {"Content-Type": "application/json; charset=utf-8"}
      }).then(res=>res.json()).then(function(data) {
       
        if (data.status == "success" ) {
          // pa.disabled =true;
          window.location = window.location.origin+"/Rampp/View/Procurement/enterVendorQuote.php?msg= Submit Successful";
        } else {
          window.location = window.location.origin+"/Rampp/View/Procurement/enterVendorQuote.php?fail="+data.message;
        }
        console.log(data)
      }).catch(err=>{
            if (err) {
             
              window.location = window.location.origin+"/Rampp/View/Procurement/enterVendorQuote.php?fail="+err;
           
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