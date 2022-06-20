<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();
     $jsonData1 = $post["pregno"];
     $jsonData2 = $post["venid"];
     
     $items1 = array();
     
     $query1 ="SELECT * FROM  lpouniquevendor WHERE purchaseId =".$post["pregno"]." AND vendorId = '$jsonData2'";
     $results1 = mysql_query($query1);
     
     while($row1 = mysql_fetch_array($results1)){
        $items1[] = $row1;
    }


     $items = array();
     
     $query ="SELECT * FROM  lowerpricelpo WHERE purchaseId =".$post["pregno"]." AND vendorId = '$jsonData2'";
     $results = mysql_query($query);
     
     while($row = mysql_fetch_array($results)){
        $items[] = $row;
    }
    echo json_encode(array($items,$items1) );
    // print_r(count($items));
?>