<?php
   session_start();
   if(isset($_SESSION['validuser']))
   {
     include("../partials/_header.php");
     $title = "Home";
     $nav = "";
     include("../../Utils/sidebarUtils.php");
     require("../../Controller/generalController.php");
     include("../../Utils/sidebarUtils.php");
     include("../../Env/env.php");
     require("../../Connection/dbConnection.php");
    
     
      $conn = conString1();
     $UserUtils = new GeneralController();

     $items = $UserUtils->getSalableItem($conn);
    $orderId = $UserUtils->getOrderId($conn);
    $orderingUnit = $UserUtils->getAllOrdringUnit($conn);

  
    
?>
<style>
  a[disabled] {
    pointer-events: none !important;
}
</style>
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
                  <h4 class="font-weight-bold mb-0">Date Range</h4>
                </div>

                <!-- <div>
                  <h4 class="font-weight-bold mb-0 text-primary"><?php echo "OD_".$orderId ?></h4>
                </div> -->
                <!-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      Report
                    </button>
                </div> -->
              </div>
            </div>
          </div>
     
         <!--BODY -->
         <br><br><br>
          <div class="row">
				  	<div class="container">
            <form >
              
                <input hidden type="text" class="orid" value="<?php echo $orderId ?>">
                <input hidden type="text" class="uid" value="<?php echo $_SESSION['id'] ?>">
                <input hidden type="date" class="datee" value="<?php echo date('Y-m-d');?>">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="exampleFormControlSelect1">Select Date (From)</label>
                        <input name="qty" type="date" class="form-control form-control-lg dtf" >                
                    </div>

                    <div class="col-sm-4">
                        <label for="exampleFormControlSelect1">Select Date (To)</label>
                        <input name="qty" type="date" class="form-control form-control-lg dtt" >                
                    </div>
                    
                    <div class="col-sm-4" style="padding-top: 30px;">
                      <button type="button" class= "btn  text-white bg-pry btn-block" style="background-color: #02679a;" onclick="addItem(this)">
                        <i class="ti-search btn-icon-prepend text-white"></i> Search
                      </button>                                                       
                    </div>                                                  
                </div>
              </form>
              <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                    <tr>
                      <th class=' text-center ' >S/N</th>
                      <th class=' text-center ' >Date</th>
                      <th class=' text-center ' >Item Sold</th>
                      <th class=' text-center ' >Quantity Sold</th>
                      <th class=' text-center ' >Amount Sold</th>
                      <th class=' text-center ' >Profit</th>
                    </tr>
                    </thead>
                    <tbody class="tbodyy">               
                      <tr>
                        <th colspan="6" class=' text-center' style="color:#02679a;">NO ITEM SOLD</th>
                      </tr>
                    </tbody>
                   <tfooter>                    
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class=' text-center ' style="color: #02679a;">Total Amount</th>
                        <th class=' text-center ' style="color: #02679a;">Total Profit</th>                   
                      </tr>
                      
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>                       
                        <td class=' text-center amu'>#0.00</label></td>
                        <td class=' text-center proft'>#0.00</label></td>                    
                      </tr>   
                  </tfooter>
                  </table>
                  <br/>
                </div>
                <tfooter>
                          
                </tfooter>

            </div>

     


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


         <!--BODY -->
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      </div>
      <!-- FOOTER -->
      <?php include("../partials/_footer.php"); ?>
      <!-- partial -->
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
<!-- SCRIPT -->

<script>
 
  function displayHtml1(obj,ele){

    let child = ele.lastElementChild; 
    while (child) {
      ele.removeChild(child);
        child = ele.lastElementChild;
    }
    if (obj.length < 1) {

        let Thtml = `<tr>
                <th colspan="6" class=' text-center' style="color:#02679a;">NO ITEM SOLD</th>
                </tr>`
        ele.innerHTML = Thtml
    }
    obj.forEach(function(item,ind) {

      let list = document.createElement("tr");

      list.innerHTML = `
      
          <td class=" text-center" >${ind+1}</td>
          <td class=" text-left" >${item.dateOrderd}</td>
          <td class=" text-center" >${item.productname}</td>
          <td class=" text-center" >${item.quantity}</td>                      
          <td class="text-center" >#${Number(item.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>     
          <td class="text-center" >#${Number(item.profit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>     
      `;
      ele.appendChild(list);
    })
  }
// next


// End dependencies

function LoadingDisplay1(status,ele){
    if(!window.navigator.onLine) {
        alert("Oops! You're offline. Please check your network connection...");
    }else{
        if (status == "fail") {
          var child = ele.lastElementChild; 
            while (child) {
                ele.removeChild(child);
                child = ele.lastElementChild;
            }
    
            ele.innerText = "Searching...";
            let newSpan = document.createElement("span");
            newSpan.classList.add("spinner-border");
            newSpan.classList.add("spinner-border-sm");
    
            ele.appendChild(newSpan);
          
        }else{
    
          var child = ele.lastElementChild; 
            while (child) {
                ele.removeChild(child);
                child = ele.lastElementChild;
            }
            
            let newI = document.createElement("i");
            newI.classList.add("ti-search");
            newI.classList.add("btn-icon-append");
            ele.innerText = "Search ";
    
            ele.appendChild(newI);
        }

    }
  }

  function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return {strTime,ampm};
}


function addItem(btn) {
  let dtf = document.querySelector(".dtf"); 
  let dtt = document.querySelector(".dtt"); 
  let tbodyy = document.querySelector(".tbodyy"); 
  let proft = document.querySelector(".proft"); 
  let amu = document.querySelector(".amu"); 
  
  if(dtt.value == "" || dtf.value == ""){
    alert("please confirm your input")  
  }else{
       LoadingDisplay1("fail",btn)
      //  console.log("I AM CLICKED",orid,uid)
       var child = tbodyy.lastElementChild; 
       while (child) {
       tbodyy.removeChild(child);
           child = tbodyy.lastElementChild;
       }

       
       let mydata = JSON.stringify({ "dateFrom":dtf.value,"dateTo":dtt.value})
       fetch("../../Utils/dateRangeUtils.php",{
           method: 'POST',
           body: mydata,
           headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {
            console.log(data)
            if(data.status == "success"){
                LoadingDisplay1("success",btn)
                
                displayHtml1(data.data,tbodyy)

                let prof = []
            for (let index = 0; index < data.data.length; index++) {       
              prof.push(Number(data.data[index].profit)) 
            }
            proft.innerText = "#"+Number(prof.reduce((p,c)=>p+c,0)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')

            let amm = []
            for (let index = 0; index < data.data.length; index++) {       
              amm.push(Number(data.data[index].amount)) 
            }
            amu.innerText = "#"+amm.reduce((p,c)=>p+c,0).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
          }
        })

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