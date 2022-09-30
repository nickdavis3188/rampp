<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require('../vendor/autoload.php');

    header('Access-Control-Allow-Origin: *');
    $post = (array) json_decode(file_get_contents('php://input'),false);
    
     $conn = conString1();

     $items = array();

        $query = "SELECT * FROM inventory";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        if (count($items) > 0) {
            $returnArray = array();
            foreach ($items as $index => $value) {
                $returnArray[] = array("productId"=>$value["id"],"productName"=>$value["productname"],"productDescription"=>$value["description"],"salingPrice"=>$value["sellingprice"],"productCategory"=>$value["catname"],"preparationTime"=>$value["preparationtime"],"img"=>$value["productImg"]);
            }
            header('Content-Type:application/json; charset-utf-8',true,200);
            echo json_encode( array("status"=>"success","data"=>$returnArray));
        }else{
            header('Content-Type:application/json; charset-utf-8',true,404);
            echo json_encode( array("status"=>"fail","msg"=>"No Data","data"=>array()));    
        }
?>