<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");


    $conn = conString1();

    if (isset($_GET['delete'])) {
       
        $query = "DELETE FROM users WHERE uname='" . $_GET["uname"] . "'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/HrManagement/viewModefyDeleteUser.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/HrManagement/viewModefyDeleteUser.php?fail= Error:".mysqli_error($conn)); 
        }
    }elseif (isset($_POST['update'])) {

        $query = "UPDATE users SET 
            fname='".$_POST['firstname']."',
            lname='".$_POST['lastname']."',
            pword='".$_POST['password']."',
            privilege='".$_POST['role']."',
            email='".$_POST['email']."',
            address='".$_POST['address']."',
            phone='".$_POST['phone']."',
            sex='".$_POST['sex']."',
            designation='".$_POST['office']."'
        WHERE uname ='".$_POST['username']."'";

        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/HrManagement/viewModefyDeleteUser.php?msg= Update Successful");        
        }
        else
        {
            header("Location: ../View/HrManagement/viewModefyDeleteUser.php?fail= Error:".mysqli_error($conn)); 
        }
    }
 
?>