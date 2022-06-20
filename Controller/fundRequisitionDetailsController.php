<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();

    if (isset($_GET['delete'])) {
       
        $query = "DELETE FROM fundrequisition WHERE fregno ='" . $_GET["freqNo"] . "'";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            header("Location: ../View/FundRequisision/createFundRequisition.php?msg='Delete successful");
        }
        else
        {
            header("Location: ../View/FundRequisision/createFundRequisition.php?fail= Error:".mysql_error()); 
        }
    }
 
?>