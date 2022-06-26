<?php 
    session_start();
    $post = (array) json_decode(file_get_contents('php://input'),false);
    include("../Utils/arrayDataUtils.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();
   

    $jsonData = $post["requisitionData"];
    $uname= $_SESSION['userName'];
    $RequisitionNumber =$jsonData->RequisitionNumber;
    $from = $jsonData->from;
    $Subject = $jsonData->Subject;
    $Date = $jsonData->Date;
    $Summary = $jsonData->Summary;
   
    $Total = $jsonData->Total;
    $requesItem = $jsonData->item;
   

  
    $query1 = "INSERT INTO prequisitioninfo (`preqno`,`from`,`subject`,`date`,`summary`,`total`,`supapprove`,`manapprove`,`mandapprove`,`reqfrom`,`compappsup`,`compappman`,`compappmand`) VALUES ('$RequisitionNumber','$from','$Subject','$Date','$Summary','$Total','Pending','Pending','Pending','$uname','Pending','Pending','Pending')";

    $results = mysql_query($query1);
    $noofrows = mysql_affected_rows();
    
    if($noofrows==1)
    {
       $res = uploadArray($requesItem);
       if ($res == "true") {
           echo json_encode(array("status" =>"success" ));        
       }else {
           echo json_encode(array("status" =>"fail","msg"=>"Erro".mysql_error() ));
       }
     
    }
    else
    {     
        echo json_encode(array("status" =>"fail","msg"=>"Erro: ".mysql_error()));
    }
?>