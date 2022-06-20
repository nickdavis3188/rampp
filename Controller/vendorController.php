<?php
     require("generalController.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();
    $genControll = new GeneralController();

   if (isset($_POST["vendor"])) {

        $vcode = $_POST['vcode'];
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
        
    
        $query = "INSERT INTO vendors (`vcode`, `compname`,`address`, `phone`,`email`,`cpname`, `cpphone`, `acctno`, `bankname`,`bankcode`,`tin`) VALUES ('$vcode',' $vname','$adrs','$phone','$email','$cpname','$cpnum','$cAcn','$bName','$cBCode','$tin')";


            
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();

        if($noofrows==1)
        {
            header("Location: ../View/Procurement/addVendor.php?msg='Vendor Registration Successful'");
        
        }
        else
        {
            header("Location: ../View/Procurement/addVendor.php?fail= Error:".mysql_error());          
        }
   }
?>