<?php 
        require("generalController.php");
        include("../Env/env.php");
        require("../Connection/dbConnection.php");
    
      
        $conn = conString1();
        $genControll = new GeneralController();

    if (isset($_POST["submit"])) {
        
        $signature = $_FILES["signature"];
        $fileTempName = $_FILES["signature"]["tmp_name"];
        $fileSize = $_FILES["signature"]["size"];
        $fileError = $_FILES["signature"]["error"];
        $fileType = $_FILES["signature"]["type"];
        $fileName = $_FILES["signature"]["name"];

        $profilepic = $_FILES["profilepic"];
        $fileTempName2 = $_FILES["profilepic"]["tmp_name"];
        $fileSize = $_FILES["profilepic"]["size"];
        $fileError2 = $_FILES["profilepic"]["error"];
        $fileType2 = $_FILES["profilepic"]["type"];
        $fileName2 = $_FILES["profilepic"]["name"];

        $firstName = $_POST["fname"];
        $lastName = $_POST["lname"];
        $sex = $_POST["sex"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $office = $_POST["office"];
        $userName = $_POST["username"];
        $password = $_POST["password"];
        $previlage = $_POST["role"];
        $staffTag = $_POST["staffTag"];

        // print_r($_POST);

        $fileExt = explode(".",$fileName);
        $fileExt2 = explode(".",$fileName2);
        $actualFileExt = strtolower(end($fileExt));
        $actualFileExt2 = strtolower(end($fileExt2));

        $allowed = array("jpg","jpeg","png","svg");

        if ($fileError == 0 && $fileError2 != 0) {
            if (in_array($actualFileExt,$allowed)) {
                if ($fileSize < 10000000) {

                    $newFileName = uniqid("",true).".".$actualFileExt;

                  
                    $destination = "../Upload/".$newFileName;
            
                    move_uploaded_file($fileTempName,$destination);


                    // save item to DB
                
                    $query = "INSERT INTO users (`fname`, `lname`, `uname`, `pword`, `privilege`, `email`, `address`, `phone`, `sex`, `designation`, `profilepic`) VALUES ('$firstName', '$lastName', '$userName', '$password', '$previlage', '$email', '$address', '$phone', '$sex','$office', '$destination')";

                    $results = mysqli_query($conn, $query);
                    $noofrows = mysqli_affected_rows($conn);
            
                    if ($noofrows == 1) {
                        header("Location: ../View/HrManagement/addUser.php?msg='Registration Successful'");
                    } else {
                        header("Location: ../View/HrManagement/addUser.php?fail= Error:" . mysqli_error($conn));
                    }

                }else{
                     header("Location: ../View/HrManagement/addUser.php?fail='File too large'");
                }
            }else{
                header("Location: ../View/HrManagement/addUser.php?fail='file extension not supported'");
            }
        }elseif($fileError != 0 && $fileError2 == 0){
            if (in_array($actualFileExt,$allowed)) {
                if ($fileSize2 < 10000000) {

                    $newFileName2 = uniqid("",true).".".$actualFileExt2;

                  
                    $destination2 = "../Upload/".$newFileName2;
            
                    move_uploaded_file($fileTempName2,$destination2);

                    // save item to DB
           
                    $query = "INSERT INTO users (`fname`, `lname`, `uname`, `pword`, `privilege`, `email`, `address`, `phone`, `sex`, `designation`, `signature`) VALUES ('$firstName', '$lastName', '$userName', '$password', '$previlage', '$email', '$address', '$phone', '$sex','$office', '$destination2')";

                    $results = mysqli_query($conn, $query);
                    $noofrows = mysqli_affected_rows($conn);
            
                    if ($noofrows == 1) {
                        header("Location: ../View/HrManagement/addUser.php?msg='Registration Successful'");
                    } else {
                        header("Location: ../View/HrManagement/addUser.php?fail= Error:" . mysqli_error($conn));
                    }

                }else{
                     header("Location: ../View/HrManagement/addUser.php?fail='File too large'");
                }
            }else{
                header("Location: ../View/HrManagement/addUser.php?fail='file extension not supported'");
            }
        }elseif($fileError == 0 || $fileError2 == 0 ){
            if (in_array($actualFileExt,$allowed)) {
                if ($fileSize < 10000000 || $fileSize2 < 10000000) {

                    $newFileName = uniqid("",true).".".$actualFileExt;
                    $newFileName2 = uniqid("",true).".".$actualFileExt2;

                  
                    $destination = "../Upload/".$newFileName;
                    $destination2 = "../Upload/".$newFileName2;
            
                    move_uploaded_file($fileTempName,$destination);
                    move_uploaded_file($fileTempName2,$destination2);

                    // save item to DB
         
                    $query = "INSERT INTO users (`fname`, `lname`, `uname`, `pword`, `privilege`, `email`, `address`, `phone`, `sex`, `designation`, `signature`,`profilepic`) VALUES ('$firstName', '$lastName', '$userName', '$password', '$previlage', '$email', '$address', '$phone', '$sex','$office', '$destination2','$destination')";

                    $results = mysqli_query($conn, $query);
                    $noofrows = mysqli_affected_rows($conn);
            
                    if ($noofrows == 1) {
                        header("Location: ../View/HrManagement/addUser.php?msg='Registration Successful'");
                    } else {
                        header("Location: ../View/HrManagement/addUser.php?fail= Error:" . mysqli_error($conn));
                    }

                }else{
                     header("Location: ../View/HrManagement/addUser.php?fail='File too large'");
                }
            }else{
                header("Location: ../View/HrManagement/addUser.php?fail='file extension not supported'");
            }
        }else{

    
            $query = "INSERT INTO users (`fname`, `lname`, `uname`, `pword`, `privilege`, `email`, `address`, `phone`, `sex`, `designation`, `staffTag`) VALUES ('$firstName', '$lastName', '$userName', '$password', '$previlage', '$email', '$address', '$phone', '$sex','$office','$staffTag' )";

            $results = mysqli_query($conn, $query);
            $noofrows = mysqli_affected_rows($conn);
    
            if ($noofrows == 1) {
                header("Location: ../View/HrManagement/addUser.php?msg='Registration Successful'");
            } else {
                header("Location: ../View/HrManagement/addUser.php?fail= Error:" . mysqli_error($conn));
            }
        }
 

        // print_r($signature);
        // print_r($otherDetails);
    }
?>