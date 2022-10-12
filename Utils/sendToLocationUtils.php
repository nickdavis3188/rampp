<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

  
    $conn = conString1();

    if (isset($_POST['sendTo'])) {

        $productId = $_POST["productId"];
        $productName = $_POST["productName"];
        $locationId = $_POST["location"];
        $quantity = $_POST["quantity"];
        $locationName = $_POST["locationName"];
        $reason = mysqli_real_escape_string($conn,$_POST["reason"]);
        $date = $_POST["date"];
        $sender = $_POST["userId"];

        $query = "INSERT INTO locationproductrequest (`locationId`,`quantity`,`reason`,`requestDate`,`sender`,`locationName`,`productName`,`productId`,`approval`,`decline`) VALUES('$locationId','$quantity','$reason','$date','$sender','$locationName','$productName','$productId','0','0')";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn); 
        if($noofrows==1)
        {
            header("Location: ../View/Inventory/viewModefyDelete.php?msg=Product request Successfully sent"); 
        }else{
            header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysqli_error($conn)); 
        }
           
       
        
    }

?>