<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 

     $conn = conString1();
     $jsonData1 = $post["pregno"];
     $jsonData2 = $post["venid"];
     
     $items1 = array();
     
     $query1 ="SELECT * FROM  lpouniquevendor WHERE purchaseId =".$post["pregno"]." AND vendorId = '$jsonData2'";
     $results1 = mysqli_query($conn,$query1);
     
     while($row1 = mysqli_fetch_array($results1)){
        $items1[] = $row1;
    }


     $items = array();
     
     $query ="SELECT * FROM  lowerpricelpo WHERE purchaseId =".$post["pregno"]." AND vendorId = '$jsonData2'";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
        $items[] = $row;
    }
    echo json_encode(array($items,$items1) );
    // print_r(count($items));
?>