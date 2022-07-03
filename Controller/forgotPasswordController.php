<?php 
    session_start();
    require("../Connection/dbConnection.php");
    include("../Env/env.php");
   
    $conn = conString1();

    $fname = $_REQUEST['firstName'];
    $username = $_REQUEST['userName'];
    
    if ($username && $fname)
    {
        $query = "select pword from users where uname='$username' and fname ='$fname'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_num_rows($results);
        if ($noofrows==1)
        {
            while($row = mysqli_fetch_array($results))
            { 
                
                $password = $row[0];
                $_SESSION['password'] = $password;
                header("Location: ../View/ForgotPassword/forgotpassword.php?password= Your Password is ".$password);
                exit;
            }
        }
        else{
            header("Location: ../View/ForgotPassword/forgotpassword.php?fail=Incorrect Credentials");
            exit;
        }
    }else {
        header("Location: ../View/ForgotPassword/forgotpassword.php?fail=Please confirm your input");
        exit;
    }
    
?>