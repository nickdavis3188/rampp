<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();
     $jsonData = $post["requisitionData"];
     
     $items = array();
     
     $query ="SELECT * FROM  prequisitionconfirm WHERE pregno =".$post["requisitionData"]."";
     $results = mysql_query($query);
     
     while($row = mysql_fetch_array($results)){
        $items[] = $row;
    }
    
    // print_r(count($items));

    if (count($items) == 0) {
        $items2 = array();
     
        $query2 ="SELECT * FROM  vendors";
        $results2 = mysql_query($query2);
        
        while($row2 = mysql_fetch_array($results2)){
            $items2[] = $row2;
       }

       echo json_encode($items2);

    } else {
     
        $items3 = array();
        $query3 ="SELECT *
        FROM vendors
        WHERE id NOT
        IN (
        
        SELECT vendorid
        FROM prequisitionconfirm
        WHERE pregno = '$jsonData'
        )";
        $results3 = mysql_query($query3);
        
        while($row3 = mysql_fetch_array($results3)){
            $items3[] = $row3;
        }
   
       echo json_encode($items3);
        
    }
    


?>