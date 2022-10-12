<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require("../Controller/generalController.php");
  
    $conn = conString1();
    $genController = new GeneralController();
    $requestId = $_POST["reqId"];

    $items = array();
    $query ="SELECT * FROM locationproductrequest WHERE requestId='$requestId'";
    $results = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($results)){
        $items[] = $row;
    }
  
    $query = "UPDATE locationproductrequest SET approval= '1' WHERE requestId='$requestId'";
    $results = mysqli_query($conn,$query);
    $noofrows = mysqli_affected_rows($conn);
    if ($noofrows == 1)
    {
        $productId = $items[0]["productId"];
        $locationId = $items[0]["locationId"];
        $quantity = $items[0]["quantity"];
        $productName = $items[0]["productName"];

       $retVal = $genController->pushToLocation($conn,$productId,$locationId,$quantity, $productName);
       if ($retVal) {
           header("Location: ../View/Inventory/approveToLocation.php?msg='Approval Successful'");       
       }else{
            header("Location: ../View/Inventory/approveToLocation.php?fail= Error:".mysqli_error($conn));   
       }
    }
    else
    {
        header("Location: ../View/Inventory/approveToLocation.php?fail= Error:".mysqli_error($conn));          
    }
?>