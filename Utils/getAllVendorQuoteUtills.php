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

   

    echo json_encode( array(array("preqno" =>$preqno ,"subject"=>$subject,),$items1,$items2,$itemss));
     
    

?>