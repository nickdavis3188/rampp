<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();

    if (isset($_GET['delete'])) {
       
        $query = "DELETE FROM vendors WHERE id ='" . $_GET["vid"] . "'";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            header("Location: ../View/Procurement/manageVendor.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/Procurement/manageVendor.php?fail= Error:".mysql_error()); 
        }
    }elseif (isset($_POST['vendor'])) {
        // print_r($_POST);

        $vcode = $_POST['vcode2'];
        $vname = $_POST['vname'];
        $adrs = $_POST['adrs'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $cpname = $_POST['cpname'];
        $cpnum = $_POST['cpnum'];
        $cAcn = $_POST['cAcn'];
        $bName = $_POST['bName'];
        $cBCode = $_POST['cBCode'];
        $tin = $_POST['tin'];
        $id = $_POST['vid'];

        											
        // print_r($vcode);
        $query = "UPDATE vendors  SET vcode='$vcode',compname='$vname',address='$adrs',phone='$phone',email='$email',cpname='$cpname',cpphone='$cpnum',acctno='$cAcn',bankname='$bName',bankcode='$cBCode',tin='$tin' WHERE id =$id";

        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            // echo 
            header("Location: ../View/Procurement/manageVendor.php?msg= Vendor Update Successful");        
        }
        else
        {
            header("Location: ../View/Procurement/manageVendor.php?fail= Error:".mysql_error()); 
        }
    }
 
?>