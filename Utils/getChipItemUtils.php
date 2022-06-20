<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();
     $jsonData1 = $post["pRegNo"];
     $jsonData2 = $post["venid"];
     
     $items = array();
     
     $query ="SELECT * FROM  lowerpricelpo WHERE purchaseId =".$post["pRegNo"]." AND vendorId = '$jsonData2'";
     $results = mysql_query($query);
     
     while($row = mysql_fetch_array($results)){
        $items[] = $row;
    }
    echo json_encode($items);
    // print_r(count($items));
?>