<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

   
    $conn = conString1();

    if (isset($_GET['delete'])) {
       
        $query = "DELETE FROM staff WHERE stafftag ='" . $_GET["staftag"] . "'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/HrManagement/viewModefyDelete2.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/HrManagement/viewModefyDelete2.php?fail= Error:".mysqli_error($conn)); 
        }
    }elseif (isset($_POST['updatestaff'])) {
        // print_r($_POST);

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $sex = $_POST['sex'];
        $department = $_POST['department'];
        $stafftag = $_POST['staffTag'];
        $insentive = $_POST['insentive'];
        $month = $_POST['paymonth'];
        $annum = $POST['payannum'];

        $query = "UPDATE staff  SET fname='$firstname',lname='$lastname',premonth='$month',perannum='$annum',sex='$sex',phone='$phone',staffincentive='$insentive',address='$address',dept='$department' WHERE stafftag ='$stafftag'";

        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/HrManagement/viewModefyDelete2.php?msg= Update Successful");        
        }
        else
        {
            header("Location: ../View/HrManagement/viewModefyDelete2.php?fail= Error:".mysqli_error($conn)); 
        }
    }
 
?>