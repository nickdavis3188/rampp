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
                  <h4 class="font-weight-bold mb-0">Customize Audit Report</h4>
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
              <input hidden type="date" class="datee" value="<?php echo date('Y-m-d');?>">
                <div class="row">
                        <div class="col-md-12 grid-margin">
                        <form >
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="exampleFormControlSelect1">Select Date (From)</label>
                                    <input name="qty" type="date" class="form-control form-control-lg dtf" >                
                                </div>

                                <div class="col-sm-3">
                                    <label for="exampleFormControlSelect1">Select Date (To)</label>
                                    <input name="qty" type="date" class="form-control form-control-lg dtt" >                
                                </div>
                                <div class="col-sm-3">
                                    <label for="exampleFormControlSelect1">Percentage to show</label>
                                    <input type="number" class="form-control perc" id="exampleInputUsername1" style="height: 50px">               
                                </div>
                                
                                <div class="col-sm-3" style="padding-top: 30px;">
                                    <button type="button" class= "btn text-white bg-pry btn-block" style="background-color: #02679a;" onclick="customize(this)">
                                        customize
                                    </button>                                                       
                                </div>                                                  
                            </div>
                            </form>
                        </div>
                    </div>
              </div>
            </div>
             <!-- main -->
             <div class="col-12 grid-margin mt-5 off" >
              <div class="" >
              <div class="row">
                      <div class="col-12 grid-margin ">
                        
                            <div class="container">   
                                <div class="bod">

                                </div>
                               
                                
                            </div>
                         
                      </div>
                    </div>
              </div>
            </div>
             <!-- main -->
            <!-- customize -->
         
             <!-- customize -->
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


     function switchReport(inp){
    if (inp.checked) {
      let reep = document.querySelector(".off"); 
      let custom = document.querySelector(".onn"); 
      reep.classList.add("d-none")
      custom.classList.remove("d-none")

    }else{
        let reep = document.querySelector(".off"); 
        let custom = document.querySelector(".onn"); 
        reep.classList.remove("d-none")
        custom.classList.add("d-none")
    }
  }
 

 function addItem(btn) {
  let dtf = document.querySelector(".dtf"); 
  let dtt = document.querySelector(".dtt"); 
  let tbodyy = document.querySelector(".bod1"); 
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
       fetch("../../Utils/auditReportUtils.php",{
           method: 'POST',
           body: mydata,
           headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {
            console.log(data)
          
            let itemDisplayed = `
            <samp><i style="color:#02679a;">Total Expenses</i> &nbsp; 
                <p class="dt">Capital Expenditure:&nbsp; <b>${"#"+Number(data.data.expenses.capital).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Recurrent Expenditure:&nbsp; <b>${"#"+Number(data.data.expenses.recurrent).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Reinvestment:&nbsp; <b>${"#"+Number(data.data.expenses.reinvestment).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Stock Value</i> &nbsp;
                <p class="dt">Stock cost value:&nbsp; <b>${"#"+Number(data.data.stock.costValue).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Stock selling value:&nbsp; <b>${"#"+Number(data.data.stock.sellingValue).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Stock profit:&nbsp; <b>${"#"+Number(data.data.stock.stockProfit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Sales</i> &nbsp;
                <p class="dt">Bar Items:&nbsp; <b>${"#"+Number(data.data.sales.bar).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Kitchen Items:&nbsp; <b>${"#"+Number(data.data.sales.kitchen).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Profit:</i> &nbsp;
                <b><p class="dt">${"#"+Number(data.data.sales.profit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</p></b>
            </samp>
            <hr>
            `
            tbodyy.innerHTML = itemDisplayed;
            LoadingDisplay1("fail234",btn)
        })

     }
  }
 

 function customize(btnn) {
  let dtf = document.querySelector(".dtf"); 
  let dtt = document.querySelector(".dtt"); 
  let tbodyy = document.querySelector(".bod"); 
  let perc = document.querySelector(".perc"); 
  let datee = document.querySelector(".datee"); 

  
  if(dtt.value == "" || dtf.value == ""){
    alert("please confirm your input")  
  }else{
  
      //  console.log("I AM CLICKED",orid,uid)
       var child = btnn.lastElementChild; 
       while (child) {
        btnn.removeChild(child);
           child = btnn.lastElementChild;
       }

       btnn.innerText = "Customizing..."

       var child = tbodyy.lastElementChild; 
       while (child) {
       tbodyy.removeChild(child);
           child = tbodyy.lastElementChild;
       }

       
       let mydata = JSON.stringify({ "dateFrom":dtf.value,"dateTo":dtt.value,"percent":perc.value})
       fetch("../../Utils/auditCustomizeUtil.php",{
           method: 'POST',
           body: mydata,
           headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {
            console.log(data)

            let itemDisplayed = `
            <samp><i style="color:#02679a;">Total Expenses</i> &nbsp; 
                <p class="dt">Capital Expenditure:&nbsp; <b>${"#"+Number(data.data.expenses.capital).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Recurrent Expenditure:&nbsp; <b>${"#"+Number(data.data.expenses.recurrent).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Reinvestment:&nbsp; <b>${"#"+Number(data.data.expenses.reinvestment).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Stock Value</i> &nbsp;
                <p class="dt">Stock cost value:&nbsp; <b>${"#"+Number(data.data.stock.costValue).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Stock selling value:&nbsp; <b>${"#"+Number(data.data.stock.sellingValue).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Stock profit:&nbsp; <b>${"#"+Number(data.data.stock.stockProfit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Sales</i> &nbsp;
                <p class="dt">Bar Items:&nbsp; <b>${"#"+Number(data.data.sales.bar).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
                <p class="dt">Kitchen Items:&nbsp; <b>${"#"+Number(data.data.sales.kitchen).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</b></p>
            </samp>
            <hr>
            <samp><i style="color:#02679a;">Total Profit:</i> &nbsp;
                <b><p class="dt">${"#"+Number(data.data.sales.profit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</p></b>
            </samp>
            <hr>
            `
            tbodyy.innerHTML = itemDisplayed;

            var child = btnn.lastElementChild; 
            while (child) {
                btnn.removeChild(child);
                child = btnn.lastElementChild;
            }
            btnn.innerText = "Customize"

            let savedData = {
                'expensesCapital':data.data.expenses.capital,
                'expensesRecurrent':data.data.expenses.recurrent,
                'expensesReinvestment':data.data.expenses.reinvestment,
                'stockCostValue':data.data.stock.costValue,
                'stockSellingValue':data.data.stock.sellingValue,
                'stockProfit':data.data.stock.stockProfit,
                'totalBar':data.data.sales.bar,
                'totalKitchen':data.data.sales.kitchen,
                'salesProfit':data.data.sales.profit,
                "date":datee.value
            }

            let mydata = JSON.stringify(savedData)
            fetch("../../Utils/saveCustomizeAuditUtil.php",{
                method: 'POST',
                body: mydata,
                headers: {"Content-Type": "application/json; charset=utf-8"}
            }).then(res=>res.json()).then(function(data) {
                console.log(data)
            
            })
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