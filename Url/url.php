<?php
    // dashborad
    $dashborad = "../Dashboard/dashboard.php";

    // record_sales
    $record_sales = "../RecordSales/recordSales.php";

    // inventory
    $inventory = array("addInventory"=>"../Inventory/addInventory.php", "viewModefyDelete"=>"../Inventory/viewModefyDelete.php");

    // Hr
    $hr = array("addPresonnel"=>"../HrManagement/addPresonnel.php","newUser"=>"../HrManagement/addUser.php", "viewModefyDelete"=>"../HrManagement/viewModefyDelete2.php","manageNewUser"=>"../HrManagement/viewModefyDeleteUser.php");

    // purchaseRequisition
    $purchaseRequisition = array("createRequisition"=>"../purchaseRequisition/createpRequisition.php", "viewDeleteRequisition"=>"../purchaseRequisition/viewDeletepRequisition.php","approvalBySupervisor"=>"../purchaseRequisition/papprovalBySupervisor.php","approvalByMd"=>"../purchaseRequisition/papprovalByMd.php","approvalByMan"=>"../purchaseRequisition/papprovalByMan.php");

    // FundRequisision
    $FundRequisision = array("createRequisition"=>"../FundRequisision/createFundRequisition.php", "viewDeleteRequisition"=>"../FundRequisision/viewDeletefRequisition.php","approvalBySupervisor"=>"../FundRequisision/fapprovalBySupervisor.php","approvalByMd"=>"../FundRequisision/fapprovalByMd.php","approvalByman"=>"../FundRequisision/fapprovalByMan.php");
    
    $Procurment = array("vendor"=>array("addVendor"=>"../Procurement/addVendor.php","manageVendor"=>"../Procurement/manageVendor.php","addvendorQuote"=>"../Procurement/enterVendorQuote.php","manageVendorQuate"=>"../Procurement/viewVendorQuote.php"),"comparitiveTable"=>array("genComparitiveTable"=>"../Procurement/genComparitiveTable.php","supApprove"=>"../Procurement/compApproveBySup.php","manApprove"=>"../Procurement/compApproveByMan.php","mandApprove"=>"../Procurement/compApproveByManD.php"),"lpo"=>array("createLpo"=>"../Procurement/lpocreate.php","viewDeleteLpo"=>"../Procurement/viewDeleteLpo.php","supApprovee"=>"../Procurement/lpoSupApprove.php","manApprove"=>"../Procurement/lpoManApproval.php","manDApprove"=>"../Procurement/lpoManDApprove.php","sendLpo"=>"../Procurement/sendLpo1.php"));

    $ordering = array("kitchen"=>"../Ordering/kichen.php","bar"=>"../Ordering/bar.php","view"=>"../Ordering/vmanageOrder.php","receipt"=>"../Ordering/orderReceipt.php");

    $salesReport = array("dailyReport"=>"../SalesReport/dailyReport.php","monthlyReport"=>"../SalesReport/monthlyReport.php","annualReport"=>"../SalesReport/annualReport.php","productReport"=>"../SalesReport/productReport.php","dateRange"=>"../SalesReport/dateRange.php");

    $accounts = array("addExpenses"=>"../Accounts/expenses.php","viewExpenses"=>"../Accounts/viewExpenses","sd"=>"../Accounts/loanAndDeduction.php","payRoll"=>"../Accounts/createPayRoll.php","viewPayroll"=>"../Accounts/viewPayroll.php","payrolAp1"=>"../Accounts/payroleApprovel1.php","payrolAp2"=>"../Accounts/payrollApproval2.php","payrolAp3"=>"../Accounts/payrollApproval3.php","auditReport"=>"../Accounts/auditReport.php","auditView22"=>"../Accounts/viewAuditReport.php","custom"=>"../Accounts/customAudit.php","debtReport"=>"../Accounts/deptorsReport.php")
 ?>