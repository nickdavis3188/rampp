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
 ?>