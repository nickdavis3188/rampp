<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();
     $jsonData = $post["pRegNo"];
     
     $items = array();
     
     $query ="SELECT * FROM prequisitioninfo WHERE preqno =".$post["pRegNo"]."";
     $results = mysql_query($query);
     
     while($row = mysql_fetch_array($results)){
         $items[] = $row;
    }


   
     $preqno = $items[0]['preqno'];
    
     $compappsup = $items[0]['compappsup'];
     $compappman = $items[0]['compappman'];
     $compappmand = $items[0]['compappmand'];

     $compremsup = $items[0]['compremsup'];
     $compremman = $items[0]['compremman'];
     $compremmand = $items[0]['compremmand'];

     $csupsig = $items[0]['csupsig'];
     $cmansig = $items[0]['cmansig'];
     $cmandsig = $items[0]['cmandsig'];
   

    echo json_encode(array("preqno" =>$preqno,"compappsup"=>$compappsup,"compappman"=>$compappman,"compappmand"=>$compappmand,'compremman'=>$compremman,'compremmand'=>$compremmand,'compremsup'=>$compremsup,'cmansig'=>$cmansig,'cmandsig'=>$cmandsig,'csupsig'=>$csupsig));
     
    

?>