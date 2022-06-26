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
    
      $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
      $conn->connect();

      $UserUtils = new GeneralController();
      $data1 = $UserUtils-> getAllManUnApproveP();
    
?>
<!-- HEADER -->

<style>
/* Style The Dropdown Button */
table, th, td {
    border: 1px solid;
    }

</style>

<style>
table {
  table-layout: fixed;
  width: 150px;
  border: 1px solid black;
}

td, th{
  border: 1px solid black;
  overflow: hidden; 
  max-width: 100px;
  white-space: nowrap;
  text-overflow: ellipsis; 
  padding: 10px 15px;
  vertical-align: middle;
   
}




/* hsguh */

.table-responsive table{
        border-collapse: collapse;
        border-spacing: 0;
        padding: 0;
        width: 100%;
        max-width: 100%;
        margin: 0 auto 20px auto;
    }

    .table-responsive {
        overflow-x: auto;
        min-height: 0.01%;
        margin-bottom: 20px;
    }

    .table-responsive::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }
    .table-responsive::-webkit-scrollbar-thumb {
        background: #dddddd;
        border-radius: 2px;
    }
    .table-responsive::-webkit-scrollbar-track-piece {
        background: #fff;
    }

    @media (max-width: 992px) {
        .table-responsive table{
            width: auto!important;
            margin:0 auto 15px auto!important;
        }
    }

    @media screen and (max-width: 767px) {
        .table-responsive {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }
        .table-responsive::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

    }

 
/* hsguh */
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
                  <h4 class="font-weight-bold mb-0">Comparative Table</h4>
                </div>
            
              </div>
            </div>
          </div>
          
            <!--BODYtable-striped -->
      
          <br/>


          <div class="container-flued">
            <!-- <div class="container"> -->
                 <!-- body -->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <hp class="font-weight-bold mb-0">.</hp>
                  </div>
                  <div>
                      <a class="btn btn-primary btn-icon-text btn-rounded prt" style="background:#02679a;color:white;" onClick="printP(this)">
                        <i class="ti-printer btn-icon-prepend"></i>Print
                      </a>
                  </div>
                </div>
              </div>
            </div>
                <!-- body -->
            <!-- body -->
            <div class="table-responsive pt-3">
            <table class="table ">
                <tbody>
                
                <!-- head -->
                <tr>
                    <td rowspan="2" colspan="5">
                    <div class="row">
                      
                        <div class="col-12">
                        <h5 style="color:#02679a;font-size:25px">Comparative Table</h5>
                        <div>
                    </div>
                    </td>                      
                                           
                </tr>
                <tr>                    
                
                </tr>
                <!--End head -->
                
                <tr>
                    <td colspan="3">
                    <div class="row">
                        <div class="col-3"><span style="color: #02679a;">Request Id: </span>&nbsp;&nbsp;&nbsp; <span class="reqid"> </span></div>
                      
                    </div>                                      
                    </td>
                    <td colspan="2">
                    <div class="row">
                        <div class="col-3"><span style="color: #02679a;"> Request Name: </span>&nbsp;&nbsp;&nbsp; <span class="for"> </span></div>
                  
                    </div>  
                    </td>
                </tr>
                          
                </tbody>
            </table>
            <div class="table-responsive pt-3">
              <table class="table" id="customers" >
                  <tr>
                      <th class="text-center"  ><span style="color: #02679a;"> Items Details</span></th>
                      <th class="text-center"  ><span style="color: #02679a;">Vendors Involve</span></th>
                      <th class="text-center"  ><span style="color: #02679a;">Cheapest Option</span></th>
                    
                  </tr>
                  <tr>
                      <td>
                          <table class="table">
                              <tr>
                                  <th class="th">Item Name</th>
                                  <th class="th">Desc</th>
                                  <th class="th">Qty</th>
                                  <th class="th">UM</th>
                              </tr>
                              <tbody class="itbod">
                             

                              </tbody>
                          </table>
                      </td>
                      <td>
                          <table class="table">
                            <thead class="hed">
                           
                            </thead>
                            <tbody class="bod">
                             
                            </tbody>
                          </table>
                      </td>
                      <td>
                          <table class="table">
                              <tr>
                                  <th class="th">Unit Price</th>
                                  <th class="th">Total</th>
                                  <th class="th">Vendor</th>
                              </tr>
                              <tbody class="chipbody">
                             
                              </tbody>
                              
                          </table>
                      </td>
                  </tr>
              
              </table>
            </div>
          </div>
        
            <br>
            <br>
      
        <!-- </div> -->
          </div>
          <br/>
            
          <br/>
   

            <!-- Modal -->

            <!-- Modal -->
          
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

    let par = new URLSearchParams(window.location.search)
    if (par.has("reqno")) {
        let reqno = document.querySelector(".reqid"); 
        let subj = document.querySelector(".for"); 
        let hed = document.querySelector(".hed"); 
      let bod = document.querySelector(".bod"); 
      let chipbody = document.querySelector(".chipbody"); 
    let tbodyy = document.querySelector(".itbod");

     
        
        let mydata = JSON.stringify({"pRegNo":par.get("reqno")})
        fetch("../../Utils/getAllVendorQuoteUtills.php", {
        method: 'POST',
        body: mydata,
        headers: {"Content-Type": "application/json; charset=utf-8"}
        }).then(res=>res.json()).then(function(data) {

          reqno.innerText = data[0].preqno
          subj.innerText = data[0].subject



         
          let vvdata = []
          data[1].forEach(vv => {
            vvdata.push(
              {
                pregNo:vv.pregno,
                venid:vv.vendorid,
                for:vv.for,
                venname:vv.vname,
                form:vv.from,
                date:vv.date,
                itemPrice:[]
              }
            )
          });

          for(let v = 0; v < vvdata.length; v++){
            for (let i = 0; i < data[2].length; i++) {
              if (data[2][i].vendorId == vvdata[v].venid) {
                vvdata[v].itemPrice.push(data[2][i])
              }
              
            }
          }
          
          
//////////////
          // console.log("vvdate array",vvdata)
          let vvdataItem = vvdata[0].itemPrice
        data[3].forEach((element,ind) => {
            let list1 = document.createElement("tr");
            list1.innerHTML = `       
                <td class="td">${element.itemname}</td>
                <td class="td">${element.description}</td>
                <td class="td">${element.qty}</td>   
                <td class="td">${element.um}</td>                                                              
                `;
                tbodyy.appendChild(list1);
            
        }) 
        let arr = []
        let count = 0
        let trr = document.createElement("tr");
        vvdata.forEach(element1 => {
          let thr = document.createElement("th");
          thr.innerText =element1.venname 
          trr.appendChild(thr);              
          count++
          arr.push(arr.length + 1) 
        });
        hed.appendChild(trr);

////////////


///LOOPING ROWS AND COLUMNS FOR EACH VENDOR UNIT PRICE ALSO CALCULATE THE LOWEST PRICE FOR EACH ITEM FROM EACH VENDOR

          
        let lpoArr = []   
        let lpoArr1 = []    
        vvdataItem.forEach(element => {
          lpoArr1.push(lpoArr1.length+1)
        });
          lpoArr1.sort()
          for (let b = 0; b < lpoArr1.length; b++) {
              let incr = 0
              let rowar = []
             
              // let vda = vvdata[0].itemPrice.length
            while (incr < vvdata.length){//loop for each obj //each item to get each row
              // console.log("eachlog",vvdata[incr])
              let main1 = vvdata[incr].itemPrice
              for (let i = 0; i < main1.length; i++){//loop for items in each obj
                if (parseInt(main1[i].itemNumber) == lpoArr1[b]){//check for rach row
                  rowar.push(main1[i])
                }
              }
              incr++
            }
            // console.log("VendoeRowForEachItem",rowar)
            let higherPrice = 1000000000000000000
            let higherItem = []
            let trr1 = document.createElement("tr");
            rowar.forEach(element1 => {
              let td = document.createElement("td");
              td.innerText =  Number(element1.vendorUnitPrice) != 0? "#"+Number(element1.vendorUnitPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'):"N/A"
              trr1.appendChild(td);              
              if (parseFloat(element1.vendorUnitPrice) < higherPrice && parseFloat(element1.vendorUnitPrice) != 0) {
                higherPrice = parseInt(element1.vendorUnitPrice)
                if (higherItem.length > 0) {
                  higherItem = []
                  higherItem.push(element1)          
                }else{
                  higherItem.push(element1)
                }
              }
            // count++
            });
            bod.appendChild(trr1);
           
            higherItem.forEach((element4,ind) => {
            let list1 = document.createElement("tr");
            list1.innerHTML = `       
                <td class="td">${"#"+Number(element4.vendorUnitPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                <td class="td">${"#"+(Number(element4.vendorUnitPrice)*Number(element4.itemQuantity)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                <td>${element4.venname}</td>   
                `;
                chipbody.appendChild(list1);
                lpoArr.push(element4)
                                                                                 
            })          
            rowar = []//empty the row array
            incr = 0 //initialize new incr for each vendor       
          }
              // ROW AND COLUMN LOOPING ENDS HEAR
              // get a unique vendor id from chip option
            // console.log("lpoArr",lpoArr)
              let uniqueVen = [];
              let uniqueChars = [];
              lpoArr.forEach((c) => {
                  if (!uniqueChars.includes(c.vendorId)) {
                      uniqueChars.push(c.vendorId);
                      uniqueVen.push({
                        ...c,
                        discount:0,
                        vat:"No",
                        grandtotal:0
                      })
                  }
              });


          let mydata = JSON.stringify({"chepItem":lpoArr,"uniqVen":uniqueVen})
          fetch("../../Utils/submitCheapOptionUtils.php", {
          method: 'POST',
          body: mydata,
          headers: {"Content-Type": "application/json; charset=utf-8"}
          }).then(res=>res.json()).then(function(data) {
            if (data.status == "data") {
         
              let currentvenDatalength =  lpoArr.length
              let finnarr = []
              let countt = 0
              while (countt < currentvenDatalength) {

                let venidd = lpoArr[countt].vendorId
                let allvid = []

                data.data.forEach(element5 => {
                  allvid.push(Number(element5.vendorId))
                
                });

                if(!allvid.includes(Number(venidd))){
                  finnarr.push(lpoArr[countt])       
                }

                countt++
              }

              //for unique vendor
           
              let finnarr2 = []
              let finnarr12 = []
           
              data.data2.forEach(element5 => {
                finnarr2.push(Number(element5.vendorId))        
              });

              lpoArr.forEach(element5 => {
                finnarr12.push(Number(element5.vendorId))           
              });

              var difference = finnarr2.filter(x => finnarr12.indexOf(x) === -1);
           
              if (finnarr.length != 0 && difference.length != 0 ) {
              
                let mydata = JSON.stringify({"updatChip":finnarr,"updateUnique":uniqueVen})
                fetch("../../Utils/updateChipOptionUtils.php", {
                method: 'POST',
                body: mydata,
                headers: {"Content-Type": "application/json; charset=utf-8"}
                }).then(res=>res.json()).then(function(data55) {
                  // console.log("sendNot",data55)             
                })

              }
            }
          })
        
        
        }).catch(err=>{
          if (err) {
            alert("Error:"+err)
            // console.log("error",err)
         
          }
        })
    }
    
 
function printP(ins){
  let reqno = document.querySelector(".reqid"); 
  window.open(window.location.origin+"/Rampp/View/comparativeTablePrint.html?reqno="+Number(reqno.innerText), "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=700,width=1600,height=800")
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