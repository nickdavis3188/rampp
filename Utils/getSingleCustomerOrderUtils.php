<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require("../Controller/generalController.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
    $UserUtils = new GeneralController();
  
  
    $conn = conString1();
    $jsonData = $post["cusId"];
    // 
    $allOrder = $UserUtils->getorderItemById($conn,$jsonData);
    // 
    if (count($allOrder) >= 1)
    {
        echo json_encode(array("status" =>"success","data"=>$allOrder));
    }else{
        echo json_encode(array("status" =>"fail","msg"=>"kNo order from this customer"));
    }

?>
