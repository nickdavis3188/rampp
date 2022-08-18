<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData = $post["orderId"];
    
     
 
     
     $items3 = array();
                 
     $query3 ="SELECT * FROM  orders WHERE orderid ='$jsonData'";
     $results3 = mysqli_query($conn,$query3);
     
     while($row3 = mysqli_fetch_array($results3)){
        $items3[] = $row3;
    }

    $items = array();
    //  $query = "SELECT * FROM  WHERE salable='2'";
     $query ="SELECT * FROM  orderditems WHERE orderid ='$jsonData'";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
        $items[] = $row;
    }
    

    echo json_encode( array("item"=>$items,"order"=>$items3));
?>