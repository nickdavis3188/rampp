<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");


    $conn = conString1();
    if (isset($_POST["diddu"])) {

        $date = $_POST['date'];
        $issuerId = $_POST['issuerId'];
        $staffTag = $_POST['staffTag'];
        $amount = $_POST['amount'];
        $reason = mysqli_real_escape_string($conn,$_POST['reason']);

        $query = "INSERT INTO deductions (`staffId`,`amount`,`reason`,`date`,`issuerId`)VALUES ('$staffTag','$amount','$reason','$date','$issuerId')";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
      
        if($noofrows==1)
        {
            header("Location: ../View/Accounts/salaryAdvanceAndDeduction.php?msg='Deduction Record Successfully Saved");
         
        }
        else
        {
            header("Location: ../View/Accounts/salaryAdvanceAndDeduction.php?fail= Error:".mysqli_error($conn));          
        }
        
    }
?>