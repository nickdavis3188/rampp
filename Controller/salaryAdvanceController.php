<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");


    $conn = conString1();
    if (isset($_POST["saAd"])) {

        $date = $_POST['date'];
        $issuerId = $_POST['issuerId'];
        $staffTag = $_POST['staffTag'];
        $amount = $_POST['amount'];

        $itemss = array();
     
        $querys ="SELECT * FROM  staff WHERE stafftag='$staffTag'";
        $resultss = mysqli_query($conn,$querys);
        
        while($rows = mysqli_fetch_array($resultss)){
            $itemss[] = $rows;
       }

       $name = $itemss[0]["fname"]." ".$itemss[0]["lname"];

        $query = "INSERT INTO salaryadvance (`staffId`,`amount`,`date`,`issuerId`,`name`)VALUES ('$staffTag','$amount','$date','$issuerId','$name')";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
      
        if($noofrows==1)
        {
          
           $dept =  $itemss[0]["deptAmount"] == null || $itemss[0]["deptAmount"] == ""?0:$itemss[0]["deptAmount"];
           $debtUpdate = $dept+$amount;
                 
            $query = "UPDATE staff SET deptAmount= '$debtUpdate' WHERE stafftag='$staffTag'";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows == 1)
            {    
                header("Location: ../View/Accounts/loanAndDeduction.php?msg='Loan Record Successfully Saved");
            }
            else
            {
                header("Location: ../View/Accounts/loanAndDeduction.php?fail= Error:".mysqli_error($conn));   
            }
        }
        else
        {
            header("Location: ../View/Accounts/loanAndDeduction.php?fail= Error:".mysqli_error($conn));          
        }
        
    }
?>