<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
  
     $conn = conString1();
     $jsonData = $post["id"];
    //  print_r($jsonData);

     $items2 = array();
    
     $query2 ="SELECT * FROM  locationproduct WHERE locationId ='$jsonData'";
     $results2 = mysqli_query($conn,$query2);

     while($row2 = mysqli_fetch_array($results2)){
         $items2[] = $row2;
     }
     echo json_encode($items2);
     
?>