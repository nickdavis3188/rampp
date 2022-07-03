<?php 
        session_start();
        require("generalController.php");
        include("../Env/env.php");
        require("../Connection/dbConnection.php");
    
       
        $conn = conString1();
        $genControll = new GeneralController();

    if (isset($_POST["update"])) {
        if ($_FILES['signature']["size"] != 0) {
        
            $document = $_FILES['signature'];
            $documentTempName = $_FILES["signature"]["tmp_name"];
            $documentSize = $_FILES["signature"]["size"];
            $documentError = $_FILES["signature"]["error"];
            $documentType = $_FILES["signature"]["type"];
            $documentName = $_FILES["signature"]["name"];
     
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
            $username = $_POST['username'];
            $id = $_POST['id'];
            

            $query ="SELECT `signature` FROM users WHERE uname='$username'";
            $result = ($conn->query($query));
            //declare array to store the data of database
            $row = array(); 
          
            if ($result->num_rows > 0) 
            {          
                // fetch all data from db into array 
                $row = $result->fetch_all(MYSQLI_ASSOC);       
            } 

            if ($row[0]["signature"]) {         
                $myfilename = $genControll->str_slice($row[0]["signature"],3);
                $path = $_SERVER['DOCUMENT_ROOT'].'Upload/'.$myfilename;
                unlink($path);
            }

            $fileExt = explode(".",$documentName);
       
            $actualFileExt = strtolower(end($fileExt));
       
    
            if ($documentError == 0 ) {
      
                if ($documentSize < 10000000 ) {

                    $newFileName = uniqid("",true).".".$actualFileExt;
                             
                    $destination = "../Upload/".$newFileName;
                
            
                    move_uploaded_file($documentTempName,$destination);

                    $query = "UPDATE users SET email= '$email', pword='$pwd',id='$id',signature='$destination' WHERE id='$itemId'";
                    $results = mysqli_query($conn,$query);
                    $noofrows = mysqli_affected_rows($conn);
                    if ($noofrows == 1)
                    {
                        header("Location: ../View/settings/userSettings.php?msg= Profile Update Successful &modify=0");        
                    }
                    else
                    {
                        header("Location: ../View/settings/userSettings.php?modify=1 & fail= Error:".mysqli_error($conn)); 
                    }
                    // save item to DB
                

                }else{
                        header("Location: ../View/settings/userSettings.php?modify=1 &fail=File too large");
                }
            
            }else {
                header("Location: ../View/settings/userSettings.php?modify=1 &fail= File Error");
            }
        } else {
            // echo "No";
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
            $username = $_POST['username'];
            $id = $_POST['id'];
                  
            $query = "UPDATE users SET email= '$email', pword='$pwd',uname='$username' WHERE id='$id'";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows == 1)
            {
                header("Location: ../View/settings/userSettings.php?msg= Profile Update Successful &modify=0");        
            }
            else
            {
                header("Location: ../View/settings/userSettings.php?modify=1 & fail= Error:".mysqli_error($conn)); 
            }
            // save item to DB
        
         
        }     
    }
?>