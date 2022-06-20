<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();

    if (isset($_GET['delete'])) {
       
        $query = "DELETE FROM  prequisitionconfirm WHERE vendorid ='" . $_GET["vidd"] . "'";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            $query1 = "DELETE FROM vedorquote WHERE vendorId ='" . $_GET["vidd"] . "'";
            $results1 = mysql_query($query1);
            $noofrows1 = mysql_affected_rows();
            if ($noofrows1 >= 1)
            {
                header("Location: ../View/Procurement/viewVendorQuote.php?msg= Delete Successful");        
            }else{
                header("Location: ../View/Procurement/viewVendorQuote.php?fail= Error:".mysql_error()); 
            }
        }
        else
        {
            header("Location: ../View/Procurement/viewVendorQuote.php?fail= Error:".mysql_error()); 
        }
    }
 
?>