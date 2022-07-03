<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

   
    $conn = conString1();

    if (isset($_GET['delete'])) {
       
        $query = "DELETE FROM fundrequisition WHERE fregno ='" . $_GET["freqNo"] . "'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/FundRequisision/createFundRequisition.php?msg='Delete successful");
        }
        else
        {
            header("Location: ../View/FundRequisision/createFundRequisition.php?fail= Error:".mysqli_error($conn)); 
        }
    }
 
?>