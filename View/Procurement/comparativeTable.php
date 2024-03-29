<?php
session_start();
if (isset($_SESSION['validuser'])) {
  include("../partials/_header.php");
  $title = "Home";
  $nav = "";
  include("../../Utils/sidebarUtils.php");

  require("../../Controller/generalController.php");
  include("../../Env/env.php");
  require("../../Connection/dbConnection.php");


  $conn = conString1();

  $UserUtils = new GeneralController();
  $data1 = $UserUtils->getAllManUnApproveP($conn);

?>
  <!-- HEADER -->

  <style>
    /* Style The Dropdown Button */

    .table .td {
      border: solid 1px #666 !important;
      width: 110px !important;
      word-wrap: break-word !important;
      font-size: xx-small !important;
    }

    .p {
      padding: 0 !important;
    }
  </style>

  <style>
    /* hsguh */

    .table-responsive table {
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
      .table-responsive table {
        width: auto !important;
        margin: 0 auto 15px auto !important;
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
      <?php include("../partials/_navbar.php"); ?>
      <!-- TOP NAV -->
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include($nav); ?>
        <!-- SIDE NAV -->
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper gbgn">
            <button type="button" id="back" class="btn btn-icon-text text-white" style="background:#56565830;" onClick="window.history.back()">
              <i class="ti-shift-left-alt btn-icon-append"></i>
              Back
            </button>
            <br />
            <br />
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

            <br />


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
                          <div class="col-3"><span style="color: #02679a; font-size:small">Request Id: </span>&nbsp;&nbsp;&nbsp; <span class="reqid" style="font-size:small ;"> </span></div>

                        </div>
                      </td>
                      <td colspan="2">
                        <div class="row">
                          <div class="col-3"><span style="color: #02679a; font-size:small"> Request Name: </span>&nbsp;&nbsp;&nbsp; <span class="for" style="font-size:small ;"> </span></div>

                        </div>
                      </td>
                    </tr>

                  </tbody>
                </table>
                <div class="table-responsive pt-3">
                  <table class="table">
                    <tr>
                      <th class="text-center"><span style="color: #02679a;"> Items Details</span></th>
                      <th class="text-center"><span style="color: #02679a;">Vendors Quote</span></th>
                      <th class="text-center"><span style="color: #02679a;">Cheapest Option</span></th>

                    </tr>
                    <tr>
                      <td class="p">
                        <table class="table" style="text-align: center">
                          <tr height="60px" style="font-weight:bold;">
                            <td style="border:solid 1px #666; font-size: xx-small;">Item Name</td>
                            <td style="border:solid 1px #666; font-size: xx-small;">Desc</td>
                            <td style="border:solid 1px #666; font-size: xx-small;">Qty</td>
                            <td style="border:solid 1px #666; font-size: xx-small;">UM</td>
                          </tr>
                          <tbody class="itbod">


                          </tbody>
                        </table>
                      </td>
                      <td class="p">
                        <table class="table" style="text-align: center">
                          <thead class="hed" height="60px" style="font-weight:bold;">

                          </thead>
                          <tbody class="bod">

                          </tbody>
                        </table>
                      </td>
                      <td class="p">
                        <table class="table" style="text-align: center">
                          <tr height="60px" style="font-weight:bold;">
                            <td style="border:solid 1px #666; font-size: xx-small;">Unit Price</td>
                            <td style="border:solid 1px #666; font-size: xx-small;">Total</td>
                            <td style="border:solid 1px #666; font-size: xx-small;">Vendor</td>
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

              <hr>
              <div class="row">
                <div class="col-4">
                  <div class="sups text-center" style="line-height: 9px;font-size:small;">
                    <p class="text-info">Pending</p>
                    <p class="text-info">Supervisor</p>
                  </div>
                </div>
                <div class="col-4">
                  <div class="mns text-center" style="line-height: 9px;font-size:small;">
                    <p class="text-info">Pending</p>
                    <p class="text-info">Manager</p>
                  </div>
                </div>
                <div class="col-4">
                  <div class="mnds text-center" style="line-height: 9px;font-size:small;">
                    <p class="text-info">Pending</p>
                    <p class="text-info">Managing Director</p>
                  </div>
                </div>
              </div>
              <hr>

              <!-- </div> -->
            </div>
            <br />

            <br />


            <!-- Modal -->

            <!-- Modal -->

            <br />
            <!-- Data Table area End-->




            <!--BODY -->
            <!--BODY2 -->

            <!-- <div class="container"> -->

            <?php
            if (isset($_REQUEST['fail'])) {

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

            if (isset($_REQUEST['msg'])) {
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
    if (isset($_REQUEST['fail'])) {
    ?>
      <script>
        let elemet = document.querySelector('#fail')
        new bootstrap.Toast(elemet, {
          animation: true,
          delay: 6000
        }).show()
      </script>
    <?php
    } else {

    ?>
      <script>
        let elemet2 = document.querySelector('#succ')
        new bootstrap.Toast(elemet2, {
          animation: true,
          delay: 6000
        }).show()
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
        let manStatus = document.querySelector(".mns");
        let manDStatus = document.querySelector(".mnds");
        let supStatus = document.querySelector(".sups");



        let mydata = JSON.stringify({
          "pRegNo": par.get("reqno")
        })
        fetch("../../Utils/getAllVendorQuoteUtills.php", {
          method: 'POST',
          body: mydata,
          headers: {
            "Content-Type": "application/json; charset=utf-8"
          }
        }).then(res => res.json()).then(function(data) {

          reqno.innerText = data[0].preqno
          subj.innerText = data[0].subject




          let vvdata = []
          data[1].forEach(vv => {
            vvdata.push({
              pregNo: vv.pregno,
              venid: vv.vendorid,
              for: vv.for,
              venname: vv.vname,
              form: vv.from,
              date: vv.date,
              itemPrice: []
            })
          });

          for (let v = 0; v < vvdata.length; v++) {
            for (let i = 0; i < data[2].length; i++) {
              if (data[2][i].vendorId == vvdata[v].venid) {
                vvdata[v].itemPrice.push(data[2][i])
              }

            }
          }


          //////////////
          // console.log("vvdate array",vvdata)
          let vvdataItem = vvdata[0].itemPrice
          data[3].forEach((element, ind) => {
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
            let thr = document.createElement("td");
            thr.classList.add("td")

            thr.innerText = element1.venname
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
            lpoArr1.push(lpoArr1.length + 1)
          });
          lpoArr1.sort()
          for (let b = 0; b < lpoArr1.length; b++) {
            let incr = 0
            let rowar = []

            // let vda = vvdata[0].itemPrice.length
            while (incr < vvdata.length) { //loop for each obj //each item to get each row
              // console.log("eachlog",vvdata[incr])
              let main1 = vvdata[incr].itemPrice
              for (let i = 0; i < main1.length; i++) { //loop for items in each obj
                if (parseInt(main1[i].itemNumber) == lpoArr1[b]) { //check for rach row
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
              td.classList.add("td")

              td.innerText = Number(element1.vendorUnitPrice) != 0 ? "#" + Number(element1.vendorUnitPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') : "N/A"
              trr1.appendChild(td);
              if (parseFloat(element1.vendorUnitPrice) < higherPrice && parseFloat(element1.vendorUnitPrice) != 0) {
                higherPrice = parseInt(element1.vendorUnitPrice)
                if (higherItem.length > 0) {
                  higherItem = []
                  higherItem.push(element1)
                } else {
                  higherItem.push(element1)
                }
              }
              // count++
            });
            bod.appendChild(trr1);

            higherItem.forEach((element4, ind) => {
              let list1 = document.createElement("tr");
              list1.innerHTML = `       
                <td class="td" style="word-wrap: break-word !important">${"#"+Number(element4.vendorUnitPrice).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                <td class="td" style="word-wrap: break-word !important">${"#"+(Number(element4.vendorUnitPrice)*Number(element4.itemQuantity)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</td>
                <td class="td" style="word-wrap: break-word !important">${element4.venname}</td>   
                `;
              chipbody.appendChild(list1);
              lpoArr.push(element4)

            })
            rowar = [] //empty the row array
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
                discount: 0,
                vat: "No",
                grandtotal: 0
              })
            }
          });

          console.log('uniqueVen',uniqueVen);
          console.log('lpoArr',lpoArr);
          let mydata = JSON.stringify({
            "chepItem": lpoArr,
            "uniqVen": uniqueVen
          })
          fetch("../../Utils/submitCheapOptionUtils.php", {
            method: 'POST',
            body: mydata,
            headers: {
              "Content-Type": "application/json; charset=utf-8"
            }
          }).then(res => res.json()).then(function(data) {
            console.log(data);
            if (data.status == "data") {

              let currentvenDatalength = lpoArr.length
              let finnarr = []
              let countt = 0
              while (countt < currentvenDatalength) {

                let venidd = lpoArr[countt].vendorId
                let allvid = []

                data.data.forEach(element5 => {
                  allvid.push(Number(element5.vendorId))

                });

                if (!allvid.includes(Number(venidd))) {
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

              if (finnarr.length != 0 && difference.length != 0) {

                let mydata = JSON.stringify({
                  "updatChip": finnarr,
                  "updateUnique": uniqueVen
                })
                fetch("../../Utils/updateChipOptionUtils.php", {
                  method: 'POST',
                  body: mydata,
                  headers: {
                    "Content-Type": "application/json; charset=utf-8"
                  }
                }).then(res => res.text()).then(function(data55) {
                  console.log("sendNot",data55)             
                })

              }
            }
          })

          // approvals



          const dateFormat = (date) => {
            var today = new Date(date);
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            // today = mm + '/' + dd + '/' + yyyy;
              today = dd + '/' + mm + '/' + yyyy;
            return today
          }

          let manstat = () => {
            let child = manStatus.lastElementChild;
            while (child) {
              manStatus.removeChild(child);
              child = manStatus.lastElementChild;
            }
            if (data[0].compappman == "Pending") {
              manStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Manager</p>`
            } else if (data[0].compappman == "decline") {
              manStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Manager</p><br/><p class="text-danger">${data[0].compremman}</p><br/><p class="text-danger">${dateFormat(data[0].mancappdate)}</p>`
            } else {
              if (data[0].cmansig) {
                manStatus.innerHTML = `<img src="../${data[0].cmansig}" width="100px"/><br/><p class="text-success">Manager</p><br/><p class="text-success">${data[0].compremman}</p><br/><p class="text-success">${dateFormat(data[0].mancappdate)}</p>`

              } else {
                manStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Manager</p><br/><p class="text-success">${data[0].compremman}</p><br/><p class="text-success">${dateFormat(data[0].mancappdate)}</p>`
              }
            }
          }


          let mandstat = () => {
            let child = manDStatus.lastElementChild;
            while (child) {
              manDStatus.removeChild(child);
              child = manDStatus.lastElementChild;
            }
            if (data[0].compappmand == "Pending") {
              manDStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Managing Director</p>`
            } else if (data[0].compappmand == "decline") {
              manDStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-danger">Managing Director</p><br/><p class="text-danger">${data[0].compremmand }</p><br/><p class="text-danger">${dateFormat(data[0].mandcappdate)}</p>`
            } else {
              if (data[0].cmandsig) {
                manDStatus.innerHTML = `<img src="../${data[0].cmandsig}" width="100px"/><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[0].compremmand}</p><br/><p class="text-success">${dateFormat(data[0].mandcappdate)}</p>`
              } else {
                manDStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Managing Director</p><br/><p class="text-success">${data[0].compremmand}</p><br/><p class="text-success">${dateFormat(data[0].mandcappdate)}</p>`
              }
            }
          }

          let supstat = () => {
            let child = supStatus.lastElementChild;
            while (child) {
              supStatus.removeChild(child);
              child = supStatus.lastElementChild;
            }
            if (data[0].compappsup == "Pending") {
              supStatus.innerHTML = `<p class="text-warning">Pending</p><br/><p class="text-warning">Supervisor</p>`
            } else if (data[0].compappsup == "decline") {
              supStatus.innerHTML = `<p class="text-danger">Decline</p><br/><p class="text-success">Supervisor</p><br/><p class="text-danger">${data[0].compremsup}</p><br/><p class="text-danger">${dateFormat(data[0].supcappdate)}</p>`
            } else {
              if (data[0].csupsig) {
                supStatus.innerHTML = `<img src="../${data[0].csupsig}" width="100px"/><br/><p class="text-success">Supervisor</p><br/><p class="text-success">${data[0].compremsup}</p><br/><p class="text-success">${dateFormat(data[0].supcappdate)}</p>`
              } else {
                supStatus.innerHTML = `<p class="text-success">Approve</p><br/><p class="text-success">Supervisor</p><br/><p class="text-success">${data[0].compremsup}</p><br/><p class="text-success">${dateFormat(data[0].supcappdate)}</p>`
              }
            }
          }

          manstat()
          mandstat()
          supstat()
        }).catch(err => {
          if (err) {
            alert("Error:" + err)
            // console.log("error",err)

          }
        })
      }


      function printP(ins) {
        let reqno = document.querySelector(".reqid");
        window.open(window.location.origin + "/rampp/View/comparativeTablePrint.html?reqno=" + Number(reqno.innerText), "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=700,width=1600,height=800")
      }
    </script>



    <!-- SCRIPT -->
  <?php
} else {
  header("Location: ../../index.php?message=loginNot");
  exit;
}
  ?>