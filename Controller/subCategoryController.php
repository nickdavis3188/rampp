<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = conString1();


    if(isset($_POST["subCategory"])){
        $catName = $_POST['name'];
        $category = $_POST['category'];
    
        $query = "INSERT INTO subcategory (`subCategoryName`,`category`)VALUES ('$catName','$category')";
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
        if (isset($_POST["delsubCategory"])) {
    
            $id = $_POST['id'];
            $query = "DELETE FROM subcategory WHERE subCategoryId ='$id'";
            
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