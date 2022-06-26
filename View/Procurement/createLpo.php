<?php
   session_start();
   if(isset($_SESSION['validuser']))
   {
     include("../partials/_header.php");
     $title = "Home";
     $nav = "";
     include("../../Utils/sidebarUtils.php");
      
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
                  <h4 class="font-weight-bold mb-0">Create LPO (LOCAL PURCHASE ORDER)</h4>
                </div>
                <!-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> -->
              </div>
            </div>
          </div>
          
         <!--BODY -->
         <div class="row">
         <div class="col-12 grid-margin ">
              <div class="" >
                <div class="">
                  <h4 class="card-title"></h4>
                                        <?php
                        srand ((double) microtime() * 1000000);
                        $random3 = rand(1000,9999);
                        ?>

                
                  <div class="forms-sample">

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">LpoNo</label>
                                <input readonly name="lpono" type="text" class="form-control Lno" id="exampleInputUsername1" value="<?php echo $random3; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">RegNo</label>
                                <input readonly name="reqno"  type="text" class="form-control Rno" id="exampleInputUsername1"
                                 value="<?php  echo $_REQUEST["reqno"] ?>" disabled>
                            </div>
                        </div>                   
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Date</label>
                              <input name="date" type="date" class="form-control date" id="exampleInputUsername1" value="<?php echo date('Y-m-d');?>">
                          </div>    
                           
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Vendor</label>
                              <input readonly type="text" class="form-control venname" id="exampleInputUsername1" disabled>
                          </div>    
                        </div>
                      
                    </div>
                        <br>
                        <br>
                    <div class="table-responsive">
                        <table id="customers">
                            <tr>
                                <th class=" text-left" >S/N</th>
                                <th class=" text-left" >Product Name</th>
                                <th class=" text-left" >Description</th>
                                <th class=" text-left" >Quantity</th>
                                <th class=" text-left" >Unit Price</th>
                                <th class=" text-left" >Total</th>
                            </tr>
                            <tbody id="tbodyy">
                                <tr>
                                  <tr>                    
                                    <th class=' text-center' style="color:#02679a;" colspan="8">NO ITEM LISTED</th>                  
                                  </tr>
                                </tr>                   
                            </tbody>            
                            <tfooter>     
                              <tr>
                                <th colspan="4"></th>
                                  <th class="text-right" style="color:#02679a;">Total</th>                                    
                                  <th id="total">#0.00</th>                             
                              </tr>                        
                            </tfooter>
                        </table>
                    </div>
                        <br>
                        <br>
                        
                    <div class="form-group row">
                        <div class="col-sm-2">
                        <div class="form-group">
                              <label for="exampleInputUsername1">Discount % </label>
                              <input name="dis" type="number" class="form-control desc" id="exampleInputUsername1" onChange="changeDisc(this)">
                          </div>
                         
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Disc Value</label>
                            <input name="amountword" type="number" class="form-control descval" id="exampleInputUsername1" value="0">
                          </div> 
                        </div>                     
                        <div class="col-sm-2">
                            <label for="exampleFormControlSelect1">Add Vat(Required)</label>
                            <select name="vat" class="form-control form-control-sm vat" id="exampleFormControlSelect1" onChange="changeVat(this)">
                              <option value="No" selected>No</option> 
                                <option value="Yes">Yes</option>
                            </select>                       
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Vat Value</label>
                            <input name="amountword" type="number" class="form-control vatval" id="exampleInputUsername1" value="0">
                          </div> 
                        </div>                     
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Amount In Words</label>
                              <input name="amunt" type="text" class="form-control words" id="exampleInputUsername1">
                            </div>
                        </div>
                    </div>
                    <button name="submitF" type="submit" class="btn btn-primary me-2" style="background:#02679a;color:white;" onClick="loading11(this)">Create</button>
                    <button class="btn btn-light">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
         </div>

         <!--BODY -->
           
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
<!-- SCRIPT -->
<script>

          // next


// let reqno = document.querySelector(".Rno"); 
// let lno = document.querySelector(".Lno"); 
// let date = document.querySelector(".date"); 
// let amountWords = document.querySelector(".words"); 
// let vat = document.querySelector(".vat");
// let descountvalue = document.querySelector(".descval"); 
// let descount = document.querySelector(".desc"); 


let par = new URLSearchParams(window.location.search)
if (par.has("id")&& par.has("reqno")) {
        let vatvalue = document.querySelector(".vatval");  
        let vat = document.querySelector(".vat");  
        let grandTotal = document.querySelector("#total"); 
        let vname = document.querySelector(".venname"); 
        let tbodyy = document.querySelector("#tbodyy"); 
        let mydata = JSON.stringify({ "pRegNo":par.get("reqno"),"venid":par.get("id") })
        fetch("../../Utils/getChipItemUtils.php", {
        method: 'PUT',
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {

            // console.log("res",data)
            vname.value = data[0].venname

            let child = tbodyy.lastElementChild; 
            while (child) {
                tbodyy.removeChild(child);
                child = tbodyy.lastElementChild;
            }

            let totalar = []

            data.forEach(function(item,ind) {
                totalar.push(Number(item.vendorUnitPrice) * Number(item.itemQuantity))
                let list = document.createElement("tr");

                list.innerHTML = `
                
                    <td class=" text-left" >${ind+1}</td>
                    <td class=" text-left" >${item.itemName}</td>
                    <td class=" text-left" >${item.itemDescription}</td>
                    <td class=" text-left" >${item.itemQuantity}</td>   
                    <td class=" text-left" >#${Number(item.vendorUnitPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                    <td class=" text-left" >#${(Number(item.vendorUnitPrice) * Number(item.itemQuantity)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>                    
                `;
                tbodyy.appendChild(list);
            })
            grandTotal.setAttribute("ammount",totalar.reduce((a,b)=>a+b,0))
            let fivePercentAdded = vat.value == "Yes"?(5/100) * totalar.reduce((a,b)=>a+b,0):0
            vatvalue.value =  fivePercentAdded
            grandTotal.innerHTML = "#"+totalar.reduce((a,b)=>a+b,0).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')



        }).catch(err=>{
            if (err) {
                alert("Error:"+err)
                console.log("error",err)
            
            }
        })
    }

    function changeVat(params) {
        console.log(params.value)
        let grandTotal = document.querySelector("#total"); 
        let vatvalue = document.querySelector(".vatval");  
        let totalvalue = Number(grandTotal.getAttribute("ammount"))

        if (params.value == "Yes") {
            let fivePercentAdded = (5/100) * totalvalue
            vatvalue.value = fivePercentAdded
            let vatPrice = fivePercentAdded+totalvalue
            grandTotal.innerHTML =  "#"+vatPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
            grandTotal.setAttribute("ammount",vatPrice)
        } else {
          let vatPrice2 = totalvalue - Number(vatvalue.value)
          vatvalue.value = 0
          grandTotal.setAttribute("ammount",vatPrice2)
          grandTotal.innerHTML =  "#"+vatPrice2.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
        }
    }

    function changeDisc(params) {
        console.log(params.value)
        let grandTotal = document.querySelector("#total"); 
        let discountValue = document.querySelector(".descval");
        let totalValue = Number(grandTotal.getAttribute("ammount"))

        if (params.value) {

          let discount = (Number(params.value)/100) * totalValue
          discountValue.value = discount
          let discountedValue = totalValue - discount
          grandTotal.setAttribute("ammount",discountedValue)       
          grandTotal.innerHTML =  "#"+discountedValue.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')

        } else if(params.value == ""){

          let discountedValue2 = totalValue + Number(discountValue.value)
          discountValue.value = 0
          grandTotal.setAttribute("ammount",discountedValue2)       
          grandTotal.innerHTML =  "#"+discountedValue2.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')     
        }

    }


    function loading11(par) {

        // let reqno1 = document.querySelector(".reqno"); 

        var child = par.lastElementChild; 
        while (child) {
            par.removeChild(child);
            child = par.lastElementChild;
        }

        par.innerText = "Creating LPO...";
        let newSpan = document.createElement("span");
        newSpan.classList.add("spinner-border");
        newSpan.classList.add("spinner-border-sm");

        par.appendChild(newSpan);
 
        let par1 = new URLSearchParams(window.location.search)
        let reqno = document.querySelector(".Rno"); 
        let lno = document.querySelector(".Lno"); 
        let date = document.querySelector(".date"); 
        let amountWords = document.querySelector(".words"); 
        let vatvalue = document.querySelector(".vatval");  
        let vat = document.querySelector(".vat");
        let descountvalue = document.querySelector(".descval"); 
      
        let grandTotal = document.querySelector("#total"); 
        let vname = document.querySelector(".venname"); 
        let descount = document.querySelector(".desc"); 
        // let ele3 = document.querySelector(".venI"); 

        let mainData = {
            discount:descountvalue.value == ""?0:descountvalue.value,
            vat:vatvalue.value == ""?0:vatvalue.value,
            grandTotal:Number(grandTotal.getAttribute("ammount")),
            lpocreated:"Yes",
            purchaseId:reqno.value,
            amountWords:amountWords.value,
            lpono:lno.value,
            vendorId:par1.get("id"),
            lpodate:date.value,
            disc:descount.value,
            vt:vat.value == "Yes"?5:0
        }

        let mydata = JSON.stringify({ "data":mainData})
        fetch("../../Controller/lpoController.php", {
        method: 'PUT',
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {
            // console.log(data)
            // status"=>"success","message"
            if (data.status == "success") {
              window.location = window.location.origin+"/Rampp/View/Procurement/lpocreate.php?msg="+data.message;
            }else{
              window.location = window.location.origin+"/Rampp/View/Procurement/lpocreate.php?fail="+data.message;
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