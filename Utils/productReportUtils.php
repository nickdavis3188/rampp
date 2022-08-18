<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData1 = $post["dateTo"];
     $jsonData2 = $post["dateFrom"];
     $jsonData3 = $post["pId"];
    
     
     $items = array();

        $query = "SELECT * FROM orderditems WHERE productId = '$jsonData3' AND dateOrderd BETWEEN '$jsonData1' AND '$jsonData2'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

    echo json_encode( array("status"=>"success","data"=>$items));
?>