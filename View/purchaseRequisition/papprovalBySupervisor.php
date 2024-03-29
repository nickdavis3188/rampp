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
      $data1 = $UserUtils-> getAllSubUnApproveP($conn);
    
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
                    <h5 class="modal-title" id="exampleModalLabel">P-Req Info</h5>
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
                                  <td colspan="5">
                                    
                                  </td>
                                  <td>
                                    <div class="row">
                                        <div class="col-12"><span style="color:#02679a"> GRAND TOTAL  </span> <br> <b><p class="tot"> </p></b> </div>
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
                                   <form action="../../Controller/pApproveController.php" method="post">
                                    <input name="preqNo" type="hidden" class="form-control prno" id="exampleInputUsername1">
                                    <input name="date" type="hidden" class="form-control prno" id="exampleInputUsername1"  value="<?php echo date('Y-m-d');?>">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="form-group">
                                            <label for="exampleFormControlSelect1">Approve Or Decline</label>
                                            <select required name="approval" class="form-control form-control" id="exampleFormControlSelect1">
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
                                    <button name="sup" type="submit" class="btn  btn-icon-text btn-block  text-white" style="background-color: #02679a;" onClick="approving(this)">
                                      <i class="ti-check-box btn-icon-append"></i>                          
                                      Approve
                                    </button> 
                                  </form>                    
                                </div>
                                <div class="col-4 mns text-center">
                                
                                </div>
                                <div class="col-4 mnds text-center">
                              
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
    let subj = document.querySelector(".frrr"); 
    let from = document.querySelector(".reqner"); 
    let dateprep = document.querySelector(".dprep"); 
    let summ = document.querySelector(".summ");  
    let tbodyy = document.querySelector("#tbb"); 
    let total = document.querySelector(".tot");
    let appro = document.querySelector(".prno"); 
    let manStatus = document.querySelector(".mns"); 
    let manDStatus = document.querySelector(".mnds"); 

    const dateFormat = (date)=>{
      var today = new Date(date);
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); 
      var yyyy = today.getFullYear();

      //today = mm + '/' + dd + '/' + yyyy;
      today = dd + '/' + mm + '/' + yyyy;
      return today
    }
    let mydata = JSON.stringify({ "pRegNo":tag })
    fetch("../../Utils/getSinglePurchaseRegUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
         reqno.innerText = data[0].preqno
         appro.value = data[0].preqno
        dateprep.innerText = dateFormat(data[0].dateprepared)
        subj.innerText = data[0].subject
        from.innerText = data[0].from
        summ.innerText = data[0].summary
        total.innerText ="# "+Number(data[0].total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
        // console.log(tbodyy)

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
                <td>${"# "+Number(element.unitprice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                      
                <td>${"# "+Number(element.subtotal ).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                    
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
          manStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Manager</p><br/><p class="text-danger">${data[0].manremark}</p><br/><p class="text-danger">${dateFormat(data[0].mandate)}</p>`         
        }else{
          if (data[0].mansig) {
            manStatus.innerHTML = `<img src="../${data[0].mansig}" width="100px"/><br/><p class="text-success">Manager</p><br/><p class="text-success">${data[0].manremark}</p><br/><p class="text-success">${dateFormat(data[0].mandate)}</p>` 
            
          } else {
            manStatus.innerHTML = `<p class="text-success">Approve</p><br/><br/><p class="text-success">Manager</p><p class="text-success">${data[0].manremark}</p><br/><p class="text-success">${dateFormat(data[0].mandate)}</p>`
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
          manDStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Managing Director</p><br/><p class="text-danger">${data[0].mandremark }</p><br/><p class="text-danger">${dateFormat(data[0].manddate)}</p>`         
        }else{
          if (data[0].mandsig) {
            manDStatus.innerHTML = `<img src="../${data[0].mandsig}" width="100px"/><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[0].mandremark}</p><br/><p class="text-success">${dateFormat(data[0].manddate)}</p>` 
          } else {
            manDStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[0].mandremark}</p><br/><p class="text-success">${dateFormat(data[0].manddate)}</p>`   
          }
        }
      }

     
      manstat()
      mandstat()
      
     



    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)
     
      }
    })
  }

  
  function editFunc(tag){
    let firstname = document.querySelector(".fn"); 
    let lastname = document.querySelector(".ln"); 
    let sex = document.querySelector(".sx"); 
    let phone = document.querySelector(".pn"); 
    let stafftag = document.querySelector(".st"); 
    let insentive = document.querySelector(".si");
    let address = document.querySelector(".ads");  
    let department = document.querySelector(".dept"); 
    let paymonth = document.querySelector(".month"); 
    let payannum = document.querySelector(".annum");
    let manStatus = document.querySelector(".mns"); 
    let manDStatus = document.querySelector(".mnds"); 
    

    let mydata = JSON.stringify({ "pRegNo":tag })
    fetch("../../Utils/getSingleStaffUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {

      firstname.value = data.firstname == ""?"null": data.firstname
      lastname.value = data.lastname == ""?"null": data.lastname
      sex.value = data.sex
      phone.value =data.phone
      stafftag.value = data.stafftag
      insentive.value = data.insentive
      address.value =data.address
      department.value = data.department 
      paymonth.value =data.month 
      payannum.value = data.annum 
     
      // console.log("response",data)
    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)
     
      }
    })
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
          manDStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Managing Director</p><br/><p style="color:#02679a">${data[0].mandremark }</p><br/><p class="text-danger">${data[0].manddate}</p>`         
        }else{
          if (data[0].mandsig) {
            manDStatus.innerHTML = `<img src="../${data[0].mandsig}" width="100px"/><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[0].mandremark}</p><br/><p class="text-success">${data[0].manddate}</p>` 
          } else {
            manDStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[0].mandremark}</p><br/><p class="text-success">${data[0].manddate}</p>`   
          }
        }
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
          manStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Manager</p><br/><p style="color:#02679a">${data[0].manremark}</p><br/><p class="text-danger">${data[0].mandate}</p>`         
        }else{
          if (data[0].mansig) {
            manStatus.innerHTML = `<img src="../${data[0].mansig}" width="100px"/><br/><p class="text-success">Manager</p><br/><p class="text-success">${data[0].manremark}</p><br/><p class="text-success">${data[0].mandate}</p>` 
            
          } else {
            manStatus.innerHTML = `<p class="text-success">Approve</p><br/><br/><p class="text-success">Manager</p><p class="text-success">${data[0].manremark}</p><br/><p class="text-success">${data[0].mandate}</p>`
          }
        }
      }
  // let manstat = ()=>{
  //       let child = manStatus.lastElementChild; 
  //       while (child) {
  //         manStatus.removeChild(child);
  //           child = manStatus.lastElementChild;
  //       }
  //       if (data[0].manapprove == "Pending") {
  //         manStatus.innerHTML = `<p class="text-warning">Pending</p>` 
  //       } else if(data[0].manapprove == "decline") {
  //         manStatus.innerHTML = `<p style="color: #02679a;">Decline</p>`         
  //       }else{
  //         if (data[0].mansig) {
  //           manStatus.innerHTML = `<img src="../${data[0].mansig}" width="100px"/>` 
            
  //         } else {
  //           manStatus.innerHTML = `<p class="text-success">Approve</p>`
  //         }
  //       }
  //     }
      // let mandstat = ()=>{
      //   let child = manDStatus.lastElementChild; 
      //   while (child) {
      //     manDStatus.removeChild(child);
      //       child = manDStatus.lastElementChild;
      //   }
      //   if (data[0].mandapprove == "Pending") {
      //     manDStatus.innerHTML = `<p class="text-warning">Pending</p>` 
      //   } else if(data[0].mandapprove == "decline") {
      //     manDStatus.innerHTML = `<p style="color: #02679a;">Decline</p>`         
      //   }else{
      //     if (data[0].mandsig) {
      //       manDStatus.innerHTML = `<img src="../${data[0].mandsig}" width="100px"/>` 
      //     } else {
      //       manDStatus.innerHTML = `<p class="text-success">Approve</p>`   
      //     }
      //   }
      // }
      manstat()
      mandstat()

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