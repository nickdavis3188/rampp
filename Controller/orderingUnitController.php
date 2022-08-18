<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");


    $conn = conString1();
    if (isset($_POST["unitSubmit"])) {
        $unit = $_POST['unit'];
        $query = "INSERT INTO orderingunit (`unit`)VALUES ('$unit')";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
      
        if($noofrows==1)
        {
            header("Location: ../View/Inventory/addInventory.php?msg='Registration Successful");
         
        }
        else
        {
            header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysqli_error($conn));          
        }
        
    }
?>