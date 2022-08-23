<?php 
  include("../../Url/url.php");

?>
<style type="text/css">
  .size{
    font-size: 12px !important;
  }
  .sidebar .nav .nav-item.active > .nav-link .menu-title{
    color:#02679a !important;
  }
  .sidebar .nav .nav-item.active > .nav-link .menu-icon{
    color:#02679a !important;
  }
</style>

      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" >
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href= <?php echo($dashborad) ?> >
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= <?php echo($record_sales) ?>>
              <i class="ti-pencil-alt menu-icon"></i>
              <span class="menu-title">Record Sales</span>
            </a>
          </li>
<!-- dropdown -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic2">
              <i class="ti-folder menu-icon"></i>
              <span class="menu-title">Inventory</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link size" href= <?php echo($inventory["addInventory"])  ?>>Add Inventory</a></li>
                <li class="nav-item"> <a class="nav-link size" href= <?php echo($inventory["viewModefyDelete"]) ?>>View/Modify/Delete</a></li>
              </ul>
            </div>
          </li>
<!-- dropdown -->
<!-- dropdown -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic1">
              <i class="ti-id-badge menu-icon"></i>
              <span class="menu-title">HR Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link size" href= <?php echo($hr["addPresonnel"])  ?>>Add Personnel</a></li>
                <li class="nav-item"> <a class="nav-link size" href= <?php echo($hr["viewModefyDelete"]) ?>>Manage Personnel</a></li>
                <li class="nav-item"> <a class="nav-link size" href= <?php echo($hr["newUser"])  ?>>Add System User</a></li>
                <li class="nav-item"> <a class="nav-link size" href= <?php echo($hr["manageNewUser"]) ?>>Manage System Users</a></li>
              </ul>
            </div>
          </li>
<!-- dropdown -->
<!-- dropdown -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-ticket menu-icon"></i>
              <span class="menu-title">Purchase Requisition</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link size"  href= <?php echo($purchaseRequisition["createRequisition"])  ?>>Create Requisition</a></li>
                <li class="nav-item"> <a class="nav-link size" href= <?php echo($purchaseRequisition["viewDeleteRequisition"])  ?>>View/Delete Requisition</a></li>
                <!-- <li class="nav-item"> <a class="nav-link size"  href= <?php echo($purchaseRequisition["approvalBySupervisor"])  ?>>Approval By Supervisor</a></li> -->
                <li class="nav-item"> <a class="nav-link size" href= <?php echo($purchaseRequisition["approvalByMan"])  ?>>Approval By Manager</a></li>
                <!-- <li class="nav-item"> <a class="nav-link size" href= <?php echo($purchaseRequisition["approvalByMd"])  ?>>Approval By MD</a></li> -->
              </ul>
            </div>
          </li>
<!-- dropdown -->
<!-- dropdown -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-wallet menu-icon"></i>
              <span class="menu-title">Fund Requisition</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic4">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link size"  href= <?php echo($FundRequisision["createRequisition"])  ?>>Create Requisition</a></li>
              <li class="nav-item"> <a class="nav-link size" href= <?php echo($FundRequisision["viewDeleteRequisition"])  ?>>View/Delete Requisition</a></li>
              <!-- <li class="nav-item"> <a class="nav-link size"  href= <?php echo($FundRequisision["approvalBySupervisor"])  ?>>Approval By Supervisor</a></li> -->
              <li class="nav-item"> <a class="nav-link size" href= <?php echo($FundRequisision["approvalByman"])  ?>>Approval By Manager</a></li>
              <!-- <li class="nav-item"> <a class="nav-link size" href= <?php echo($FundRequisision["approvalByMd"])  ?>>Approval By MD</a></li> -->
              </ul>
            </div>
          </li>
<!-- dropdown -->
<!-- dropdown -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-credit-card menu-icon"></i>
              <span class="menu-title">Procurement</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic5">
              <ul class="nav flex-column sub-menu">
                <!-- first custom -->
                <li class="nav-item" >
                  <p class="nav-item" href="#ui-basic7" aria-expanded="false" style="cursor: pointer;color:#656565;">
                    <i class="ti-user menu-icon size"></i>
                    <span class="menu-title size" id="togle" >Vendor</span>
                    <i class="ti-angle-right" id="angle" style="font-size: 10px;"></i>
                  </p>
                  <div class="pr-2 sidesecond" id="ui-basic7" style="background-color:white;display:none">
                    <ul class=" list" style="list-style-type:none;">
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["vendor"]["addVendor"]) ?>">Add New Vendor</a></li>
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["vendor"]["manageVendor"]) ?>">View/Modify Vendor</a></li>
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["vendor"]["addvendorQuote"]) ?>">Enter Vendor Quote</a></li>
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["vendor"]["manageVendorQuate"]) ?>">View/Delete Vendor Quote</a></li>
                    </ul>
                  </div>
                </li>
                <!-- second custom -->
                <li class="nav-item" >
                  <p class="nav-item" href="#ui-basic8" aria-expanded="false" style="cursor: pointer;color:#656565;">
                    <i class="ti-layout menu-icon size"></i>
                    <span class="menu-title size" id="togle1" >Comparative Table</span>
                    <i class="ti-angle-right" id="angle1" style="font-size: 10px;"></i>
                  </p>
                  <div class="pr-2 sidesecond" id="ui-basic8" style="background-color:white;display:none">
                    <ul class=" list" style="list-style-type:none;">
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["comparitiveTable"]["genComparitiveTable"]) ?>">View/Create Comparative Table</a></li>
                      <!-- <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["comparitiveTable"]["supApprove"]) ?>">Approval By Supervisor</a></li>                    -->
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["comparitiveTable"]["manApprove"]) ?>">Approval By Manager</a></li>                   
                      <!-- <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["comparitiveTable"]["mandApprove"]) ?>">Approval By MD</a></li>                    -->
                    </ul>
                  </div>
                </li>
                <!--  -->
                <!-- second custom -->
                <li class="nav-item" >
                  <p class="nav-item" href="#ui-basic9" aria-expanded="false" style="cursor: pointer;color:#656565;">
                    <i class="ti-receipt menu-icon size"></i>
                    <span class="menu-title size" id="togle2" >Local Purchase Order</span>
                    <i class="ti-angle-right" id="angle2" style="font-size: 10px;"></i>
                  </p>
                  <div class="pr-2 sidesecond" id="ui-basic9" style="background-color:white;display:none">
                    <ul class=" list" style="list-style-type:none;">
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["lpo"]["createLpo"]) ?>">Create LPO</a></li>
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["lpo"]["viewDeleteLpo"]) ?>">View/Delete LPO</a></li>
                      <!-- <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["lpo"]["supApprovee"]) ?>">Approval By Supervisor</a></li> -->
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["lpo"]["manApprove"]) ?>">Approval By Maneger</a></li>
                      <!-- <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["lpo"]["manDApprove"]) ?>">Approval By MD</a></li> -->
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo($Procurment["lpo"]["sendLpo"]) ?>">Send LPO</a></li>
                    </ul>
                  </div>
                </li>
                <!--  -->            
              </ul>
            </div>
          </li>
<!-- dropdown -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic66" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-shopping-cart-full menu-icon"></i>
              <span class="menu-title">Ordering</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic66">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link size" href="#">New Order</a></li>
                <li class="nav-item"> <a class="nav-link size" href="#">View/Manage Order</a></li>             
              </ul>
            </div>
          </li>
<!-- dropdown -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic77" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-receipt menu-icon"></i>
              <span class="menu-title">Sales Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic77">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link size" href="#">View Sales Report</a></li>
                <li class="nav-item"> <a class="nav-link size" href="#">Product Sales Report</a></li>             
              </ul>
            </div>
          </li>
          <!-- dropdown -->
          <!-- dropdown -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic88" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-bar-chart menu-icon"></i>
              <span class="menu-title">Accounts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic88">
              <ul class="nav flex-column sub-menu">
                <!-- first custom -->
                <li class="nav-item" >
                  <p class="nav-item" href="#ui-basicA" aria-expanded="false" style="cursor: pointer;color:#656565;">
                    <i class="ti-money menu-icon size"></i>
                    <span class="menu-title size" id="togleA" >Expenses</span>
                    <i class="ti-angle-right" id="angleA" style="font-size: 10px;"></i>
                  </p>
                  <div class="pr-2 sidesecond" id="ui-basicA" style="background-color:white;display:none">
                    <ul class=" list" style="list-style-type:none;">
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="#">Add Expenses</a></li>
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="#">View Expenses</a></li>
                    </ul>
                  </div>
                </li>
                <!-- second custom -->
                <!-- second custom -->
                <li class="nav-item" >
                  <p class="nav-item" href="#ui-basicB" aria-expanded="false" style="cursor: pointer;color:#656565;">
                    <i class="ti-notepad menu-icon size"></i>
                    <span class="menu-title size" id="togleB" >Payroll Management</span>
                    <i class="ti-angle-right" id="angleB" style="font-size: 10px;"></i>
                  </p>
                  <div class="pr-2 sidesecond" id="ui-basicB" style="background-color:white;display:none">
                    <ul class=" list" style="list-style-type:none;">
                    <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo $accounts["payrolAp2"]?>">Approval By MAN</a></li>                     
                    </ul>
                  </div>
                </li>
                <!--  -->            
                <li class="nav-item" >
                  <p class="nav-item" href="#ui-basicC" aria-expanded="false" style="cursor: pointer;color:#656565;">
                    <i class="ti-clipboard menu-icon size"></i>
                    <span class="menu-title size" id="togleC" >Audit Report</span>
                    <i class="ti-angle-right" id="angleC" style="font-size: 10px;"></i>
                  </p>
                  <div class="pr-2 sidesecond" id="ui-basicC" style="background-color:white;display:none">
                    <ul class=" list" style="list-style-type:none;">
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo $accounts["auditReport"]?>">Gen Audit</a></li>                  
                      <li class="nav-item"> <a style="font-size:11.2px" class="nav-link" href="<?php echo $accounts["auditView22"]?>">View Audit</a></li>                  
                    </ul>                                               
                  </div>
                </li>
                <!--  -->
                <li class="nav-item"> <a class="nav-link size" href="<?php echo $accounts["sd"]?>">SalaryAdvance/Deductions</a></li>
                 <li class="nav-item"> <a class="nav-link size" href="<?php echo $accounts["debtReport"]?>">DebtReport</a></li>
              </ul>
            </div>
          </li>
<!-- dropdown -->
        </ul>
      </nav>

