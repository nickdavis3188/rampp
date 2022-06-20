<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();
    //  $jsonData = $post["pregno"];
     
     $items = array();
     
     $query ="SELECT * FROM  prequisitionconfirm WHERE vendorid =".$post["venid"]." AND  pregno =".$post["pregNo"]."";
     $results = mysql_query($query);
     
     while($row = mysql_fetch_array($results)){
         $items[] = $row;
    }

     $items2 = array();
     
     $query2 ="SELECT * FROM  vedorquote WHERE vendorId =".$post["venid"]." AND  purchaseId =".$post["pregNo"]."";
     $results2 = mysql_query($query2);
     
     while($row2 = mysql_fetch_array($results2)){
        $items2[] = $row2;
    }
    


   
     $pregno = $items[0]['pregno'];
     $vendorid = $items[0]['vendorid'];
     $for = $items[0]['for'];
     $vname = $items[0]['vname'];
     $from = $items[0]['from'];
     $date = $items[0]['date'];
 
    echo json_encode( array(array("pregno" =>$pregno ,"vendorid"=>$vendorid,"for"=>$for,"vname"=>$vname,"from"=>$from,"date"=>$date),$items2));
     
    

?>