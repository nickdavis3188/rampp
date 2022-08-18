<?php
    session_start();
    require("../Utils/loginUtils.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $con = conString1();
    

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $privilege = "";
        

        if ($username & $password)
        {
            $query = "select fname, lname, uname, privilege,id from users where uname='$username' and pword ='$password'";
            $results = mysqli_query($con,$query);
            $noofrows = mysqli_num_rows($results);
            if ($noofrows==1)
            {
                while($row = mysqli_fetch_array($results))
                { 
                    $_SESSION['validuser'] = $username;
                    $_SESSION['privilege']= $row[3];
                    $_SESSION['firstName']= $row[0];
                    $_SESSION['lastName']= $row[1];
                    $_SESSION['userName']= $row[2];
                    $_SESSION['id']= $row[4];
                    header("Location: ../View/Dashboard/dashboard.php");
                    exit;
                }
            }
            else{
                header("Location: ../index.php?message=Incorrect credentials");
                exit;
            }
        }
        else
        {
            header("Location: ../index.php?message=Please confirm your inputs");
                exit;
        }
        
    }