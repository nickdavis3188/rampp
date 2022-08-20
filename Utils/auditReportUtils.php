<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);

  
    $conn = conString1();
    // $jsonData1 = $post["dateTo"];
    // $jsonData2 = $post["dateFrom"];

    $jsonData1 = $post["dateTo"];
    $jsonData2 = $post["dateFrom"];
    $formattedfdate = date("Y-m-d", strtotime($jsonData2));
    $formattedtdate = date("Y-m-d", strtotime($jsonData1));

    $items1 = array();
    $query = "SELECT * FROM expenses WHERE date BETWEEN '$formattedfdate' AND '$formattedtdate' ORDER BY date";

    $results = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($results)) {
        $items1[] = $row;
    }


    $items2 = array();
    $query ="SELECT * FROM orderditems WHERE dateOrderd BETWEEN '$formattedfdate' AND '$formattedtdate' ORDER BY dateOrderd";
    $results = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($results)){
        $items2[] = $row;
   }


   $costPrice = 0;
   $sellingPrice = 0;
   $profit2 = 0;
   foreach ($items2 as $index => $value1) {
        $costPrice += $value1["costprice"];
        $sellingPrice += $value1["sellingprice"];
        $prof = $value1["sellingprice"] - $value1["costprice"];
        $profit2 += $prof;
    }

   $capital = 0;
   $recurrent = 0;
   $reinvestment = 0;
   foreach ($items1 as $index => $value1) { 
        if ($value1["expensesType"] == "capital") {
            $capital += $value1["amount"];
        }elseif ($value1["expensesType"] == "recurrent") {
            $recurrent += $value1["amount"];
        }else {
            $reinvestment += $value1["amount"];
        }   
   }

   $bar = 0;
   $kitchen = 0;
   $profit = 0;
   foreach ($items2 as $index => $value2) { 
        if ($value2["prepAt"] == "Bar") {
            $bar += $value2["amount"];
            $profit += $value2["profit"];
        }else {
            $kitchen += $value2["amount"];
            $profit += $value2["profit"];
        }
   }

    echo json_encode( array("status"=>"success","data"=>array("expenses"=>array("capital"=>$capital,"recurrent"=>$recurrent,"reinvestment"=>$reinvestment),"sales"=>array("bar"=>$bar,"kitchen"=>$kitchen,"profit"=>$profit),"stock"=>array("costValue"=>$costPrice,"sellingValue"=>$sellingPrice,"stockProfit"=>$profit2))));
?>

