<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();

    if (isset($_GET['deleteInventory'])) {
        echo $_GET['id'];
       
        $query = "DELETE FROM inventory WHERE id='" . $_GET["id"] . "'";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            header("Location: ../View/Inventory/viewModefyDelete.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysql_error()); 
        }
    }elseif (isset($_POST['updateinventory'])) {
     
        $query = "UPDATE inventory SET 
            catname='".$_POST['catname']."',
            productname='".$_POST['pname']."',
            quantityadded='".$_POST['qtyadded']."',
            costprice='".$_POST['costp']."',
            sellingprice='".$_POST['sallingp']."',
            profit='".$_POST['profit']."',
            preparationtime='".$_POST['preptime']."',
            minnimumlevle='".$_POST['minlevle']."'
        WHERE id ='".$_POST['id']."'";

        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            header("Location: ../View/Inventory/viewModefyDelete.php?msg= Update Successful");        
        }
        else
        {
            header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysql_error()); 
        }
    }
 
?>