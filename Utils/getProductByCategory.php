<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    header('Access-Control-Allow-Origin: *');
    $post = (array) json_decode(file_get_contents('php://input'),false);
    
     $conn = conString1();

     $jsonData = $post["category"];

     $dd = implode(',',$jsonData);
     $items2 = array();

    $query2 = "SELECT * FROM subcategory WHERE category IN('$dd')";
    
    $results2 = mysqli_query($conn, $query2);

    while ($row2 = mysqli_fetch_array($results2)) {
        $items2[] = $row2;
    }
    $returnArray2 = array();
    if (count($items2) > 0) {
        foreach ($items2 as $index => $value) {
            $returnArray2[] = array("subCategoryId"=>$value["subCategoryId"],"subCategoryName"=>$value["subCategoryName"],"categoryName"=>$value["category"]);
        }
    }else{}

     $items = array();

        $query = " CALL `getProductByCategory`(@p0); ";
        $stm = $conn->prepare($query);
        $stm->bind_param("@p0",$dd);
        $stm->execute();
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
            echo json_encode( array("status"=>"success","data"=>array("data"=>$returnArray,"subCategory"=>$returnArray2)));
        }else{
            header('Content-Type:application/json; charset-utf-8',true,404);
            echo json_encode( array("status"=>"fail","msg"=>"No Data","data"=>array()));     
        }
?>