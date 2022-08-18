<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData = $post["productId"];
    
     
     $items = array();

        $query = "SELECT * FROM inventory WHERE salable='2' AND id='$jsonData'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

    echo json_encode( array($items));
?>