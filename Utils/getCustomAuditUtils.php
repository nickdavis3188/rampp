<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData = $post["mm"];
     $jsonData1 = $post["yy"];

     
     
        $items = array();

        $query = "SELECT * FROM customAudit WHERE MONTH(date) = '$jsonData ' AND YEAR(date) = '$jsonData1'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        echo json_encode( array("status"=>"success","msg"=>$items));

?>