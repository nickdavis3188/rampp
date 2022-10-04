<?php 
    session_start();
    $post = (array) json_decode(file_get_contents('php://input'),false);
    include("../Utils/arrayDataUtils.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    
    $conn = conString1();
   

    $jsonData = $post["requisitionData"];
    $uname= $_SESSION['userName'];
    $RequisitionNumber =$jsonData->RequisitionNumber;
    $from = $jsonData->from;
    $Subject = $jsonData->Subject;
    $Date = $jsonData->Date;
    $Summary = $jsonData->Summary;
   
    $Total = $jsonData->Total;
    $requesItem = $jsonData->item;
   

  
    $query1 = "INSERT INTO prequisitioninfo (`preqno`,`from`,`subject`,`date`,`summary`,`total`,`supapprove`,`manapprove`,`mandapprove`,`reqfrom`,`compappsup`,`compappman`,`compappmand`,`manremark`,`mandremark`,`supremark`,`mansig`,`mandsig`,`supsig`,`compremsup`,`compremman`,`compremmand`,`csupsig`,`cmansig`,`cmandsig`,`quoted`,`csupapprove`) VALUES ('$RequisitionNumber','$from','$Subject','$Date','$Summary','$Total','Pending','Pending','Pending','$uname','Pending','Pending','Pending','','','','','','','','','','','','','0','')";

    $results = mysqli_query($conn,$query1);
    $noofrows = mysqli_affected_rows($conn);
    
    if($noofrows==1)
    {
       $res = uploadArray($conn,$requesItem);
       if ($res == "true") {
           echo json_encode(array("status" =>"success" ));        
       }else {
           echo json_encode(array("status" =>"fail","msg"=>"Erro".mysqli_error($conn) ));
       }
     
    }
    else
    {     
        echo json_encode(array("status" =>"fail","msg"=>"Erro: ".mysqli_error($conn)));
    }
?>