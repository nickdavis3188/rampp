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
      $data1 = $UserUtils-> staffTableDisplay($conn);
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
                  <h4 class="font-weight-bold mb-0">Loan / Deduction</h4>
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
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Sex</th>
                  <th>Staff Tag</th>
                  <th style="padding-left: 80px;">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
               foreach ($data1 as $index => $value) {           
            ?>
          <tr>
            <td><?php echo $index+1 ?></td>
            <td><?php echo $value["fname"] ?></td>
            <td><?php echo $value["lname"] ?></td>
            <td><?php echo $value["sex"] ?></td>
            <td><?php echo $value["stafftag"] ?></td>
            <td>
            <div class="dropdown ">
              <div class="d-flex justify-content-between align-items-center">
              <span data-bs-toggle="tooltip" data-bs-placement="left"  title="View">
                <i class="ti-menu-alt btn-icon-append dropbtn " style="color:#02679a;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value["stafftag"] ?>')"></i>
              </span>
              <?php if($_SESSION['privilege'] == "Admin")
              {
                ?>
              <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Loan">
                <i class="ti-credit-card btn-icon-append dropbtn" data-bs-toggle="modal" data-bs-target="#salaryAdvanceView" onClick="salaryAdvanceFunc('<?php echo $value["stafftag"] ?>')"></i>
              </span>
              <span ata-bs-toggle="tooltip"  data-bs-placement="left" title="Deduction">
                <i class="ti-share btn-icon-append dropbtn text-danger" data-bs-toggle="modal" data-bs-target="#deductionView" onClick="deductionFunc('<?php echo $value["stafftag"] ?>')"></i>
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
    <div class="modal fade" id="deductionView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header gbgn">
            <h5 class="modal-title" id="exampleModalLabel">Deduction</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body gbgn">
            <div class="row">
                <div class="col-12 grid-margin ">
                <div class="" >
                    <div class="">
                    <div class="container">   
                        <form class="forms-sample" action="../../Controller/deductionController.php" method="post">
                            <input name="date" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>" hidden>
                            <input name="issuerId" type="number" class="form-control" id="exampleInputUsername1" value="<?php echo $_SESSION['id'] ?>" hidden>
                            <input name="staffTag" type="number" class="form-control staffTag" id="exampleInputUsername1" hidden>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Deduction Type</label>
                                        <select required name="type" class="form-control form-control ty" id="exampleFormControlSelect1" onchange="typeChange(this)">
                                          <option value="">__Sellect__</option>
                                          <option value="Damage">Damage</option>
                                          <option value="LoanRepay">Loan repay</option>
                                        </select>
                                    </div>    
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Anount</label>
                                        <input required name="amount" type="number" class="form-control amtd" id="exampleInputUsername1" >
                                    </div>    
                                </div>
                            </div>
                                <div class="form-group row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="exampleInputUsername1">Reson</label>
                                          <textarea required name="reason" class="form-control rsnd" id="exampleInputUsername1" rows="4"></textarea>
                                      </div>    
                                  </div>
                                </div>
                                                
                                <button name="diddu" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="savingRecord(this)">Submit</button>
                        </form>
                        <br>
                        <div class="container-flued">
                            <h6>Deduction History</h6>
                            <div class="table-responsive" style=" max-height:300px;">
                                <table class="table table-hover" >
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>StaffTag</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Reason</th>
                                            <th>issuer</th>                                 
                                        </tr>
                                    </thead>
                                    <tbody class="tbbd">
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
<!-- Modal -->
<!-- Modal -->
    <div class="modal fade" id="salaryAdvanceView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header gbgn">
            <h5 class="modal-title" id="exampleModalLabel">Loan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body gbgn">
            <div class="row">
                <div class="col-12 grid-margin ">
                <div class="" >
                    <div class="">
                    <div class="container">   
                        <form class="forms-sample" action="../../Controller/salaryAdvanceController.php" method="post">
                            <input name="date" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>" hidden>
                            <input name="issuerId" type="number" class="form-control" id="exampleInputUsername1" value="<?php echo $_SESSION['id'] ?>" hidden>
                            <input name="staffTag" type="number" class="form-control staffTag1" id="exampleInputUsername1" hidden>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Anount</label>
                                        <input name="amount" type="number" class="form-control amts" id="exampleInputUsername1" >
                                    </div>    
                                </div>          
                                <button name="saAd" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="savingRecord(this)">Submit</button>
                            </div>
                        </form>
                        <br>
                        <div class="container-flued">
                            <h6>Loan History</h6>
                            <div class="table-responsive" style=" max-height:300px;">
                                <table class="table table-hover" >
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>StaffTag</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>issuer</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody class="tbbs">
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header gbgn">
        <!-- <h5 class="modal-title" id="exampleModalLabel">User Info</h5> -->
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
 
			<div class="col-12">
				<div class="about-text go-to">
					<h3 class="dark-color">Personnel Info</h3>

					<br/>
					<div class="row about-list">
						<div class="col-md-6">
							<div class="media">
								<label>First Name:&nbsp;&nbsp;&nbsp; </label>
								<p class="vfn" style="color:#02679a;"></p>
							</div>
							<div class="media">
								<label>Last Name:&nbsp;&nbsp;&nbsp; </label>
								<p class="vln" style="color:#02679a;"></p>
							</div>
							<div class="media">
								<label>staff Tag:&nbsp;&nbsp;&nbsp; </label>
								<p class="vst" style="color:#02679a;"></p>
							</div>
							<div class="media">
								<label>Address:&nbsp;&nbsp;&nbsp; </label>
								<p class="vads" style="color:#02679a;"></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="media">
								<label>Phone:&nbsp;&nbsp;&nbsp; </label>
								<p class="vpn" style="color:#02679a;"></p>
							</div>
							<div class="media">
								<label>Sex:&nbsp;&nbsp;&nbsp; </label>
								<p class="vsx" style="color:#02679a;"></p>
							</div>
							<div class="media">
								<label>Salary Per Month:&nbsp;&nbsp;&nbsp; </label>
								<p class="vmonth" style="color:#02679a;"></p>
							</div>
							<div class="media">
								<label>Salary Per Annum: &nbsp;&nbsp;&nbsp;</label>
								<p class="vannum" style="color:#02679a;"></p>
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
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

      <!-- </div> -->
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
        <form action="../../Controller/staffDetailsController.php" method="get">
          <input name="staftag" type="hidden" class="form-control delid" id="exampleInputUsername1">
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
        <!-- </div>
        </div> -->
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

function savingRecord(par) {
    var child = par.lastElementChild; 
    while (child) {
        par.removeChild(child);
        child = par.lastElementChild;
    }

    par.innerText = "Saving record...";
    let newSpan = document.createElement("span");
    newSpan.classList.add("spinner-border");
    newSpan.classList.add("spinner-border-sm");

    par.appendChild(newSpan);


 }


 function viewFunc(tag){
    let firstname = document.querySelector(".vfn"); 
    let lastname = document.querySelector(".vln"); 
    let stafftag = document.querySelector(".vst"); 
    let phone = document.querySelector(".vpn"); 
    let address = document.querySelector(".vads");  
    let sex = document.querySelector(".vsx"); 
    let username = document.querySelector(".vun");
    let password = document.querySelector(".vps"); 
    let month = document.querySelector(".vmonth"); 
    let annum = document.querySelector(".vannum"); 
    

    let mydata = JSON.stringify({ "stafftag":tag })
    fetch("../../Utils/getSingleStaffUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
      firstname.innerText = data.firstname
      lastname.innerText = data.lastname
      stafftag.innerText = data.stafftag
      phone.innerText = data.phone
      address.innerText = data.address
      sex.innerText = data.sex
     
      month.innerText = "# "+Number(data.month).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
      annum.innerText = "# "+Number(data.annum).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
     
      console.log("response",data)
    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)
     
      }
    })
 }

 function typeChange(e){
    if (e.value == "LoanRepay") {
      let amts = document.querySelector(".amtd"); 
      let staffTag = document.querySelector(".staffTag"); 
      let mydata = JSON.stringify({ "stafftag":staffTag.value})
      fetch("../../Utils/getSingleStaffUtils.php", {
        method: 'POST',
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
      }).then(res=>res.json()).then(function(data) {
        console.log(data);
        let am = data.deptAmount;
        if (am == null|| am == 0) {
          amts.removeAttribute("max")      
        }else{
          amts.max = am
        }
      })
      // amts.setAttribute("max",'0')
    }else{
      let staffTag = document.querySelector(".staffTag"); 
      let cm= new Date().getMonth()+1
      let cy= new Date().getFullYear()
      let mydata = JSON.stringify({ "stafftag":staffTag.value,"month":cm,"year":cy })
      fetch("../../Utils/salaryAdvanceUtils.php", {
        method: 'POST',
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
      }).then(res=>res.json()).then(function(data) {
        let amtss = data.deduction
        let sal = data.sal

        let ded = []
        for (let index = 0; index < amtss.length; index++) {        
            ded.push(Number(amtss[index].amount))
        }
        let sv = []
        for (let index = 0; index < sal.length; index++) {        
            sv.push(Number(sal[index].amount))
        }
        let d = ded.length == 0?0:ded.reduce((prev,curr)=> prev + curr) 
        let s = sv.length == 0?0:sv.reduce((prev,curr)=> prev + curr)
        let tsd = Number(d) + Number(s)
        let limit = Number(data.month) - tsd
        let amts = document.querySelector(".amtd"); 
        amts.max =`${limit}`
        
        // amts.setAttribute("max",`${limit}`)
      })

    }
 }

  function salaryAdvanceFunc(tag){
    let amts = document.querySelector(".amts"); 
    let tbbs = document.querySelector(".tbbs"); 
    let staffTag1 = document.querySelector(".staffTag1"); 
    let cm= new Date().getMonth()+1
    let cy= new Date().getFullYear()
    let mydata = JSON.stringify({ "stafftag":tag,"month":cm,"year":cy })
    fetch("../../Utils/salaryAdvanceUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
        let amtss = data.deduction
        let sal = data.sal

        let ded = []
        for (let index = 0; index < amtss.length; index++) {        
            ded.push(Number(amtss[index].amount))
        }
        let sv = []
        for (let index = 0; index < sal.length; index++) {        
            sv.push(Number(sal[index].amount))
        }
        
        staffTag1.value = tag
        let d = ded.length == 0?0:ded.reduce((prev,curr)=> prev + curr) 
        let s = sv.length == 0?0:sv.reduce((prev,curr)=> prev + curr)
        let tsd = Number(d) + Number(s)
        let limit = Number(data.month) - tsd

        // amts.setAttribute("max",`${limit}`)

        let child = tbbs.lastElementChild; 
        while (child) {
            tbbs.removeChild(child);
            child = tbbs.lastElementChild;
        }

        const dateFormat = (date)=>{
            var today = new Date(date);
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); 
            var yyyy = today.getFullYear();

            // today = mm + '/' + dd + '/' + yyyy;
            today = dd + '/' + mm + '/' + yyyy;
            return today
          }

          if (sal.length == 0) {
            let list = document.createElement("tr");
            list.innerHTML = `
                <td colspan="5" class="text-center">No Records</td>
            `;
            tbbs.appendChild(list);
          }else{
              sal.forEach(function(item,ind) {
              
                  let list = document.createElement("tr");
      
                  list.innerHTML = `
                
                          <td>${ind+1}</td>
                          <td>${item.staffId}</td>
                          <td>${dateFormat(item.date)}</td>
                          <td>${"# "+Number(item.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                          <td>${item.issuerId}</td>
              
                  `;
                  tbbs.appendChild(list);
                
              })

          }
    //   console.log("response",data,amtss)
    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)   
      }
    })
  }
//   deductionUtils
  function deductionFunc(tag){
    let staffTag = document.querySelector(".staffTag"); 
    let amtd = document.querySelector(".amtd"); 
    let tbbd = document.querySelector(".tbbd"); 
    let cm= new Date().getMonth()+1
    let cy= new Date().getFullYear()
    let mydata = JSON.stringify({ "stafftag":tag,"month":cm,"year":cy })
    fetch("../../Utils/salaryAdvanceUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
        staffTag.value = tag
        let amtss = data.deduction
        let sal = data.sal

        let ded = []
        for (let index = 0; index < amtss.length; index++) {        
            ded.push(Number(amtss[index].amount))
        }
        let sv = []
        for (let index = 0; index < sal.length; index++) {        
            sv.push(Number(sal[index].amount))
        }
        
        let d = ded.length == 0?0:ded.reduce((prev,curr)=> prev + curr) 
        let s = sv.length == 0?0:sv.reduce((prev,curr)=> prev + curr)
        let tsd = Number(d) + Number(s)
        let limit = Number(data.month) - tsd

        // amtd.setAttribute("max",`${limit}`)

        let child = tbbd.lastElementChild; 
        while (child) {
            tbbd.removeChild(child);
            child = tbbd.lastElementChild;
        }

        const dateFormat = (date)=>{
            var today = new Date(date);
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); 
            var yyyy = today.getFullYear();

            // today = mm + '/' + dd + '/' + yyyy;
            today = dd + '/' + mm + '/' + yyyy;
            return today
          }

          if (amtss.length == 0) {
            let list = document.createElement("tr");
            list.innerHTML = `
                <td colspan="7" class="text-center">No Records</td>
            `;
            tbbd.appendChild(list);
          }else{
            amtss.forEach(function(item,ind) {
              
                  let list = document.createElement("tr");
      
                  list.innerHTML = `
                
                          <td>${ind+1}</td>
                          <td>${item.staffId}</td>
                          <td>${dateFormat(item.date)}</td>
                          <td>${"# "+Number(item.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                          <td>${item.type}</td>
                          <td>${item.reason}</td>
                          <td>${item.issuerId}</td>
              
                  `;
                  tbbd.appendChild(list);
      
             
             
              })

          }
    //   console.log("response",data,amtss)
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