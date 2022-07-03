<?php
     require("generalController.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    
    $conn = conString1();
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


            
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);

        if($noofrows==1)
        {
            header("Location: ../View/Procurement/addVendor.php?msg='Vendor Registration Successful'");
        
        }
        else
        {
            header("Location: ../View/Procurement/addVendor.php?fail= Error:".mysqli_error($conn));          
        }
   }
?>