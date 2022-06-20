<?php 
        session_start();
        require("generalController.php");
        include("../Env/env.php");
        require("../Connection/dbConnection.php");
    
        $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
        $conn->connect();
        $genControll = new GeneralController();

    if (isset($_POST["submitF"])) {
        
       
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
        $subject = $_POST['subject'];
        $address = $_POST['address'];
        $justification = $_POST['justification'];
        $toO = $_POST['to'];
        $uname= $_SESSION['userName'];


        // print_r($_POST);

        $fileExt = explode(".",$documentName);
   
        $actualFileExt = strtolower(end($fileExt));
   

        $allowed = array("jpg","jpeg","png","svg");

        if ($documentError == 0 ) {
            if (in_array($actualFileExt,$allowed)) {
                if ($documentSize < 10000000 ) {

                    $newFileName = uniqid("",true).".".$actualFileExt;
                

                  
                    $destination = "../Upload/".$newFileName;
              
            
                    move_uploaded_file($fileTempName,$destination);
                 
                   
                    // save item to DB
                    $genControll->fundreqest($reqno,$from,$dateCreate,$amount,$amountword,$subject,$destination,$justification,'Pending','Pending','Pending',$toO,$uname);

                }else{
                     header("Location: ../View/FundRequisision/createFundRequisition.php?fail='File too large'");
                }
            }else{
                header("Location: ../View/FundRequisision/createFundRequisition.php?fail='file extension not supported'");
            }
        }else {
            header("Location: ../View/FundRequisision/createFundRequisition.php?fail='somthing went wrong'");
        }
 

        // print_r($signature);
        // print_r($otherDetails);
    }
?>