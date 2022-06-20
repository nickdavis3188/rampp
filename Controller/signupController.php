<?php
    if (isset($_POST["submit"])) {
        
        $fname = $_POST["firstName"];
        $lname = $_POST["lastName"];
        $username = $_POST["userName"];
        $pwd = $_POST["password"];
        $privilege = $_POST["privilege"];
        
    }else{
        header("location: ../View/Auth/signup.php");
    }