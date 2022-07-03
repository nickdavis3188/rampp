<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData = $post["pRegNo"];
     
     $items = array();
     
     $query ="SELECT * FROM prequisitioninfo WHERE preqno =".$post["pRegNo"]."";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
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
    
     $supcappdate = $items[0]['supcappdate'];
     $mandcappdate = $items[0]['mandcappdate'];
     $mancappdate = $items[0]['mancappdate'];
     
    echo json_encode(array("preqno" =>$preqno,"compappsup"=>$compappsup,"compappman"=>$compappman,"compappmand"=>$compappmand,'compremman'=>$compremman,'compremmand'=>$compremmand,'compremsup'=>$compremsup,'cmansig'=>$cmansig,'cmandsig'=>$cmandsig,'csupsig'=>$csupsig,'supdate'=>$supcappdate,'mandate'=>$mancappdate,'manddate'=>$mandcappdate));
     
    

?>