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
      $data = $UserUtils-> usersTableDisplay($conn);

      
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
                  <h4 class="font-weight-bold mb-0">Manage system users</h4>
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
                  <th>Role</th>
                  <th>Designation</th>
                  <th style="padding-left: 80px;">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
               foreach ($data as $index => $value) {
            
            ?>
          <tr>
            <td><?php echo $index+1 ?></td>
            <td><?php echo $value["fname"] ?></td>
            <td><?php echo $value["lname"] ?></td>
            <td><?php echo $value["sex"] ?></td>
            <td><?php echo $value["privilege"] ?></td>
            <td><?php echo $value["designation"] ?></td>
            <td>
            <div class="dropdown ">
              <div class="d-flex justify-content-between align-items-center">
              <span data-bs-toggle="tooltip" data-bs-placement="left"  title="View">
                <i class="ti-menu-alt btn-icon-append dropbtn " style="color:#02679a;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value["uname"] ?>')"></i>
              </span>
             <?php if($_SESSION['privilege'] == "Admin")
              {
                ?>
              <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Edit">
                <i class="ti-pencil-alt btn-icon-append dropbtn" data-bs-toggle="modal" data-bs-target="#editModal" onClick="editFunc('<?php echo $value["uname"] ?>')"></i>
              </span>
              <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Delete">
                <i class="ti-trash btn-icon-append dropbtn text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onClick="deleteId1('<?php echo $value["uname"] ?>')"></i>
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
  <div class="modal-dialog modal-lg">
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
                  <!-- <h4 class="card-title">Enter Personnel Info</h4> -->
                  <div class="container">
		<div class="row align-items-center flex-row-reverse">
    <div class="col-lg-4">
				<div class="about-avatar">
					<img class="prf" src="../../Upload/avatar7.png" alt="avater" width="100%">
				</div>
			</div>
			<div class="col-lg-8">
				<div class="about-text go-to">
					<h3 class="dark-color">User Info</h3>
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
								<label>Email:&nbsp;&nbsp;&nbsp; </label>
								<p class="vem" style="color:#02679a;"></p>
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
								<label>Designation:&nbsp;&nbsp;&nbsp; </label>
								<p class="voff" style="color:#02679a;"></p>
							</div>
							<div class="media">
								<label>Privilage: &nbsp;&nbsp;&nbsp;</label>
								<p class="vrl" style="color:#02679a;"></p>
							</div>
						</div>        
					</div>
          <div class="row">
            <div class="col-md-12">
              <div class="media d-flex justify-content-center align-items-center">
                <img class="sig" src="../../Upload/avatar7.png" alt="avater" width="100px">
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
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header gbgn">
        <h5 class="modal-title" id="exampleModalLabel">Edit Personnel Record</h5>
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
                  <form class="forms-sample" action="../../Controller/userDetailsController.php" method="post" >
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">First Name</label>
                                <input name="firstname" type="text" class="form-control fn" id="exampleInputUsername1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Last Name</label>
                                <input name="lastname" type="text" class="form-control ln" id="exampleInputUsername1" >
                            </div>
                        </div>                   
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Sex</label>
                            <select name="sex" class="form-control form-control sx" id="exampleFormControlSelect1">
                              <option value="">__select__</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Phone Number</label>
                                <input name="phone" type="number" class="form-control pn" id="exampleInputUsername1" >
                            </div>    
                        </div>
                      
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Email</label>
                                <input name="email" type="email" class="form-control em" id="exampleInputUsername1">
                            </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Home Address</label>
                                <input name="address" type="text" class="form-control ads" id="exampleInputUsername1">
                            </div>
                        </div>                     
                    </div>
         
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Designation</label>
                                <select name="office" class="form-control form-control off" id="exampleFormControlSelect1">
                                    <option value="">__select__</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="manager">Manager</option>
                                    <option value="managing Director">Managing Director</option>
                                        
                                </select>
                            </div>    
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Role</label>
                            <select name="role" class="form-control form-control rl" id="exampleFormControlSelect1">
                              <option value="">__select__</option>
                              <option value="Admin">Admin</option>
                              <option value="SubAdmin">SubAdmin</option>
                            </select>
                          </div>    
                        </div>
                                       
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">User Name</label>
                                <input name="username" type="text" class="form-control un" id="exampleInputUsername1" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Password</label>
                                <input name="password" type="password" class="form-control ps" id="exampleInputUsername1" >
                            </div>
                        </div>                   
                    </div>
                  
                    <button name="update" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="updating(this)">Update</button>
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
        <form action="../../Controller/userDetailsController.php" method="get">
          <input name="uname" type="hidden" class="form-control delid1" id="exampleInputUsername1" >
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
 function viewFunc(uname){
    let firstname = document.querySelector(".vfn"); 
    let lastname = document.querySelector(".vln"); 
    let email = document.querySelector(".vem"); 
    let phone = document.querySelector(".vpn"); 
    let address = document.querySelector(".vads");  
    let sex = document.querySelector(".vsx"); 
    let username = document.querySelector(".vun");
    let password = document.querySelector(".vps"); 
    let office = document.querySelector(".voff"); 
    let role = document.querySelector(".vrl"); 
    let prf = document.querySelector(".prf"); 
    let sig = document.querySelector(".sig"); 
    

    let mydata = JSON.stringify({ "username":uname })
    fetch("../../Utils/getSingleUserUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
      firstname.innerText = data.firstname
      lastname.innerText = data.lastname
      email.innerText = data.email
      phone.innerText = data.phone
      address.innerText = data.address
      sex.innerText = data.sex
     
      office.innerText = data.office
      role.innerText = data.privilege
      prf.src =data.profilepic? "../"+data.profilepic:"../../Upload/avatar7.png"
      sig.src =data.signature? "../"+data.signature:""
 
      console.log("response",data)
    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)
     
      }
    })
 }
  function editFunc(uname){
    let firstname = document.querySelector(".fn"); 
    let lastname = document.querySelector(".ln"); 
    let email = document.querySelector(".em"); 
    let phone = document.querySelector(".pn"); 
    let address = document.querySelector(".ads");  
    let sex = document.querySelector(".sx"); 
    let username = document.querySelector(".un");
    let password = document.querySelector(".ps"); 
    let office = document.querySelector(".off"); 
    let role = document.querySelector(".rl"); 
    

    let mydata = JSON.stringify({ "username":uname })
    fetch("../../Utils/getSingleUserUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
      firstname.value = data.firstname
      lastname.value = data.lastname
      email.value = data.email
      phone.value = data.phone
      address.value = data.address
      sex.value = data.sex
      username.value = data.username
      password.value = data.password
      office.value = data.office
      role.value = data.privilege
     
      // console.log("response",data)
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