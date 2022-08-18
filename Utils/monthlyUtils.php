<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData1 = $post["month"];
     $jsonData2 = $post["year"];
    
     
     $items = array();

        $query = "SELECT * FROM orderditems WHERE MONTH(dateOrderd) = '$jsonData1' AND YEAR(dateOrderd) = '$jsonData2 ' ";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

    echo json_encode( array("status"=>"success","data"=>$items));
?>