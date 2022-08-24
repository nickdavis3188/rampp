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
                  <h4 class="font-weight-bold mb-0">View/Create Comparative Table</h4>
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
                
                
                  <!-- <form class="forms-sample" action="../../Controller/vendorController.php" method="post"> -->

                    <div class="form-group row">
                        <div class="col-sm-12">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Select Requisition</label>
                              <select class="form-control form-control-lg reqno" id="exampleFormControlSelect1">
                                  <?php
                                  foreach ($data as $index => $value) {  
                                  ?>
                                    <option value="<?php echo $value['preqno'] ?>"><?php echo $value['subject'] ?></option>
                                  <?php
                                  }
                                  ?>
                            </select>          
                          </div>
                        </div>
                      </div>            
                    <button id="mq" name="vendor" type="submit" class="btn btn-primary me-2  btn-block " style="background:#02679a;color:white;" onClick="loading11(this)" >Compar All Quote</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  <!-- </form> -->
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
 
 
 function loading22(par) {
    let ele = document.querySelector(".sel"); 
    let reqno = document.querySelector(".reqno"); 
    var child = ele.lastElementChild; 
    while (child) {
        ele.removeChild(child);
        child = ele.lastElementChild;
    }

    ele.innerText = "Loading...";
    let newSpan = document.createElement("span");
    newSpan.classList.add("spinner-border");
    newSpan.classList.add("spinner-border-sm");

    ele.appendChild(newSpan);

    
    let mydata = JSON.stringify({ "requisitionData":reqno.value })
        fetch("../../Utils/getVendorsForQuoteUtills.php", {
        method: 'POST',
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {
          // console.log("response",data)
   
                if(data.length > 1){
                    let ele2 = document.querySelector(".sel"); 
                    let elesub = document.querySelector("#mq"); 
                    let tlt = document.querySelector(".tlt"); 
                    elesub.disabled = false;
                    ele2.innerText = ""
                    tlt.innerText = "Select Vendor"
                    var child = ele2.lastElementChild; 
                    while (child) {
                        ele2.removeChild(child);
                        child = ele2.lastElementChild;
                    }
                    //
                    let selsecttxt = document.createElement("select");
                    selsecttxt.classList.add("form-control");
                    selsecttxt.classList.add("form-control-lg");
                    selsecttxt.classList.add("venI");
                    for (let i = 0; i < data.length; i++) {
                        let ptn = document.createElement("option");
                        ptn.value = data[i].id
                        ptn.innerText = data[i].compname
                        selsecttxt.appendChild(ptn)                     
                    }
                    
                    ele2.appendChild(selsecttxt);                  
                    // elesub.disabled = false
                }else{
                    ele.innerHTML = `<p class="text-center" style="color:#02679a">VENDORS NOT FOUND...</p>`
                }
        }).catch(err=>{
            if (err) {
                var child = ele.lastElementChild; 
                ele.innerText = ""
                while (child) {
                    ele.removeChild(child);
                    child = ele.lastElementChild;
                }
            
            window.location = window.location.origin+"/rampp/View/Procurement/enterVendorQuote.php?fail=Error"+err;
            // alert("Error:"+err)
            }
        })
 }

 function loading11(par) {
    let ele3 = document.querySelector(".venI"); 
    let reqno1 = document.querySelector(".reqno"); 
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
    // let vendorname =
    // console.log(ele3.value)
    window.location = window.location.origin+"/rampp/View/Procurement/comparativeTable.php?reqno="+reqno1.value;

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