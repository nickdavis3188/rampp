<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require('../vendor/autoload.php');
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
  
     $conn = conString1();
     $jsonData = $post["orderId"];
     $jsonData2 = $post["prepAt"];     

     
     $query ="UPDATE orderditems SET finish='0' WHERE orderid ='$jsonData' AND prepAt='$jsonData2'";
     $results = mysqli_query($conn,$query);
     $noofrows = mysqli_affected_rows($conn);
     if ($noofrows >= 1)
     {
        $k = $jsonData2 == "Kitchen"?1:0;
        if ($k == 1) {
            $query ="UPDATE orders SET `status`='0',`k`='0' WHERE orderid ='$jsonData'";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows == 1)
            {
                echo json_encode(array("status" =>"success"));
            }else{
                echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
            } 
        }else{
            $query ="UPDATE orders SET `status`='0',`b`='0' WHERE orderid ='$jsonData'";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows == 1)
            {
                echo json_encode(array("status" =>"success"));
            }else{
                echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
            } 
        }
    }else{
        echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
    }
   
?>