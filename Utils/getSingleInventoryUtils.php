<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();
     $jsonData = $post["id"];
    //  print_r($jsonData);

     $items2 = array();
    
     $query2 ="SELECT * FROM  inventryhistory WHERE inid ='".$post["id"]."'";
     $results2 = mysql_query($query2);

     while($row2 = mysql_fetch_array($results2)){
         $items2[] = $row2;
     }


     $items = array();
    
     $query ="SELECT * FROM inventory WHERE id ='".$post["id"]."'";
     $results = mysql_query($query);

     while($row = mysql_fetch_array($results)){
         $items[] = $row;
     }

   
     $catname = $items[0]['catname'];
     $productname = $items[0]['productname'];
     $quantityadded = $items[0]['quantityadded'];
     $minnimumlevle = $items[0]['minnimumlevle'];
     $costprice = $items[0]['costprice'];
     $sellingprice = $items[0]['sellingprice'];
     $profit = $items[0]['profit'];
     $preparationtime = $items[0]['preparationtime'];
     $id = $items[0]['id'];



     echo json_encode(array(array("catname" =>$catname ,"productname"=>$productname,"quantityadded"=>$quantityadded,"minnimumlevle"=>$minnimumlevle,"costprice"=>$costprice,"sellingprice"=>$sellingprice,"profit"=>$profit,"preparationtime"=>$preparationtime,"id"=>$id),$items2));
     

?>