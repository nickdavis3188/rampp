<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
  
     $conn = conString1();
     $jsonData = $post["id"];
    //  print_r($jsonData);

     $items2 = array();
    
     $query2 ="SELECT * FROM  inventryhistory WHERE inid ='".$post["id"]."'";
     $results2 = mysqli_query($conn,$query2);

     while($row2 = mysqli_fetch_array($results2)){
         $items2[] = $row2;
     }

     $items7 = array();
    
     $query7 ="SELECT * FROM  locationproduct WHERE productId ='".$post["id"]."'";
     $results7 = mysqli_query($conn,$query7);

     while($row7 = mysqli_fetch_array($results7)){
         $items7[] = $row7;
     }

     $items8 = array();
     $query8 ="SELECT * FROM  saleslocation ";
     $results8 = mysqli_query($conn,$query8);

     while($row8 = mysqli_fetch_array($results8)){
         $items8[] = $row8;
     }

     $items9 = array();

     foreach ($items8  as $index => $value1) {
        $locationId = $value1["salesLocationId"];
        $locationName = $value1["salesLocationName"];
        foreach ($items7  as $index => $value2) {
            if ( $value2["locationId"] == $locationId) {
                $items9[] = array("locationName"=>$locationName,"Qty"=>$value2["quantityAdded"]);
            }
        }
     }


     $items = array();
    
     $query ="SELECT * FROM inventory WHERE id ='".$post["id"]."'";
     $results = mysqli_query($conn,$query);

     while($row = mysqli_fetch_array($results)){
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



     echo json_encode(array(array("catname" =>$catname ,"productname"=>$productname,"quantityadded"=>$quantityadded,"minnimumlevle"=>$minnimumlevle,"costprice"=>$costprice,"sellingprice"=>$sellingprice,"profit"=>$profit,"preparationtime"=>$preparationtime,"id"=>$id),$items2,$items9));
     

?>