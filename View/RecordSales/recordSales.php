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
                  <h4 class="font-weight-bold mb-0">Place Sale</h4>
                </div>

                <div>
                  <h4 class="font-weight-bold mb-0 text-primary"><?php echo "OD_".$orderId ?></h4>
                </div>
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
                <input hidden type="text" class="uid" value="<?php echo $_SESSION['staffTag'] ?>">
                <input hidden type="date" class="datee" value="<?php echo date('Y-m-d');?>">
                <div class="form-group row">
                    <div class="col-md-3">
                    <label for="exampleFormControlSelect1">Select Product</label>
                      <select name="pname" class="form-control form-control-lg pname" id="exampleFormControlSelect1" onchange="getPValue(this)">
                        <?php

                            
                          foreach ($items as $index => $value) {
                                                      
                        ?>
                        <option value="<?php echo $value['id']?>"><?php echo $value['productname']?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-2">
                    <label for="exampleFormControlSelect1">Qty</label>
                      <input name="qty" type="number" class="form-control form-control-lg qty" >
                    </div>
                    <div class="col-md-2">
                      <label for="exampleFormControlSelect1">UM</label>
                      <input class="form-control form-control-lg mUnit" id="exampleFormControlSelect1" type="text" >
                    </div>
                    <div class="col-sm-5" style="padding-top: 30px;">
                      <button type="button" class= "btn  text-white bg-pry btn-block" style="background-color: #02679a;" onclick="addItem(this)">
                        <i class="ti-plus btn-icon-prepend text-white"></i> Add
                      </button>                                                       
                    </div>                                                  
                </div>
              </form>
              <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                    <tr>
                      <th class=' text-center ' >S/N</th>
                      <th class=' text-center ' >Product</th>
                      <th class=' text-center ' >PrpTime</th>
                      <th class=' text-center ' >Price</th>
                      <th class=' text-center ' >Description</th>
                      <th class=' text-center ' >Amount</th>
                      <th class=' text-center ' >Action</th>
                    </tr>
                    </thead>
                    <tbody class="tbodyy">               
                      <tr>
                        <th colspan="7" class=' text-center' style="color:#02679a;">NO ITEM LISTED</th>
                      </tr>
                    </tbody>
                   <tfooter>                    
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class=' text-center ' style="color: #02679a;">Total Time</th>
                        <th class=' text-center ' style="color: #02679a;">Total Amount</th>
                        <th></th>
                      </tr>
                      
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>                       
                        <td class=' text-center min'>0min</label></td>
                        <td class=' text-center amu'>#0.00</label></td>
                        <td></td>
                      </tr>   
                  </tfooter>
                  </table>
                  <br/>
                </div>
                <tfooter>
                <button type="button" class="btn  btn-icon-text  btn-block text-white br-pry" style="background-color: #02679a;" onclick="submitOrder(this)">
                  <i class="ti-shopping-cart btn-icon-append"></i>                          
                  Make Order
                </button>               
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
  let orderInfo = {
    "sellerId":0,
    "orderId":0,
    "totaltime":0,
    "totalamount":0,
    "orderdate":"",
    "orderTime":"",
    "hr":"",
    "min":"",
    "ampm":"",
    "br":0,
    "kch":0,
    "kt":0,
    "bt":0,
    "totalProfit":0,
    "items":[]
  }

        // next

        
  function chkInternetStatus() {
    if(!window.navigator.onLine) {
        alert("Oops! You're offline. Please check your network connection...");
    }
  }
  function displayHtml1(obj,ele){

    let child = ele.lastElementChild; 
    while (child) {
      ele.removeChild(child);
        child = ele.lastElementChild;
    }

    obj.forEach(function(item,ind) {

      let list = document.createElement("tr");

      list.innerHTML = `
      
          <td class=" text-center" >${ind+1}</td>
          <td class=" text-left" >${item.productName}</td>
          <td class=" text-center" >${item.prepTime}</td>
          <td class=" text-center" >#${Number(item.price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                      
          <td class="text-center" >${item.description}</td>
          <td class=" text-center" >#${Number(item.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                    
          <td class="text-center">                                                                       
              <i class="ti-trash text-danger btn-icon-append deli" style="font-size: 24px" onClick="remove(${ind})" >                                                                         
          </td>
      `;
      ele.appendChild(list);
    })
  }
// next
function clearItenListAndElements(ele,ele2){
while(eachData.item.length > 0) {
eachData.item.pop();
}

var child = ele.lastElementChild; 
while (child) {
ele.removeChild(child);
  child = ele.lastElementChild;
}

if (eachData.item.length < 1) {

let Thtml = `<tr>
          <th colspan="7" class=' text-center' style="color:#02679a;">NO ITEM LISTED</th>
        </tr>`
ele.innerHTML = Thtml
}

ele2.innerText = "#"+Number("0").toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
}

// End dependencies

function LoadingDisplay1(status,ele){
  chkInternetStatus()
    if (status == "fail") {
      var child = ele.lastElementChild; 
        while (child) {
            ele.removeChild(child);
            child = ele.lastElementChild;
        }

        ele.innerText = "Adding...";
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
        
        ele.innerText = "Add";
        let newI = document.createElement("i");
        newI.classList.add("ti-plus");
        newI.classList.add("btn-icon-append");

        ele.appendChild(newI);
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
  let pname = document.querySelector(".pname"); 
  let Qty = document.querySelector(".qty"); 
  let unit = document.querySelector(".mUnit"); 
  let min = document.querySelector(".min"); 
  let ammount = document.querySelector(".amu");
  let tbodyy = document.querySelector(".tbodyy"); 
  let orid = document.querySelector(".orid"); 
  let uid = document.querySelector(".uid"); 
  let datee = document.querySelector(".datee"); 
  chkInternetStatus()
  if(pname.value == "" || Qty.value == ""){
    alert("please confirm your input")  
  }else{
       LoadingDisplay1("fail",btn)
      //  console.log("I AM CLICKED",orid,uid)
       var child = tbodyy.lastElementChild; 
       while (child) {
       tbodyy.removeChild(child);
           child = tbodyy.lastElementChild;
       }

       orderInfo.sellerId = Number(uid.value);
       orderInfo.orderId = Number(orid.value);
       let mydata = JSON.stringify({ "productId":pname.value})
        fetch("../../Utils/orderUtils.php",{
        method: 'POST',
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {
          if(data.status == "success"){
          
            // console.log(data.data)

            let subIsem = {
              // sn:orderInfo.items.length+1,
              productId:data.data[0].id,
              productName:data.data[0].productname,
              productcat:data.data[0].catname,
              price:data.data[0].sellingprice,
              quantity:Qty.value,
              description:Qty.value +" "+ unit.value,
              amount:(Number(data.data[0].sellingprice)*Number(Qty.value)).toFixed(2),
              prepTime:data.data[0].preparationtime* Number(Qty.value),
              orderId:orderInfo.orderId,
              prepAt:data.data[0].prepAt,
              dateOrderd:datee.value,
              profit:(Number(data.data[0].profit) * Number(Qty.value)),
              costprice:data.data[0].costprice,
              sellingprice:data.data[0].sellingprice
            }

            orderInfo.items.push(subIsem)
            displayHtml1(orderInfo.items,tbodyy)
            let total = 0
            let totalMin = 0
            for (let items = 0; items < orderInfo.items.length; items++) {
              total+= Number(orderInfo.items[items].amount);
              totalMin+= Number(orderInfo.items[items].prepTime);
            }

            let prof = []
            for (let index = 0; index < orderInfo.items.length; index++) {       
              prof.push(Number(orderInfo.items[index].profit)) 
            }
            orderInfo.totalProfit = prof.reduce((p,c)=>p+c,0);
            
            let ordat = []
            for (let index = 0; index < orderInfo.items.length; index++) {       
              ordat.push(orderInfo.items[index].prepAt)        
            }

            let ktt = []
            for (let index = 0; index < orderInfo.items.length; index++) {   
              if(orderInfo.items[index].prepAt == "Kitchen"){
                ktt.push(orderInfo.items[index].prepTime)
              }    
            }

            orderInfo.kt = ktt.reduce((e,a)=>e+a,0);

            let btt = []
            for (let index = 0; index < orderInfo.items.length; index++) {   
              if(orderInfo.items[index].prepAt == "Bar"){
                btt.push(orderInfo.items[index].prepTime)
              }    
            }
            orderInfo.bt = btt.reduce((e,a)=>e+a,0);

            let dd = new Date()
            ammount.innerText = "#"+Number(total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
            min.innerText = totalMin+"min" 
            orderInfo.br = ordat.includes("Bar")?1:0
            orderInfo.kch = ordat.includes("Kitchen")?1:0
            orderInfo.totalamount = Number(total)
            orderInfo.totaltime = totalMin
            orderInfo.orderdate = datee.value
            orderInfo.orderTime = formatAMPM(new Date).strTime;
            let hrIndex = formatAMPM(new Date).strTime.indexOf(":");
            let hrrr = formatAMPM(new Date).strTime.slice(0,hrIndex);
            orderInfo.hr = hrrr;
            let len = formatAMPM(new Date).strTime.length
            let mint = formatAMPM(new Date).strTime.slice(hrIndex+1,len-3)
            orderInfo.min = mint
            orderInfo.ampm = formatAMPM(new Date).ampm
            Qty.value = "";
            LoadingDisplay1("success",btn)
          }
        })

     }
  }

  function remove(index){

     let min = document.querySelector(".min"); 
      let ammount = document.querySelector(".amu");
      let tbodyy = document.querySelector(".tbodyy"); 
      orderInfo.items.splice(index,1)
      let total = 0
      let totalMin = 0
      for (let items = 0; items < orderInfo.items.length; items++) {
        total+= Number(orderInfo.items[items].amount);
        totalMin+= Number(orderInfo.items[items].prepTime);
      }
  
      ammount.innerText = "#"+Number(total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
      min.innerText = totalMin+"min" 
      orderInfo.totalamount = Number(total)
      orderInfo.totaltime = totalMin


          if (orderInfo.items.length < 1) {
            var child = tbodyy.lastElementChild; 
            while (child) {
              tbodyy.removeChild(child);
                child = tbodyy.lastElementChild;
            }

            let Thtml = `<tr>
                      
                      <th colspan="7" class=' text-center' style="color:#02679a;">NO ITEM LISTED</th>              
                  </tr>`
            tbodyy.innerHTML = Thtml
          }else{
            displayHtml(orderInfo.items,tbodyy)
          }
    }

  function LoadingDisplay(status,ele){
    chkInternetStatus()
    if (status == "fail") {
      var child = ele.lastElementChild; 
        while (child) {
            ele.removeChild(child);
            child = ele.lastElementChild;
        }

        ele.innerText = "Making Order...";
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
        
        ele.innerText = "Make Order";
        let newI = document.createElement("i");
        newI.classList.add("ti-shopping-cart");
        newI.classList.add("btn-icon-append");

        ele.appendChild(newI);
    }
  }
    function submitOrder(btn){
      chkInternetStatus()
      let tbodyy = document.querySelector(".tbodyy"); 
      LoadingDisplay("fail",btn)      
      let mydata = JSON.stringify({ "orderData":orderInfo })
      fetch("../../Controller/orderController.php", {
      method: 'POST',
      body: mydata,
      headers: {"Content-Type": "application/json; charset=utf-8"}
      }).then(res=>res.json()).then(function(data){
    
        if(data.status == "success"){
          LoadingDisplay(data.status,btn)
  
          window.location = window.location.origin+"/rampp/View/RecordSales/recordSales.php?msg=Successful";
        }else{
      
          window.location = window.location.origin+"/rampp/View/RecordSales/recordSales.php?fail=Error"+data.msg;
          
        }
  
      }).catch(err=>{
        if (err) {
          LoadingDisplay("problem",btn)
          window.location = window.location.origin+"/rampp/View/RecordSales/recordSales.php?fail=Error"+err;
          // alert("Error:"+err)
        }
      })
   }
    
 function getPValue(pid) {
  
  let mUnit = document.querySelector(".mUnit"); 
  let mydata = JSON.stringify({ "productId":pid.value})
        fetch("../../Utils/getOderingUnit.php",{
        method: 'POST',
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {
          // console.log(data[0][0].oderingunit?data[0][0].oderingunit:NaN)
          mUnit.value =data[0][0].oderingunit?data[0][0].oderingunit:NaN
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