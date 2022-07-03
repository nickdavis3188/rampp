<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
  
     $conn = conString1();
     $jsonData = $post["requisitionData"];
     
     $items = array();

     $query ="SELECT * FROM  lpouniquevendor WHERE purchaseId =".$post["requisitionData"]." AND lpocreated ='Yes' AND approvemand='approve' AND lposent='0'";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
        $items[] = $row;
    }
    echo json_encode($items);
    // print_r(count($items));
?>