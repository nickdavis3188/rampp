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
     $data = $UserUtils-> getAllApprovedByMdCC($conn);
      
?>
<!-- HEADER -->
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
        <button type="button" id="back" class="btn btn-icon-text text-white" style="background:#dddce1;" onClick="window.history.back()">
          <i class="ti-shift-left-alt btn-icon-append"></i>                          
          Back
        </button>
          <br/>
          <br/>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Create PayRoll</h4>
                </div>
                <!-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> -->
              </div>
            </div>
          </div>
          
         <!--BODY --->
         <div class="row">
            <div class="col-12 grid-margin ">
              <div class="" >
                <div class="">
                <div class="form-group row">
                    <div class="col-sm-4">
                    <label for="exampleFormControlSelect1">Select Month:</label>
                        <select id="month" class="form-control form-control-lg mnt" >
                            <option value="1" selected>January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>              
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleFormControlSelect1">Select Year</label>
                        <select id="month" class="form-control form-control-lg yer" >
                            <?php
                                  for ($i=1990; $i <= date("Y") ; $i++) { 
                                    if ($i == date("Y")) {                               
                                      echo("<option selected='selected' value=$i> $i</option>"); 
                                    }else{
                                      echo("<option value=$i> $i </option>"); 
                                    }                          
                                  }
                             ?>
                                                   
                        </select>                
                    </div>
                    
                    <div class="col-sm-4" style="padding-top: 30px;">
                      <button type="button" class= "btn  text-white bg-pry btn-block" style="background-color: #02679a;" onclick="loading11(this)">
                        <i class="ti-reload btn-icon-prepend text-white"></i>  Generate PayRoll
                      </button>
                    </div>
                </div>
              </form>
                
                  <!-- <form class="forms-sample" action="../../Controller/vendorController.php" method="post"> -->
                  <input name="issuerId" type="number" class="form-control creator" id="exampleInputUsername1" value="<?php echo $_SESSION['id'] ?>" hidden>
                  <input name="date" type="text" class="form-control dtt" id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>" hidden>
                  
                    <br>
                    <p style="color:red;margin:auto;" class="test-center m errmsg"></p>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  <!-- </form> -->
                </div>
              </div>
            </div>

            <div class="col-12 grid-margin mt-5">
              <div class="" >
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
                        <tbody class="prlt">
                            <!-- <tr>
                                <td colspan="7" class="text-center">NO RECORDS</td>
                            </tr> -->
                          
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
         </div>

         <!--BODY -->
          <!-- models -->
               
         <?php
                  if (isset($_REQUEST['fail'])){          
                                   
            ?>

         <!--BODY -->
         <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="fail" class="toast hide align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"       aria-atomic="true">
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
          <!-- models -->
       
          
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
 function loading11(par) {
    let prlt = document.querySelector(".prlt"); 
    let errmsg = document.querySelector(".errmsg"); 
    let dtt = document.querySelector(".dtt"); 
    let creator = document.querySelector(".creator"); 
    let yer = document.querySelector(".yer"); 
    let mnt = document.querySelector(".mnt"); 

    var child = par.lastElementChild; 
    while (child) {
        par.removeChild(child);
        child = par.lastElementChild;
    }

    par.innerText = "Generating Comparative Table...";
    let newSpan = document.createElement("span");
    newSpan.classList.add("spinner-border");
    newSpan.classList.add("spinner-border-sm");

    par.appendChild(newSpan);

    let mydata = JSON.stringify({"month":mnt.value,"year":yer.value,"date":dtt.value,"creator":creator.value})
    fetch("../../Utils/payrollGenUtils.php", {
    method: 'POST',
    body: mydata,
    headers: {"Content-Type": "application/json; charset=utf-8"}
    }).then(res=>res.json()).then(function(data) {
        // console.log(data)
        let pdata = data.data
        if (data.statusCode == 200) {
            const dateFormat = (date)=>{
            var today = new Date(date);
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); 
            var yyyy = today.getFullYear();

            // today = mm + '/' + dd + '/' + yyyy;
            today = dd + '/' + mm + '/' + yyyy;
            return today
          }
            let child = prlt.lastElementChild; 
            while (child) {
                prlt.removeChild(child);
                child = prlt.lastElementChild;
            }

            pdata.forEach(function(item,ind) {
              
              let list = document.createElement("tr");
  
              list.innerHTML = `             
                    <td >${ind+1}</td>
                    <td >${item.firstName+" "+ item.lastName}</td>
                    <td >${"# "+Number(item.monthlySalary).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                    <td >${item.deduction}</td>
                    <td >${item.salaryAdvance}</td>
                    <td >${item.commission}</td>
                    <td >${"# "+Number(item.amountPayable).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                    <td>${dateFormat(item.date)}</td>                 
                    `;
                  prlt.appendChild(list);
  
          })

          var child2 = par.lastElementChild; 
            while (child2) {
                par.removeChild(child2);
                child2 = par.lastElementChild;
            }
          
            par.innerText = "Generate PayRoll ";
          
        }else if(data.statusCode == 404){
            errmsg.innerText = data.msg;

            var child3 = par.lastElementChild; 
            while (child3) {
                par.removeChild(child3);
                child3 = par.lastElementChild;
            }
          
            par.innerText = "Generate PayRoll";
         
        }else{
            window.location = window.location.origin + "/rampp/View/Accounts/createPayRoll.php?fail=" + data.msg;
        }
    })
 }


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
    }).then(res=>res.text()).then(function(data) {
      console.log(data)
        // staffTag.value = tag
        // let amtss = data.deduction
        // let sal = data.sal

        // let ded = []
        // for (let index = 0; index < amtss.length; index++) {        
        //     ded.push(Number(amtss[index].amount))
        // }
        // let sv = []
        // for (let index = 0; index < sal.length; index++) {        
        //     sv.push(Number(sal[index].amount))
        // }
        
        // let d = ded.length == 0?0:ded.reduce((prev,curr)=> prev + curr) 
        // let s = sv.length == 0?0:sv.reduce((prev,curr)=> prev + curr)
        // let tsd = Number(d) + Number(s)
        // let limit = Number(data.month) - tsd

        // amtd.setAttribute("max",`${limit}`)

        // let child = tbbd.lastElementChild; 
        // while (child) {
        //     tbbd.removeChild(child);
        //     child = tbbd.lastElementChild;
        // }

      

        //   if (amtss.length == 0) {
        //     let list = document.createElement("tr");
        //     list.innerHTML = `
        //         <td colspan="5" class="text-center">No Records</td>
        //     `;
        //     tbbd.appendChild(list);
        //   }else{
        //     amtss.forEach(function(item,ind) {
              
        //         let list = document.createElement("tr");
      
        //         list.innerHTML = `             
        //             <td >${ind+1}</td>
        //             <td >${item.firstName+" "+ item.lastName}</td>
        //             <td >${"# "+Number(item.monthlySalary).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
        //             <td >${item.deduction}</td>
        //             <td >${item.salaryAdvance}</td>
        //             <td >${item.commission}</td>
        //             <td >${"# "+Number(item.amountPayable).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
        //             <td>${dateFormat(item.date)}</td>                 
        //             `;
        //             tbbd.appendChild(list); 
        //     })

        //   }
    //   console.log("response",data,amtss)
    }).catch(err=>{
      if (err) {
        alert("Error:"+err)
        console.log("error",err)
     
      }
    })
  }
  function getValue(par) {
    console.log(par.value)
   
    payannum.value =  parseFloat(Number(par.value * 12).toFixed(2))  
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