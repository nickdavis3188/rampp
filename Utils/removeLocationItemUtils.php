<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
   
     $conn = conString1();
     $productId = $post["productId"];
     $locationId = $post["locationId"];

    $query = "DELETE FROM locationproduct WHERE productId = '$productId' AND locationId= '$locationId'";
    $results = mysqli_query($conn, $query);
    $noofrows = mysqli_affected_rows($conn); 
    if($noofrows==1)
    { 
        $items2 = array();
    
        $query2 ="SELECT * FROM saleslocation WHERE salesLocationId='$locationId'";
        $results2 = mysqli_query($conn,$query2);

        while($row2 = mysqli_fetch_array($results2)){
            $items2[] = $row2;
        }
        // 
        $qty2 = $items2[0]["productQty"] - 1;
        $query = "UPDATE saleslocation SET productQty= '$qty2' WHERE salesLocationId='$locationId'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {       
            echo json_encode( array("status"=>"success"));   
        }
        else
        {
            echo json_encode( array("status"=>"fail","msg"=>"Error:".mysqli_error($conn)));
        }  
       
    }else{
        echo json_encode( array("status"=>"fail","msg"=>"Error:".mysqli_error($conn)));
    }  
?>