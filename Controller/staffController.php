<?php
     require("generalController.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();
    $genControll = new GeneralController();

   if (isset($_POST["submtNewPersonnel"])) {

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $department = $_POST['department'];
        $staffTag = $_POST['staffTag'];
        $insentive = $_POST['insentive'];
        $paymonth = $_POST['paymonth'];
        $payannum = $_POST['payannum'];

    
        $query = "INSERT INTO staff(fname, lname,sex, phone,address,dept, stafftag, staffincentive, premonth,perannum)VALUES ('$fname',' $lname','$sex','$phone','$address','$department','$staffTag','$insentive','$paymonth','$payannum')";


            
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();

        if($noofrows==1)
        {
            header("Location: ../View/HrManagement/addPresonnel.php?msg='Registration Successful'");
        
        }
        else
        {
            header("Location: ../View/HrManagement/addPresonnel.php?fail= Error:".mysql_error());          
        }
   }elseif(isset($_POST["dpt"])){
    $name = $_POST['name'];

    $query = "INSERT INTO department (`name`)VALUES ('$name')";
    $results = mysql_query($query);
    $noofrows = mysql_affected_rows();

    if($noofrows==1)
    {
        header("Location: ../View/HrManagement/addPresonnel.php?msg='Registration Successful");
     
    }
    else
    {
        header("Location: ../View/HrManagement/addPresonnel.php?fail= Error:".mysql_error());          
    }

  }else{
    if (isset($_POST["deldpt"])) {

        // $catname = $_POST['catname'];
        $query = "DELETE FROM department WHERE id ='" . $_POST["id"] . "'";
        
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            header("Location: ../View/HrManagement/addPresonnel.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/HrManagement/addPresonnel.php?fail= Error:".mysql_error()); 
        }
    }
  }
?>