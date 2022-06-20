<?php 
        require("../PhpMailer/PHPMailerAutoload.php");
        require("generalController.php");
        include("../Env/env.php");
        require("../Connection/dbConnection.php");
    
        $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
        $conn->connect();
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
                    
                  
                   $updateLpo = $genControll->sendLpoCheck($vid);
                    if ($updateLpo == "True")
                    {
                        if ($fileSize < 10000000 || $fileSize2 < 10000000) {
        
                            $newFileName = uniqid("",true).".".$actualFileExt;
                          
                          
                            $destination = "../Upload/".$newFileName;
                           
                    
                            move_uploaded_file($fileTempName,$destination);
                        
                            // save item to DB
                            $email = $genControll->getVendorEmail($vid);
                        //    $em = $email[0]["email"];
                            try {
                                $email = new PHPMailer();
                                $email->From = "buadors@bualogistics.com";
                                $email->FromName = "RAMPP";
                                // $to_email ="nyaknodavis318@gmail.com";
                                $to_email = $em;
                                $email->AddAddress($to_email);
                                $email->Subject = "Local Purchase Order";
                                
                                $body = "<table>
                                             <tr>
                                                <th align='left'>Greetings,</th>
                                                <th></th>
                                             </tr>
                                             <tr>
                                                <td colspan='2'><p>Please find attached a Local Purchase Order for your company.</p>
                                                </td>
                                             </tr>
                                             <tr>
                                              <td colspan='2'><p>Thanks</p><br>Best Regards<br></td>
                                              
                                            </tr>	
                                            <table>";
                                $body = preg_replace('/\\\\/','', $body);
                                $email->MsgHTML($body);		
                                $email->IsSendmail();
                                $email->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
                                $email->WordWrap   = 80; 
                                $email->AddAttachment($destination,$newFileName);
                                $email->IsHTML(true);
                                 $email->Send();
                 
                                header("Location: ../View/Procurement/sendLpo1.php?msg='The LPO has been successfully sent.'");
                                }
                                catch (phpmailerException $e) {
                                    // echo $e->errorMessage();
                                    header("Location: ../View/Procurement/sendLpo1.php?fail=".$e->errorMessage());
                                }
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