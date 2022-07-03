<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    
    $conn = conString1();

    if (isset($_GET['delete'])) {
       
        $query = "DELETE FROM prequisitioninfo WHERE preqno ='" . $_GET["preqNo"] . "'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            $query1 = "DELETE FROM preqitem WHERE preqno ='" . $_GET["preqNo"] . "'";
            $results1 = mysqli_query($conn,$query1);
            $noofrows1 = mysqli_affected_rows($conn);
            if ($noofrows1 >= 1)
            {
                header("Location: ../View/purchaseRequisition/viewDeletepRequisition.php?msg= Delete Successful");        
            }else{
                header("Location: ../View/purchaseRequisition/viewDeletepRequisition.php?fail= Error:".mysqli_error($conn)); 
            }
        }
        else
        {
            header("Location: ../View/purchaseRequisition/viewDeletepRequisition.php?fail= Error:".mysqli_error($conn)); 
        }
    }
 
?>