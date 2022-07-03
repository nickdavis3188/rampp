<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData1 = $post["pRegNo"];
     $jsonData2 = $post["venid"];
     
     $items = array();
     
     $query ="SELECT * FROM  lowerpricelpo WHERE purchaseId =".$post["pRegNo"]." AND vendorId = '$jsonData2'";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
        $items[] = $row;
    }
    echo json_encode($items);
    // print_r(count($items));
?>