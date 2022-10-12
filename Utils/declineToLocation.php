<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = conString1();

    $requestId = $_POST["reqId"];

    $query = "UPDATE locationproductrequest SET decline= '1' WHERE requestId='$requestId'";
    $results = mysqli_query($conn,$query);
    $noofrows = mysqli_affected_rows($conn);
    if ($noofrows == 1)
    {
        header("Location: ../View/Inventory/approveToLocation.php?msg='Decline Successful'");   
    }else{
        header("Location: ../View/Inventory/approveToLocation.php?fail= Error:".mysqli_error($conn));   
   }
?>