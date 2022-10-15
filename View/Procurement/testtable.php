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
      $data1 = $UserUtils-> getAllManUnApproveP($conn);
    
?>
<!-- HEADER -->

<style>
/* Style The Dropdown Button */
    table, th, td {
    border: 1px solid;
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
                  <h4 class="font-weight-bold mb-0">Vendor's Quote</h4>
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
            <!-- <div class="container"> -->
            <!-- body -->
            <div class="table-responsive pt-3">
            <table class="table ">
                <tbody>
                
                <!-- head -->
                <tr>
                    <td rowspan="2" colspan="5">
                        <div class="row">
                            <div class="col-md-6">
                            <img src="../../Upload/logo.jpeg"/ style="width:200px">
                            </div>
                            <div class="col-md-6">
                            <h5 style="color: #02679a;">Comparative Table</h5>
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
                        <div class="col-3"><span style="color: #02679a;">Request Id:  </span></div>
                        <div class="col-9"><p class="reqid"></p></div>
                    </div>                                      
                    </td>
                    <td colspan="2">
                    <div class="row">
                        <div class="col-3"><span style="color: #02679a;"> Request Name:  </span></div>
                        <div class="col-9"><p class="for"></p></div>
                    </div>  
                    </td>
                </tr>
                          
                </tbody>
            </table>
            <div class="table-responsive pt-3">
            <table class="table">
                <tr>
                    <th class="text-center"  ><span style="color: #02679a;"> Items Details</span></th>
                    <th class="text-center"  ><span style="color: #02679a;">Vendors Involve</span></th>
                    <th class="text-center"  ><span style="color: #02679a;">Cheapest Option</span></th>
                   
                </tr>
                <tr>
                    <td>
                        <table class="table">
                            <tr>
                                <th>Item Name</th>
                                <th>Desc</th>
                                <th>Qty</th>
                                <th>UM</th>
                            </tr>
                            <tr>
                                <td>Peter</td>
                                <td>Griffin</td>
                                <td>Griffin</td>
                                <td>Griffin</td>
                            </tr>
                            <tr>
                                <td>Lois</td>
                                <td>Griffin</td>
                                <td>Griffin</td>
                                <td>Griffin</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table">
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                            </tr>
                            <tr>
                                <td>Peter</td>
                                <td>Griffin</td>
                            </tr>
                            <tr>
                                <td>Lois</td>
                                <td>Griffin</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table">
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                            </tr>
                            <tr>
                                <td>Peter</td>
                                <td>Griffin</td>
                            </tr>
                            <tr>
                                <td>Lois</td>
                                <td>Griffin</td>
                            </tr>
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

// function dinamicInsertRow(data1,data2) {
    // let hed = document.querySelector(".hed"); 
    // let bod = document.querySelector(".bod"); 
    // let tbodyy = document.querySelector(".itbod");
    // let datafromloop = 
  

      // let child = tbodyy.lastElementChild; 
      // while (child) {
      //   tbodyy.removeChild(child);
      //     child = tbodyy.lastElementChild;
      // }

    //   data2.forEach((element,ind) => {
    //         let list1 = document.createElement("tr");
    //         list1.innerHTML = `       
    //             <td>${element.itemname}</td>
    //             <td>${element.description}</td>
    //             <td>${element.qty}</td>   
    //             `;
    //             tbodyy.appendChild(list1);
    //             // <td># ${element.um}</td>                                                              
            
    //     }) 

    //     let count = 0
    //     let trr = document.createElement("tr");
    //     data1.forEach(element1 => {
    //       let thr = document.createElement("th");
    //       thr.innerText =element1.venname 
    //       trr.appendChild(thr);              
    //       count++
    //     });
    //     hed.appendChild(trr);

        // let fill = []
        // let count2 = 0
        // while (count2 < count) {
        //   let main1 = data1[count2].itemPrice
        //   if (parseInt(main1.itemNumber) == count2+1) {
        //     console.log(main1)
        //   }
        // }
//   }

    let par = new URLSearchParams(window.location.search)
    if (par.has("reqno")) {
        let reqno = document.querySelector(".reqid"); 
        let subj = document.querySelector(".for"); 
        // let htr = document.querySelector(".htr"); 
        let hed = document.querySelector(".hed"); 
    let bod = document.querySelector(".bod"); 
        let tbodyy = document.querySelector("#tbb"); 
        // let vendor = document.querySelector(".vendor"); 
        // let date = document.querySelector(".date");
        //  let total = document.querySelector(".tot");  
        
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
vvdata.forEach((element,ind) => {
            let list1 = document.createElement("tr");
            list1.innerHTML = `       
                <td>${element.itemname}</td>
                <td>${element.description}</td>
                <td>${element.qty}</td>   
                `;
                tbodyy.appendChild(list1);
                // <td># ${element.um}</td>                                                              
            
        }) 

        let count = 0
        let trr = document.createElement("tr");
        vvdata.forEach(element1 => {
          let thr = document.createElement("th");
          thr.innerText =element1.venname 
          trr.appendChild(thr);              
          count++
        });
        hed.appendChild(trr);

////////////



          let ar =[1,2]
          // console.log(vvdata)
            let incr = 0
          while (incr < vvdata.length) {
            let rowar = []
            let main1 = vvdata[incr].itemPrice
            for (let i = 0; i < main1.length; i++) {
              if (parseInt(main1[i].itemNumber) == 1) {
                // console.log("maindata",main1[i])
                rowar.push(main1[i])
              }           
            }
            console.log("rowar",rowar)
            
            incr++
          }


        //   let count2 = 0
        // while (count2 < count) {
        //   let main1 = vvdata[count2].itemPrice
        //   if (parseInt(main1.itemNumber) == count2+1) {
        //     console.log(main1)
        //   }
        // }
          // console.log(data)
        //   dinamicInsertRow(vvdata,data[3])
       
     
        }).catch(err=>{
          if (err) {
            alert("Error:"+err)
            console.log("error",err)
         
          }
        })
    }
    
 
    function submitQuote(pa) {
      var child = pa.lastElementChild; 
      while (child) {
        pa.removeChild(child);
          child = ele.lastElementChild;
      }

      pa.innerText = "Submiting Quotes...";
      let newSpan = document.createElement("span");
      newSpan.classList.add("spinner-border");
      newSpan.classList.add("spinner-border-sm");

      pa.appendChild(newSpan);

      let allInput = document.querySelectorAll(".unitPrice")
      let obj = [];
      for (let i = 0; i < allInput.length; i++) {

          obj.push({
            purchaseId:allInput[i].getAttribute("pid"),
            vendorId:allInput[i].getAttribute("venid"),
            itemName:allInput[i].getAttribute("itmName"),
            itemDescription:allInput[i].getAttribute("des"),
            itemQuantity:allInput[i].getAttribute("qty"),
            itemUnitMeasure:allInput[i].getAttribute("um"),
            vendorUnitPrice:allInput[i].value,
            itemNumber:allInput[i].getAttribute("itemNo")
          });       
        
      }
      let vendor = document.querySelector(".vendor");
      let subj = document.querySelector(".for"); 
      let from = document.querySelector(".from"); 
      let date = document.querySelector(".date");

      let mydata = JSON.stringify({"itemWithQuote":obj,"venid":par.get("id"),"pid":par.get("reqno"),"for":subj.innerText,"vname":vendor.innerText,"from":from.innerText,"date":date.innerText})
      fetch("../../Controller/vendorQuoteController.php", {
      method: 'POST',
      body: mydata,
      headers: {"Content-Type": "application/json; charset=utf-8"}
      }).then(res=>res.json()).then(function(data) {
       
        if (data.status == "success" ) {
          // pa.disabled =true;
          window.location = window.location.origin+"/View/Procurement/enterVendorQuote.php?msg= Submit Successful";
        } else {
          window.location = window.location.origin+"/View/Procurement/enterVendorQuote.php?fail="+data.message;
        }
        console.log(data)
      }).catch(err=>{
            if (err) {
             
              window.location = window.location.origin+"/View/Procurement/enterVendorQuote.php?fail="+err;
           
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