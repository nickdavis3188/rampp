<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require('../vendor/autoload.php');
    require("../Utils/updateCompleteOrderCountUtils.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
    
     $conn = conString1();

     $jsonData = $post["category"];
     $items = array();

        $query = "SELECT * FROM inventory WHERE catname ='$jsonData'";
        
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        if (count($items) > 0) {
            echo json_encode( array("status"=>"success","data"=>$items));
        }else{
            echo json_encode( array("status"=>"fail","msg"=>mysqli_error($conn)));   
        }
?>