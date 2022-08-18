<?php
   session_start();
   if(isset($_SESSION['validuser']))
   {
     include("../partials/_header.php");
     $title = "Home";
     $nav = "";
     require("../../Controller/generalController.php");
     include("../../Utils/sidebarUtils.php");
     include("../../Env/env.php");
      require("../../Connection/dbConnection.php");
    
     
      $conn = conString1();
     $UserUtils = new GeneralController();
      
?>
<!-- HEADER -->
<style>
#customers {
  font-family: "Roboto", sans-serif;
  font-size:16px;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border:none;
  padding: 8px;

}
#customers td{
  font-size:0.875rem;
  color:#212529;
  border-top: 1px solid #dee2e6;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  border-top: 0;
  border-bottom-width: 1px;
  font-weight: bold;
  font-size:13.2px;
  /* background-color: #248afd; */
  /* color: white; */
}
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
                  <h4 class="font-weight-bold mb-0 card-title">Create Purchase Requisition</h4>
                </div>
                <!-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> -->
              </div>
            </div>
          </div>
          <?php
            // srand ((double) microtime() * 1000000);
            $random3 = rand(1000,9999);
            ?>
         <!--BODY -->
         <div class="row">
           <div class="container">
           <div class="d-flex justify-content-center align-items-center" >
                      <div style="width:90%; height:auto">
                        <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Requisition Number</label>
                        <div class="col-sm-9">
                          <input readonly type="number" class="form-control regn" id="exampleInputUsername2" value="<?php echo $UserUtils->getrqNo($conn); ?>">
                        </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">from</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control from" id="exampleInputEmail2" value="<?php echo $_SESSION['firstName']." ".$_SESSION['lastName'] ?>" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputMobile" class="col-sm-3 col-form-label">Subject</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control sub" id="exampleInputMobile" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputMobile" class="col-sm-3 col-form-label">Date</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control date2" id="exampleInputMobile" value="<?php echo date('Y-m-d');?>">
                          </div>
                        </div>
                      </div>
                    </div>
                     

                    <div class="form-group row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="exampleInputUsername1">Item Name</label>
                            <input type="text" class="form-control form-control iname" >
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Description</label>
                              <textarea class="form-control desc" id="exampleTextarea1" rows="1"></textarea>
                                <!-- <input type="text" class="form-control form-control-lg" > -->
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="exampleInputUsername1">UM</label>
                                <input type="text" class="form-control form-control um" >
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Qty</label>
                                <input type="number" class="form-control form-control qty" >
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Unit Price</label>
                                <input type="number" class="form-control form-control upay" >
                            </div>
                        </div>
    
    
                        <div class="col-sm-2">
                          <div class="d-flex justify-item-center align-item-center" >
                            <button type="submit" class= "btn  text-white btn-block " style="margin-top: 34px;background-color: #02679a;" id="add" onClick="addItem(this)">
                              Add
                            </button>                                                                               
                          </div>
                        </div>                                         
                    </div>
                    <div class="table-responsive">
                      <table id="customers">
                        <thead>
                      <tr>
                          <th class=" text-center" width="5%" >S/N</th>
                          <th class=" text-left" width="20%">Product Name</th>
                          <th class=" text-left" width="30%">Description</th>
                          <th class=" text-center" width="5%">UM</th>
                          <th class=" text-left" width="10%">Unit Price</th>
                          <th class=" text-center" width="10%">Quantity</th>
                          <th class=" text-left" width="10%">Sub Total</th>
                          <th class=" text-left" width="10%">Action</th>
                      </tr>
                      </thead>
                      <tbody id="tbodyy">
                        <tr>                    
                          <th class=' text-center' style="color:#02679a;" colspan="8">NO ITEM LISTED</th>                  
                        </tr>                 
                      </tbody>
                        <tfooter>     

                        <tr>
                            <th colspan="5"></th>
                            <th class="text-right" style="color:#02679a;">Total</th>                                    
                            <th id="total">#0.00</th>
                            <th></th>
                        </tr>
                          
                      </tr>
                    </tfooter>
                      </table>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleTextarea1">Summary</label>
                      <textarea class="form-control summ" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <br/>
                    <br/>
                    
                    <tfooter>
                    <button type="button" class="btn  btn-icon-text btn-block  text-white" id="sub" style="background-color: #02679a;" onClick="submitRequisition(this)">
                      <i class="ti-save btn-icon-append"></i>                          
                      Save
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
                <div class="toast-body ">
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
                        echo $_REQUEST["msg"]."...";                                                    
                  ?>
                  <br>
                  <p class="text-light">Do you want to create new requisition?</p>
                  <button type="button" class="btn"style="background-color:#86c93975" onClick="yesFunc(this)">Yes</button>
                  <button type="button" class="btn btn-light" onClick="noFunc(this)">No</button>               
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
            </div>
          </div>   
          <?php
              }              
            ?>  
        

         <!--BODY -->
          
          <!-- <script src="../../www/js/reqstate.js"></script> -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- FOOTER -->
        <!-- partial -->
      </div>

      <!-- main-panel ends -->
<?php
 include("../partials/_script.php");
?>

  <script>

    let eachData = {
    "RequisitionNumber":"",
    "from": "",
    "Subject":"",
    "Date":"",
    "item":[],
    "Summary": "",
    "Total":0
    }

    // dependencies
  function LoadingDisplay(status,ele){
    if (status == "fail") {
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
      
    }else{

      var child = ele.lastElementChild; 
        while (child) {
            ele.removeChild(child);
            child = ele.lastElementChild;
        }
        
        ele.innerText = "Save";
        let newI = document.createElement("i");
        newI.classList.add("ti-save");
        newI.classList.add("btn-icon-append");

        ele.appendChild(newI);
    }
  }

      // next
    function displayHtml(obj,ele){

        let child = ele.lastElementChild; 
        while (child) {
          ele.removeChild(child);
            child = ele.lastElementChild;
        }

        obj.item.forEach(function(item,ind) {

          let list = document.createElement("tr");

          list.innerHTML = `
           
              <td class=" text-center" >${ind+1}</td>
              <td class=" text-left" >${item.ItemName}</td>
              <td class=" text-left" >${item.Description}</td>
              <td class=" text-center" >${item.um}</td>
              <td class=" text-left" >#${Number(item.UnitPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                      
              <td class=" text-center" >${item.Qty}</td>   
              <td class=" text-left" >#${Number(item.SubTotal).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                    
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
                <td></td>
                <td></td>
                <th class=' text-center' style="color:#02679a;">NO ITEM LISTED</th>
                <td></td>
                <td></td>
                <td></td>
                </tr>`
        ele.innerHTML = Thtml
      }

      ele2.innerText = "#"+Number("0").toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
    }
// End dependencies

    function addItem(btn) {
     
      // btn.addEventListener("click",(e)=>{

        let ItemName = document.querySelector(".iname"); 
        let Description = document.querySelector(".desc"); 
        let Qty = document.querySelector(".qty"); 
        let UnitPrice = document.querySelector(".upay"); 
        let SubTotal = document.querySelector(".subtot");
        let tbodyEle = document.querySelector("#tbodyy"); 
        let Maintotal = document.querySelector("#total"); 
        let RequisitionNumber1 = document.querySelector(".regn");  
        let um = document.querySelector(".um");  
        
        if(ItemName.value == "" || Description.value == "" || UnitPrice.value == "" || Qty.value == ""){
        // alert("please confirm your input")
        window.location = window.location.origin+"/Rampp/View/purchaseRequisition/createpRequisition.php?fail=Warning: please confirm your input";

        
      }else{
        console.log("I AM CLICKED")
        var child = tbodyy.lastElementChild; 
        while (child) {
        tbodyy.removeChild(child);
            child = tbodyy.lastElementChild;
        }

        let subIsem = {
          reqNo:RequisitionNumber1.value,
          ItemName:ItemName.value,
          Description:Description.value,
          um:um.value,
          UnitPrice:UnitPrice.value,
          Qty:Qty.value,
          SubTotal:parseFloat(Number(UnitPrice.value * Qty.value).toFixed(2))
        }

        eachData.item.push(subIsem)
        displayHtml(eachData,tbodyEle)

        let total = 0
        for (let items = 0; items < eachData.item.length; items++) {
          total+= eachData.item[items].SubTotal;
        }
        Maintotal.innerText = "#"+Number(total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
        eachData.Total =  parseFloat(Number(total).toFixed(2) ) 

        // clear inputs
        ItemName.value = "";
        Description.value = "";
        um.value = "";
        UnitPrice.value = "";
        Qty.value = "";

      }

      // })
    }
    function submitRequisition(btn){
      // btn.addEventListener("click",(e)=>{
      
        let RequisitionNumber2 = document.querySelector(".regn"); 
        let from2 = document.querySelector(".from"); 
        let Subject2 = document.querySelector(".sub"); 
        let Date2 = document.querySelector(".date2"); 
        let Summary2 = document.querySelector(".summ");  
       
        let tbodyEle = document.querySelector("#tbodyy");
        let Maintotal = document.querySelector("#total"); 
        let tostSucmsg = document.querySelector("#tbs")
        let tostFamsg = document.querySelector("#tbf")
        var tostFa = document.querySelector("#fai1")
        var tostSuc = document.querySelector("#succ1")
        if(from2.value == "" || Subject2.value == "" || Date2.value == "" || Summary2.value == "" || RequisitionNumber2.value == ""){
        
          // alert("plese confirm your input")  
          window.location = window.location.origin+"/Rampp/View/purchaseRequisition/createpRequisition.php?fail=Warning: please confirm your input";
   
        }else{
      
            LoadingDisplay("fail",btn)
            eachData.RequisitionNumber = RequisitionNumber2.value
            eachData.from = from2.value
            eachData.Subject = Subject2.value
            eachData.Date = Date2.value
            eachData.Summary = Summary2.value      
        

            let mydata = JSON.stringify({ "requisitionData":eachData })
            fetch("../../Controller/purchaseRequisitionController.php", {
            method: 'POST',
            body: mydata,
            headers: {"Content-Type": "application/json; charset=utf-8"}
            }).then(res=>res.json()).then(function(data) {
              if(data.status == "success"){
                LoadingDisplay(data.status,btn)
                RequisitionNumber2.value = "";
                from2.value = "";
                Subject2.value = "";
                Date2.value = "";
                Summary2.value = "";
          

                clearItenListAndElements(tbodyEle,Maintotal)
                window.location = window.location.origin+"/Rampp/View/purchaseRequisition/createpRequisition.php?msg=Successful";
              }else{
                // console.log("response",data.msg)
                clearItenListAndElements(tbodyEle,Maintotal)
                window.location = window.location.origin+"/Rampp/View/purchaseRequisition/createpRequisition.php?fail=Error"+data.msg;
               
              }
              console.log("respones",data)
            }).catch(err=>{
              if (err) {
                LoadingDisplay("problem",btn)
                window.location = window.location.origin+"/Rampp/View/purchaseRequisition/createpRequisition.php?fail=Error"+err;
                // alert("Error:"+err)
              }
            })

         

        }
    
    }
    
    function remove(index){
      let Maintotal = document.querySelector("#total"); 
      let tbodyEle = document.querySelector("#tbodyy");
      eachData.item.splice(index,1)
      let total = 0
      for (let items = 0; items < eachData.item.length; items++) {
        total+= eachData.item[items].SubTotal;
        
      }

      Maintotal.innerText = "#"+Number(total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
      eachData.Total = total

          if (eachData.item.length < 1) {
            var child = tbodyEle.lastElementChild; 
            while (child) {
              tbodyEle.removeChild(child);
                child = tbodyEle.lastElementChild;
            }

            let Thtml = `<tr>
                      <td></td>
                      <td></td>
                      <th class=' text-center' style="color:#02679a;">NO ITEM LISTED</th>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>`
            tbodyEle.innerHTML = Thtml
          }else{
            displayHtml(eachData,tbodyEle)
          }
    }

    function noFunc(par) {
      window.location = window.location.origin+"/Rampp/View/purchaseRequisition/viewDeletepRequisition.php";
    }
function yesFunc(par){
  window.location = window.location.origin+"/Rampp/View/purchaseRequisition/createpRequisition.php";
}
      </script>
    </div> <!-- end of side nav -->
    <!-- page-body-wrapper ends -->

  </div>
  <!-- container-scroller -->

<!-- SCRIPT -->

  
  
<?php 

 }
 else
 {
     header("Location: ../../index.php?message=loginNot");
     exit;
 }
?>