<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData1 = $post["dateTo"];
     $jsonData2 = $post["dateFrom"];
     $formattedfdate = date("Y-m-d", strtotime($jsonData2));
     $formattedtdate = date("Y-m-d", strtotime($jsonData1));
     
     $items = array();

        $query = "SELECT * FROM orders WHERE orderdate BETWEEN '$formattedfdate' AND '$formattedtdate' ORDER BY orderdate";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

    echo json_encode( array("status"=>"success","data"=>$items));
?>