<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $expensesCapital = $post["expensesCapital"];
     $expensesRecurrent = $post["expensesRecurrent"];
     $expensesReinvestment = $post["expensesReinvestment"];
     $stockCostValue = $post["stockCostValue"];
     $stockSellingValue = $post["stockSellingValue"];
     $stockProfit = $post["stockProfit"];
     $totalBar = $post["totalBar"];
     $totalKitchen = $post["totalKitchen"];
     $salesProfit = $post["salesProfit"];
     $date = $post["date"];
     $lost = $post["lost"];

     
     
        $items = array();

        $query = "SELECT * FROM customAudit ";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        if (count($items) >= 1) {
            
            foreach ($items as $index => $value) {  
                $id = $value["id"];
                $query1 = "DELETE FROM customAudit WHERE id = '$id' ";    
                $results1 = mysqli_query($conn,$query1);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows < 1)
                {
                    echo json_encode( array("status"=>"fail","data"=>mysqli_error($conn)));              
                }
            }

            $query = "INSERT INTO  customAudit (`expensesCapital`, `expensesRecurrent` ,`expensesReinvestment`, `stockCostValue`,`stockSellingValue`,`stockProfit`,`totalBar`,`totalKitchen`,`salesProfit`,`date`,`lost`)VALUES ('$expensesCapital','$expensesRecurrent','$expensesReinvestment','$stockCostValue','$stockSellingValue','$stockProfit','$totalBar','$totalKitchen','$salesProfit','$date','$lost')";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn); 
            if($noofrows==1)
            {
                echo json_encode( array("status"=>"success","msg"=>"done"));
            }
        }else{
            $query = "INSERT INTO  customAudit (`expensesCapital`, `expensesRecurrent` ,`expensesReinvestment`, `stockCostValue`,`stockSellingValue`,`stockProfit`,`totalBar`,`totalKitchen`,`salesProfit`,`lost`)VALUES ('$expensesCapital','$expensesRecurrent','$expensesReinvestment','$stockCostValue','$stockSellingValue','$stockProfit','$totalBar','$totalKitchen','$salesProfit','$lost')";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn); 
            if($noofrows==1)
            {
                echo json_encode( array("status"=>"success","msg"=>"done"));
            }
        }

?>