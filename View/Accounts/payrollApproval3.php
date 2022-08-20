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
      $data1 = $UserUtils-> getAllPayroleApproval3($conn);
    
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
                  <h4 class="font-weight-bold mb-0">Approval By Manager</h4>
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
                    <th>Payroll Id</th>                                
                    <th>Date</th>                                 
                    <th>Created By</th>                                 
                    <th>Status</th>                                 
                    <th class="text-center">Action</th>
                </tr>                
                </thead>
                <tbody>
                     
                <?php           
                      foreach ($data1 as $index => $value) {  
                        $stat = "";
                        if ($value["approve3"] == 1) {
                          $stat = "<label class='badge badge-warning'>Pending</label>";
                        }elseif($value["approve3"] == 2){
                            $stat = "<label class='badge badge-success'>Approve</label>";
                        }else{
                          $stat = "<label class='badge badge-danger'>Decline</label>";
                        }
                        $retVal2 = ($value["approve3"] == 3 || $value["approve3"] == 3) ? "<label class='badge badge-danger'>Decline</label>" :$stat ; 
                      ?>
                  <tr>
                    <td><?php echo $index+1 ?></td>
                    <td><?php echo $value["id"] ?></td>
                    <td><?php echo date('d/m/y',strtotime($value["date"])) ?></td>
                    <td><?php echo $value["createdby"] ?></td>              
                    <td><?php echo $retVal2 ?></td> 
                    <td>
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                        <button href="#" class="badge badge-pill badge-success" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value["date"] ?>')">Approve/Decline</button>                    
                      </div>                               
                    </div>
                    </td>             
                    <!-- <td>
                    <div class="dropdown ">
                      <div class="d-flex justify-content-between align-items-center">
                      <span data-bs-toggle="tooltip" data-bs-placement="left"  title="View">
                        <i class="ti-menu-alt btn-icon-append dropbtn " style="color:#02679a;" data-bs-toggle="modal" data-bs-target="#viewModal" onClick="viewFunc('<?php echo $value["date"] ?>')"></i>
                      </span>
<!--      
                        <span ata-bs-toggle="tooltip" data-bs-placement="left" title="Delete">
                          <i class="ti-trash btn-icon-append dropbtn text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onClick="deleteId(<?php echo $value["expensesNo"] ?>)"></i>
                        </span>
                     -->
                      </div>                               
                    </div>
                    </td> -->
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
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header gbgn">
                    <h5 class="modal-title" id="exampleModalLabel">Payroll</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body gbgn">
                    <div class="row">
                      <div class="col-12 grid-margin ">
                        <div class="" >
                          <div class="">
                            <div class="container">   
                                <span class="ddd"></span>
                                <div class="row">
                                <div class="col-md-12 grid-margin">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <hp class="font-weight-bold mb-0">.</hp>
                                    </div>
                                    <div>
                                      <button disabled class="btn btn-primary btn-icon-text btn-rounded prt" style="background:#02679a;color:white;" onClick="exportCSVFile()">
                                          <i class="ti-export btn-icon-prepend"></i>Export
                                      </button>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="table-responsive" style=" max-height:300px;">
                                    <table class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Staff Name</th>
                                                <th>Monthly Salary</th>
                                                <th>Deduction</th>
                                                <th>Salary Advance</th>
                                                <th>Commission</th>                                 
                                                <th>Amount Payable</th>                                 
                                                <th>Date</th>                                 
                                            </tr>
                                        </thead>
                                        <tbody class="prltv">
                                            <!-- <tr>
                                                <td colspan="7" class="text-center">NO RECORDS</td>
                                            </tr> -->
                                        
                                        </tbody>
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
                                        <!-- <div class="mnds text-center">
                                            <p class="text-info">Pending</p>
                                            <p class="text-info">Managing Director</p>
                                        </div>   -->
                                        <form action="../../Controller/payrollApprovalController.php" method="post">
                                      <input name="preqNo" type="hidden" class="form-control prno" id="exampleInputUsername1">
                                      <input name="date" type="hidden" class="form-control" id="exampleInputUsername1"  value="<?php echo date('Y-m-d');?>">
                                      <div class="row">
                                          <div class="col-12">
                                            <div class="form-group">
                                              <label for="exampleFormControlSelect1">Approve Or Decline</label>
                                              <select name="approval" class="form-control form-control" id="exampleFormControlSelect1">
                                                <option value="">__Sellect__</option>
                                                <option value="2">Approve</option>
                                                <option value="3">Decline</option>
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
                                      <button name="manD" type="submit" class="btn  btn-icon-text btn-block  text-white" style="background-color: #02679a;" onClick="approving(this)">
                                        <i class="ti-check-box btn-icon-append"></i>                          
                                        Approve
                                      </button> 
                                    </form>
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
//   window.open(window.location.origin+"/Rampp/View/prinFRequisition.html"+ggd, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=700,width=700,height=700")
// }

function viewFunc(tag){
  
    let prltv = document.querySelector(".prltv"); 
    let ddd = document.querySelector(".ddd"); 
    let prt = document.querySelector(".prt"); 
    let prno = document.querySelector(".prno"); 
    prno.value = tag
    let manStatus = document.querySelector(".mns"); 
    let manDStatus = document.querySelector(".mnds"); 
    let supStatus = document.querySelector(".sups"); 
    ddd.setAttribute("date",tag)
    const dateFormat = (date)=>{
        if (date == "1111-11-11") {
            return ""
        }

        var today = new Date(date);
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); 
        var yyyy = today.getFullYear();
    
        today = mm + '/' + dd + '/' + yyyy;
        return today
        
    }
    let mydata = JSON.stringify({ "date":tag })
    fetch("../../Utils/getSinglePayroll.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) 
    {
        // console.log(data)
        let prls = data.payrolls;
        let prlsInf = data.payrollInfo;

        let approve1 = Number(prlsInf[0].approve1)
        let approve2 = Number(prlsInf[0].approve2)
        let approve3 = Number(prlsInf[0].approve3)

        let remark1 = prlsInf[0].remark1 == null?"":prlsInf[0].remark1
        let remark2 = prlsInf[0].remark2 == null?"":prlsInf[0].remark2
        let remark3 = prlsInf[0].remark3 == null?"":prlsInf[0].remark3

        let sgnature1 = prlsInf[0].sgnature1 == null?"":prlsInf[0].sgnature1
        let sgnature2 = prlsInf[0].sgnature2 == null?"":prlsInf[0].sgnature2
        let sgnature3 = prlsInf[0].sgnature3 == null?"":prlsInf[0].sgnature3

        let approveDate1 = prlsInf[0].approveDate1 == "1111-11-11"?"":prlsInf[0].approveDate1
        let approveDate2 = prlsInf[0].approveDate2 == "1111-11-11"?"":prlsInf[0].approveDate2
        let approveDate3 = prlsInf[0].approveDate3 == "1111-11-11"?"":prlsInf[0].approveDate3

        if(approve3 == 2){
            prt.disaled
        }

        let child = prltv.lastElementChild; 
        while (child) {
            prltv.removeChild(child);
            child = prltv.lastElementChild;
        }

        prls.forEach(function(item,ind) {
              
              let list = document.createElement("tr");
    
              list.innerHTML = `             
                  <td >${ind+1}</td>
                  <td >${item.firstName+" "+ item.lastName}</td>
                  <td >${"# "+Number(item.monthlySalary).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                  <td >${"# "+Number(item.deduction).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                  <td >${"# "+Number(item.salaryAdvance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                  <td >${item.commission}</td>
                  <td >${"# "+Number(item.amountPayable).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                  <td>${dateFormat(item.date)}</td>                 
                `;
                prltv.appendChild(list); 
          })
            
          
    
    let manstat = ()=>{
        let child = manStatus.lastElementChild; 
        while (child) {
            manStatus.removeChild(child);
            child = manStatus.lastElementChild;
        }
        if (approve2 == 1) {
            manStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Manager</p>` 
        } else if(approve2 == 3) {
            manStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Manager</p><br/><p class="text-danger">${remark2}</p><br/><p class="text-danger">${dateFormat(approveDate2)}</p>`         
        }else{
          if (sgnature2) {
            manStatus.innerHTML = `<img src="../${sgnature2}" width="100px"/><br/><p class="text-success">Manager</p><br/><p class="text-success">${remark2}</p><br/><p class="text-success">${dateFormat(approveDate2)}</p>` 
            
          } else {
            manStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Manager</p><br/><p class="text-success">${remark2}</p><br/><p class="text-success">${dateFormat(approveDate2)}</p>`
          }
        }
      }

  


      let supstat = ()=>{
        let child = supStatus.lastElementChild; 
        while (child) {
            supStatus.removeChild(child);
            child = supStatus.lastElementChild;
        }
        if (approve1 == 1) {
            supStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Supervisor</p>` 
        } else if(approve1 == 3) {
            supStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-success">Supervisor</p><br/><p class="text-danger">${remark1}</p><br/><p class="text-danger">${dateFormat(approveDate1)}</p>`         
        }else{
          if (sgnature1) {
            supStatus.innerHTML = `<img src="../${sgnature1}" width="100px"/><br/><p class="text-success">Supervisor</p><br/><p class="text-success">${remark1}</p><br/><p class="text-success">${dateFormat(approveDate1)}</p>`          
          } else {
            supStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Supervisor</p><br/><p class="text-success">${remark1}</p><br/><p class="text-success">${dateFormat(approveDate1)}</p>` 
          }
        }
      }
  
      manstat()
     
      supstat()
    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)
     
      }
    })
  }

  function dele(par){
  let myid = document.querySelector(".delid"); 
  myid.value = par
}


function convertToCSV(objArray) {
    var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
    var str = '';

    for (var i = 0; i < array.length; i++) {
        var line = '';
        for (var index in array[i]) {
            if (line != '') line += ','

			if (array[i][index] != null){
				line += array[i][index];
			} else {
				line += ''
			}
        }

        str += line + '\r\n';
    }

    return str;
}

function exportCSVFile() {
    let ddd = document.querySelector(".ddd"); 
    let dt = ddd.getAttribute("date");
    let mydata = JSON.stringify({ "date":dt })
    fetch("../../Utils/getSinglePayroll.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) 
    {
        // console.log(data)
        let prls = data.payrolls;

        const headers = {
            sn: 'S/N',
            date: 'Date',
            firstName: 'FirstName',
            lastName: 'LastName',
            monthlySalary: 'MonthlySalary',
            deduction: 'Deduction',
            salaryAdvance: 'SalaryAdvance',
            commission: 'Commission',
            amountPayable: 'AmountPayable',
        };

        let dat = [];

        for(let i = 0 ; i < prls.length;i++ ){
            dat.push({
                sn:prls[i].sn,
                date:prls[i].date,
                firstName:prls[i].firstName,
                lastName:prls[i].lastName,
                monthlySalary:prls[i].monthlySalary,
                deduction:prls[i].deduction,
                salaryAdvance:prls[i].salaryAdvance,
                commission:prls[i].commission,
                amountPayable:prls[i].amountPayable
            })
        }

        if (headers) {
         dat.unshift(headers);
        }

        const jsonObject = JSON.stringify(dat);
        
        const csv = convertToCSV(jsonObject);
        
        const exportName = "Payroll.csv" || "export.csv";
        
        const blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
        if (navigator.msSaveBlob) {
        navigator.msSaveBlob(blob, exportName);
        } else {
            const link = document.createElement("a");
            if (link.download !== undefined) {
                const url = URL.createObjectURL(blob);
                link.setAttribute("href", url);
                link.setAttribute("download", exportName);
                link.style.visibility = "hidden";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }
    })

}
const headers = {
 id: 'Identificador',
 nombre: 'Nombre'
};

const data = [
 { id: 1, nombre: 'John Doe' },
 { id: 2, nombre: 'Juan' },
 { id: 3, nombre: 'Samanta' }
];

// exportCSVFile(headers, data, 'nombres');
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