<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");


    $conn = conString1();
    if (isset($_POST["saAd"])) {

        $date = $_POST['date'];
        $issuerId = $_POST['issuerId'];
        $staffTag = $_POST['staffTag'];
        $amount = $_POST['amount'];

        $query = "INSERT INTO salaryadvance (`staffId`,`amount`,`date`,`issuerId`)VALUES ('$staffTag','$amount','$date','$issuerId')";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
      
        if($noofrows==1)
        {
            header("Location: ../View/Accounts/salaryAdvanceAndDeduction.php?msg='Salary Advance Record Successfully Saved");
         
        }
        else
        {
            header("Location: ../View/Accounts/salaryAdvanceAndDeduction.php?fail= Error:".mysqli_error($conn));          
        }
        
    }
?>