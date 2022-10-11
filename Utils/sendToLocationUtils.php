<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

  
    $conn = conString1();

    if (isset($_POST['sendTo'])) {

        $itemId = $_POST["productId"];
        $locationId = $_POST["location"];
        $quantity = $_POST["quantity"];
        $productName = $_POST["productName"];

        $items = array();
    
        $query ="SELECT * FROM locationproduct WHERE productId='$itemId' AND locationId='$locationId'";
        $results = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
        }
      
        
        if (count($items) > 0) {
            $qty = $items[0]["quantityAdded"] + $quantity;
            $lpId = $items[0]["lpId"];
            $query = "UPDATE locationproduct SET quantityAdded= '$qty' WHERE lpId='$lpId'";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows == 1)
            {
                header("Location: ../View/Inventory/viewModefyDelete.php?msg=Product Successfully restocked in the specified location");        
            }
            else
            {
                header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysqli_error($conn)); 
            }
         
        }else{
            $query = "INSERT INTO locationproduct (`locationId`,`productId`,`productName`,`quantityAdded`) VALUES('$locationId','$itemId','$productName','$quantity')";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn); 
            if($noofrows==1)
            {    
                $items2 = array();
    
                $query2 ="SELECT * FROM salesLocation WHERE salesLocationId='$locationId'";
                $results2 = mysqli_query($conn,$query2);
        
                while($row2 = mysqli_fetch_array($results2)){
                    $items2[] = $row2;
                }
                // 
                $qty2 = $items2[0]["productQty"] + 1;
                $query = "UPDATE salesLocation SET productQty= '$qty2' WHERE salesLocationId='$locationId'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {       
                    header("Location: ../View/Inventory/viewModefyDelete.php?msg=Product Successfully moved to the specified location");      
                }
                else
                {
                    header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysqli_error($conn)); 
                }      
            }
            else
            {
                header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysqli_error($conn));         
            }
       
        }
           
       
        
    }
 
?>