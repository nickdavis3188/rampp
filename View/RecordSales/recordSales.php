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
    $staffTag = $_SESSION['id'] ;
    $ordernon= $UserUtils->getNonResolvedOrder($conn,$staffTag);
    $location= $UserUtils->getLocation($conn);

  
    
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
          <div>
            <h4 class="font-weight-bold mb-0">Place Sale</h4>
          </div>
          <br><br>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <!-- <div class="d-flex justify-content-start align-items-center"> -->
                <div class="form-group row" >
                  <div class="col-md-6">
                    <label for="exampleFormControlSelect1">Sales Location</label>
                      <select style="margin-bottom: 4px;" class="form-control form-control-lg loc" id="exampleFormControlSelect1" onchange="getLValue(this,'<?php echo $orderId ?>')">
                      <option value="">__SELECT_LOCATION__</option>
                        <?php                           
                          foreach ($location as $index => $value) {                         
                        ?>
                        <option value="<?php echo $value['salesLocationName']?>"><?php echo $value['salesLocationName']?></option>
                        <?php
                          }
                        ?>
                    
                      </select>
                    </div>
                    <hr>
                    <div class="bb">
                      <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="ti-alert btn-icon-prepend" style="font-size:27px"></i>
                        <div style="padding-left:10px;">
                          Select sales location above to tide an order to it.
                        </div>
                      </div>
                    </div>
                    <script>
                      function getLValue(ele,orderId) {
                        let bb = document.querySelector(".bb"); 
                        if (ele.value == "") {
                          let child = bb.lastElementChild; 
                          while (child) {
                            bb.removeChild(child);
                              child = bb.lastElementChild;
                          }
                          bb.innerHTML = `
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                              <i class="ti-alert btn-icon-prepend" style="font-size:27px"></i>
                              <div style="padding-left:10px;">
                                Select sales location above to tide an order to it.
                              </div>
                            </div>
                          `
                        }else{
                          bb.innerHTML =`
                            <b><p style="color: #02679a;">Order ${orderId} will be sent to location <label style="background-color:red;height: 20px;padding-top: 0;" class='badge badge-secondary'>${ele.value}</label> </p></b> 
                          `
                        }

                      }
                    </script>
                  </div>
                <!-- </div> -->
            </div>
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">

                <div>
                  <h4 class="font-weight-bold mb-0 text-primary"><?php echo "OD_".$orderId ?></h4>
                </div>
                <div class="nn">
                  <div >
                    <input class="form-control form-control-sm nc" id="exampleFormControlSelect1" type="text" placeholder="customer identity">
                  </div>
                </div>
                <div>
                   <!-- Default switch -->
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input exord" id="customSwitches" onchange="existOrder(this)">
                    <label class="custom-control-label" for="customSwitches">Existing Order</label>
                  </div>
                </div>
                <div class="dd d-none">
                  <select style="width: 99px;" name="pname" class="form-control form-control-md orr" id="exampleFormControlSelect1" onchange="getPValue(this)">
                  <option value="">_select_</option>
                        <?php                         
                          foreach ($ordernon as $index => $value) {                                                 
                        ?>
                        <option value="<?php echo $value['customerId']?>"><?php echo $value['customerName']?></option>
                        <?php
                          }
                        ?>
                  </select>
                </div>
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
                <input hidden type="text" class="uName" value="<?php echo $_SESSION['firstName']." ".$_SESSION['lastName'] ?>">
                <input hidden type="date" class="datee" value="<?php echo date('Y-m-d');?>">
                <div class="form-group row">
                    <div class="col-md-3">
                    <label for="exampleFormControlSelect1">Select Product</label>
                      <select name="pname" class="form-control form-control-lg pname" id="exampleFormControlSelect1" onchange="getPValue(this)">
                      <option value="">__SELECT_ITEM__</option>
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
                  <div class="form-group row">
                    <div class="col-sm-6">                            
                        <div class="form-check">
                          <label class="form-check-label" style="background:#9a025d;color:white;margin-top: 70px;">
                            <input value="2" name="salable" type="checkbox" class="form-check-input isBar"  style="background:#02679a;color:white;" onchange="barD(this)">
                            Bar Description
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-6 d-none bds">
                        <div class="form-group">
                          <label for="exampleTextarea1">Description</label>
                          <textarea class="form-control barDisc" id="exampleTextarea1" rows="4"></textarea>
                        </div>              
                    </div>
                  </div>
                  <script>
                      function barD(inp){
                        if (inp.checked) {
                          let saleableOption = document.querySelectorAll(".bds"); 
                          saleableOption.forEach((v)=>v.classList.remove("d-none"))

                        }else{
                          let saleableOption = document.querySelectorAll(".bds"); 
                          saleableOption.forEach((b)=>b.classList.add("d-none"))
                        }
                      }

                  </script>
                  <div class="form-group row">
                    <div class="col-sm-6">                            
                        <div class="form-check">
                          <label class="form-check-label" style="background:#045e72de;color:white;margin-top: 70px;">
                            <input value="2" name="salable" type="checkbox" class="form-check-input isKitchen"  style="background:#02679a;color:white;" onchange="kitchenD(this)">
                            Kitchen Description
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-6 kds d-none">
                        <div class="form-group">
                          <label for="exampleTextarea1">Description</label>
                          <textarea class="form-control kitchenDic" id="exampleTextarea1" rows="4"></textarea>
                        </div>    
                    </div>
                  </div>
                  <script>
                      function kitchenD(inp){
                        if (inp.checked) {
                          let saleableOption = document.querySelectorAll(".kds"); 
                          saleableOption.forEach((v)=>v.classList.remove("d-none"))

                        }else{
                          let saleableOption = document.querySelectorAll(".kds"); 
                          saleableOption.forEach((b)=>b.classList.add("d-none"))
                        }
                      }
                  </script>
                </tfooter>
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
    "locationName":"",
    "hasBarDesc":0,
    "hasKitchen":0,
    "barDesc":"",
    "kitchenDesc":"",
    "serviceCharge":0,
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
  let uName = document.querySelector(".uName"); 
  let datee = document.querySelector(".datee"); 

  let loc = document.querySelector(".loc"); 
  let kitchenDic = document.querySelector(".kitchenDic"); 
  let barDisc = document.querySelector(".barDisc"); 
  let isBar = document.querySelector(".isBar"); 
  let isKitchen = document.querySelector(".isKitchen"); 

  chkInternetStatus()
  if(pname.value == "" || Qty.value == ""){
    alert("please confirm your input")  
  }else{
    if (loc.value == "") {
      alert("Sales Location Not Selected")
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
             sellingprice:data.data[0].sellingprice,
             unitOfMeasure:unit.value,
             locationName:loc.value,
             salesperson:uName.value
            
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
  function checkInput(  loc,
                        isBar,
                        barDisc,
                        isKitchen,
                        kitchenDic) {
    let errText = "";
    if (loc.value == "") {
        errText = "Location Not Selected";
    }else if(isBar.checked && barDisc.value == ""){
      errText = "Bar description is required";
    }else if(isKitchen.checked && kitchenDic.value == ""){
      errText = "Kitchen description is required";
    }else{
      errText = "";
    }
    return errText;
  }

    function submitOrder(btn){
      chkInternetStatus()
      let tbodyy = document.querySelector(".tbodyy");                          
      let exord = document.querySelector(".exord");                          
      let orr = document.querySelector(".orr"); 
      let nc = document.querySelector(".nc"); 

      let loc = document.querySelector(".loc"); 
      let kitchenDic = document.querySelector(".kitchenDic"); 
      let barDisc = document.querySelector(".barDisc"); 
      let isBar = document.querySelector(".isBar"); 
      let isKitchen = document.querySelector(".isKitchen"); 
      
      orderInfo.hasBarDesc = isBar.checked?1:0;
      orderInfo.hasKitchen = isKitchen.checked?1:0;
      orderInfo.barDesc = isBar.checked?barDisc.value:"";
      orderInfo.kitchenDesc = isKitchen.checked?kitchenDic.value:"";
      orderInfo.locationName = loc.value;
      let fivePecent = 0.05;
      let fivePercentOfTotal = orderInfo.totalamount * fivePecent;
      orderInfo.serviceCharge = loc.value == "Reception 1"||loc.value == "Reception 2"?fivePercentOfTotal:0;

      if (exord.checked) {
        if(orr.value == ""){
          alert("Order Id Not Selected")
        }else{
        let cc =  checkInput(  loc,
                        isBar,
                        barDisc,
                        isKitchen,
                        kitchenDic);
          if (cc == "") {
            LoadingDisplay("fail",btn)      
            let mydata = JSON.stringify({ "orderData":orderInfo,"ord":Number(orr.value)})
            fetch("../../Utils/moreOrder.php", {
            method: 'POST',
            body: mydata,
            headers: {"Content-Type": "application/json; charset=utf-8"}
            }).then(res=>res.json()).then(function(data){
              console.log(data)
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
            
          }else{
            alert(cc)
          }
        }
        
      } else {
        if (nc.value == "") {
          alert("New customer identity not set")
        }else{
          let dd = checkInput(  loc,
                        isBar,
                        barDisc,
                        isKitchen,
                        kitchenDic) ;
          if (dd == "") {
            LoadingDisplay("fail",btn)      
            let mydata = JSON.stringify({ "orderData":orderInfo,"cn":nc.value })
            fetch("../../Controller/orderController.php", {
            method: 'POST',
            body: mydata,
            headers: {"Content-Type": "application/json; charset=utf-8"}
            }).then(res=>res.json()).then(function(data){
              console.log(data)
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
            
          }else{
            alert(dd)
          }

        }
        
      }
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

 function existOrder(inp){
    if (inp.checked) {
      // console.log("Yes")
      // console.log(inp.checked)
      let saleableOption = document.querySelectorAll(".dd"); 
      let newCustomerDiv = document.querySelectorAll(".nn"); 

      newCustomerDiv.forEach((v)=>v.classList.add("d-none"))
      saleableOption.forEach((v)=>v.classList.remove("d-none"))

      console.log(saleableOption)
      // saleableOption.classList.remove("d-none")
    }else{
      // console.log("No")
      let saleableOption = document.querySelectorAll(".dd"); 
      let newCustomerDiv = document.querySelectorAll(".nn"); 

      saleableOption.forEach((b)=>b.classList.add("d-none"))
      newCustomerDiv.forEach((v)=>v.classList.remove("d-none"))
      console.log(saleableOption)
      // saleableOption.classList.add("d-none")
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