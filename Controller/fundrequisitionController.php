<?php 
        session_start();
        require("generalController.php");
        include("../Env/env.php");
        require("../Connection/dbConnection.php");
    
        $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
        $conn->connect();
        $genControll = new GeneralController();

    if (isset($_POST["submitF"])) {
        if ($_FILES['document']["size"] != 0) {
        
            $document = $_FILES['document'];
            $documentTempName = $_FILES["document"]["tmp_name"];
            $documentSize = $_FILES["document"]["size"];
            $documentError = $_FILES["document"]["error"];
            $documentType = $_FILES["document"]["type"];
            $documentName = $_FILES["document"]["name"];
    
         
            $reqno = $_POST['reqno'];
            $from = $_POST['from'];
            $dateCreate = $_POST['date'];
            $amount = $_POST['amount'];
            $amountword = $_POST['amountword'];
            $subject = mysql_real_escape_string($_POST['subject']);
            // $address = $_POST['address'];
            $justification = mysql_real_escape_string($_POST['justification']);
            $toO = $_POST['to'];
            $uname= $_SESSION['userName'];
    
    
           
    
            $fileExt = explode(".",$documentName);
       
            $actualFileExt = strtolower(end($fileExt));
       
    
    
            if ($documentError == 0 ) {
      
                if ($documentSize < 10000000 ) {

                    $newFileName = uniqid("",true).".".$actualFileExt;
                             
                    $destination = "../Upload/".$newFileName;
                
            
                    move_uploaded_file($documentTempName,$destination);
                    // print_r();
                    // print_r("$destination<br/>$reqno<br/>$from<br/>$dateCreate<br/>$amount<br/>$amountword<br/>$subject<br/>$justification<br/>$toO<br/>$uname");
                    $query = "INSERT INTO fundrequisition
                    (`fregno`, `from` ,`datecreated`, `ammount`,`ammountword`,`subject`, `file`, `justification`, `manstatus`,`mandsatus`,`supstatus`,`to`,`reqfrom`)VALUES
                    ('$reqno','$from','$dateCreate','$amount','$amountword','$subject','$destination','$justification','Pending','Pending','Pending','$toO','$uname')";
                    $results = mysql_query($query);
                    $noofrows = mysql_affected_rows();
            
                    if($noofrows==1)
                    {
                        header("Location: ../View/FundRequisision/createFundRequisition.php?msg='Request Successfully Sent");
                     
                    }
                    else
                    {
                        header("Location: ../View/FundRequisision/createFundRequisition.php?fail= Error:".mysql_error());          
                    }
                    // save item to DB
                

                }else{
                        header("Location: ../View/FundRequisision/createFundRequisition.php?fail=File too large");
                }
            
            }else {
                header("Location: ../View/FundRequisision/createFundRequisition.php?fail= File Error");
            }
        } else {
            // echo "No";
            $reqno = $_POST['reqno'];
            $from = $_POST['from'];
            $dateCreate = $_POST['date'];
            $amount = $_POST['amount'];
            $amountword = $_POST['amountword'];
            $subject = mysql_real_escape_string($_POST['subject']);
            $justification = mysql_real_escape_string($_POST['justification']);
            $toO = $_POST['to'];
            $uname= $_SESSION['userName'];
    
            $query = "INSERT INTO fundrequisition
            (`fregno`, `from` ,`datecreated`, `ammount`,`ammountword`,`subject`, `file`, `justification`, `manstatus`,`mandsatus`,`supstatus`,`to`,`reqfrom`)VALUES
            ('$reqno','$from','$dateCreate','$amount','$amountword','$subject','','$justification','Pending','Pending','Pending','$toO','$uname')";
            $results = mysql_query($query);
            $noofrows = mysql_affected_rows();
    
            if($noofrows==1)
            {
                header("Location: ../View/FundRequisision/createFundRequisition.php?msg='Request Successfully Sent");
             
            }
            else
            {
                header("Location: ../View/FundRequisision/createFundRequisition.php?fail= Error:".mysql_error());          
            }
         
        }     
    }
?>