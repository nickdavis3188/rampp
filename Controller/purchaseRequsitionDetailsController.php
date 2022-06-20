<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();

    if (isset($_GET['delete'])) {
       
        $query = "DELETE FROM prequisitioninfo WHERE preqno ='" . $_GET["preqNo"] . "'";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            $query1 = "DELETE FROM preqitem WHERE preqno ='" . $_GET["preqNo"] . "'";
            $results1 = mysql_query($query1);
            $noofrows1 = mysql_affected_rows();
            if ($noofrows1 >= 1)
            {
                header("Location: ../View/purchaseRequisition/viewDeletepRequisition.php?msg= Delete Successful");        
            }else{
                header("Location: ../View/purchaseRequisition/viewDeletepRequisition.php?fail= Error:".mysql_error()); 
            }
        }
        else
        {
            header("Location: ../View/purchaseRequisition/viewDeletepRequisition.php?fail= Error:".mysql_error()); 
        }
    }
 
?>