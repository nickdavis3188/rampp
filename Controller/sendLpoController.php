<?php 
        require("../PhpMailer/PHPMailerAutoload.php");
        require("generalController.php");
        require("../Utils/sendMailUtils.php");
        include("../Env/env.php");
        require("../Connection/dbConnection.php");
    
        $conn = conString1();
        $genControll = new GeneralController();

    if (isset($_POST["send"])) {
    
        $signature = $_FILES["lpo"];
        $fileTempName = $_FILES["lpo"]["tmp_name"];
        $fileSize = $_FILES["lpo"]["size"];
        $fileError = $_FILES["lpo"]["error"];
        $fileType = $_FILES["lpo"]["type"];
        $fileName = $_FILES["lpo"]["name"];

        $vid = $_POST["vid"];
        $pid = $_POST["pid"];
      

        
            $fileExt = explode(".",$fileName);
        
            $actualFileExt = strtolower(end($fileExt));
        
    
            $allowed = array("pdf");
    
            if ($fileError == 0 || $fileError2 == 0 ) {

                if (in_array($actualFileExt,$allowed)) {
                    
                  
                   $updateLpo = $genControll->sendLpoCheck($conn,$vid);
                    if ($updateLpo == "True")
                    {
                        if ($fileSize < 10000000 || $fileSize2 < 10000000) {
        
                            $newFileName = uniqid("",true).".".$actualFileExt;
                          

                          
                            $destination = "../Upload/".$newFileName;
                           
                    
                            move_uploaded_file($fileTempName,$destination);
                        
                            // save item to Db
                            $email = $genControll->getVendorEmail($conn,$vid);
                        //    $em = $email[0]["email"];
                         $mailClient = sendMail($email[0]["email"],$destination,$newFileName);
                            // print_r($email[0]["email"]);
        
                        }else{
                            // echo 'File too large';
                             header("Location: ../View/Procurement/sendLpo1.php?fail='File too large'");
                        }
                        
                    }else{
                        header("Location: ../View/Procurement/sendLpo1.php?fail= Error: $updateLpo"); 
                    }

                }else{
                    // echo 'file extension not supported';
                    header("Location: ../View/Procurement/sendLpo1.php?fail='file extension not supported'");
                }
            }else {
                // echo 'somthing went wrong';
                header("Location: ../View/Procurement/sendLpo1.php?fail='something went wrong'");
            }
       
    }
?>