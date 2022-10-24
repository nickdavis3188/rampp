<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = conString1();


    if(isset($_POST["location"])){
        $salesLocationName = $_POST['name'];
    
        $query = "INSERT INTO saleslocation (`salesLocationName`,`productQty`)VALUES ('$salesLocationName','0')";
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
    
    }else{
        if (isset($_POST["delLocation"])) {
    
            $id = $_POST['id'];
            $query = "DELETE FROM saleslocation WHERE salesLocationId  ='$id'";
            
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows == 1)
            {
                header("Location: ../View/Inventory/addInventory.php?msg= Delete Successful");        
            }
            else
            {
                header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysqli_error($conn)); 
            }
        }
    }
?>