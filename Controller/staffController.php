<?php
     require("generalController.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");


    $conn = conString1();
    $genControll = new GeneralController();

   if (isset($_POST["submtNewPersonnel"])) {

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $department = $_POST['dept'];
        $staffTag = $_POST['staffTag'];
        $insentive = $_POST['insentive'];
        $paymonth = $_POST['paymonth'];
        $payannum = $_POST['payannum'];

    
        $query = "INSERT INTO staff(fname, lname,sex, phone,address,dept, stafftag, staffincentive, premonth,perannum)VALUES ('$fname',' $lname','$sex','$phone','$address','$department','$staffTag','$insentive','$paymonth','$payannum')";


            
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);

        if($noofrows==1)
        {
            header("Location: ../View/HrManagement/addPresonnel.php?msg='Registration Successful'");
        
        }
        else
        {
            header("Location: ../View/HrManagement/addPresonnel.php?fail= Error:".mysqli_error($conn));          
        }
   }elseif(isset($_POST["dpt"])){
    $name = $_POST['name'];

    $query = "INSERT INTO department (`name`)VALUES ('$name')";
    $results = mysqli_query($conn,$query);
    $noofrows = mysqli_affected_rows($conn);

    if($noofrows==1)
    {
        header("Location: ../View/HrManagement/addPresonnel.php?msg='Registration Successful");
     
    }
    else
    {
        header("Location: ../View/HrManagement/addPresonnel.php?fail= Error:".mysqli_error($conn));          
    }

  }else{
    if (isset($_POST["deldpt"])) {

        // $catname = $_POST['catname'];
        $query = "DELETE FROM department WHERE id ='" . $_POST["id"] . "'";
        
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/HrManagement/addPresonnel.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/HrManagement/addPresonnel.php?fail= Error:".mysqli_error($conn)); 
        }
    }
  }
?>