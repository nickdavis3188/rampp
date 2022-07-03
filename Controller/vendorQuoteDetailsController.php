<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

   
    $conn = conString1();

    if (isset($_GET['delete'])) {
       
        $query = "DELETE FROM  prequisitionconfirm WHERE vendorid ='" . $_GET["vidd"] . "'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            $query1 = "DELETE FROM vedorquote WHERE vendorId ='" . $_GET["vidd"] . "'";
            $results1 = mysqli_query($conn,$query1);
            $noofrows1 = mysqli_affected_rows($conn);
            if ($noofrows1 >= 1)
            {
                header("Location: ../View/Procurement/viewVendorQuote.php?msg= Delete Successful");        
            }else{
                header("Location: ../View/Procurement/viewVendorQuote.php?fail= Error:".mysqli_error($conn)); 
            }
        }
        else
        {
            header("Location: ../View/Procurement/viewVendorQuote.php?fail= Error:".mysqli_error($conn)); 
        }
    }
 
?>