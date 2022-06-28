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



     $itemss = array();
     
     $querys ="SELECT * FROM  preqitem WHERE preqno =".$post["pRegNo"]."";
     $resultss = mysql_query($querys);
     
     while($rows = mysql_fetch_array($resultss)){
         $itemss[] = $rows;
    }


     $items1 = array();
     
     $query1 ="SELECT * FROM prequisitionconfirm WHERE pregno =".$post["pRegNo"]."";
     $results1 = mysql_query($query1);
     
     while($row1 = mysql_fetch_array($results1)){
         $items1[] = $row1;
    }

     $items2 = array();
     
     $query2 ="SELECT * FROM  vedorquote WHERE purchaseId =".$post["pRegNo"]."";
     $results2 = mysql_query($query2);
     
     while($row2 = mysql_fetch_array($results2)){
        $items2[] = $row2;
    }

    


   
     $preqno = $items[0]['preqno'];
     $subject = $items[0]['subject'];
     $supcappdate = $items[0]['supcappdate'];
     $mandcappdate = $items[0]['mandcappdate'];
     $mancappdate = $items[0]['mancappdate'];
     $compappsup = $items[0]['compappsup'];
     $compappman = $items[0]['compappman'];

     $compappmand = $items[0]['compappmand'];

     $compremsup = $items[0]['compremsup'];

     $compremman = $items[0]['compremman'];

     $compremmand = $items[0]['compremmand'];

     $csupsig = $items[0]['csupsig'];

     $cmansig = $items[0]['cmansig'];

     $cmandsig = $items[0]['cmandsig'];
     

   

    echo json_encode( array(array("preqno" =>$preqno ,"subject"=>$subject,"supcappdate"=>$supcappdate,"mandcappdate"=>$mandcappdate,"mancappdate"=>$mancappdate,"compappsup"=>$compappsup,"compappman"=>$compappman,"compappmand"=>$compappmand,"compremsup"=>$compremsup,"compremman"=>$compremman,"compremmand"=>$compremmand,"csupsig"=>$csupsig,"cmansig"=>$cmansig,"cmandsig"=>$cmandsig),$items1,$items2,$itemss));
     
    

?>