<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require("./completeOrderUtils.php");

  
    $conn = conString1();

    if (isset($_POST['restock'])) {

        $itemNumber = $_POST["qtyrem"];
        $oderItemid = $_POST["oderItemid"];
        $oderid = $_POST["oderid"];
        $itemId = $_POST["inventryid"];
        $date = $_POST["date"];
        $reason = $_POST["reason"];
        $reason1 = mysqli_real_escape_string($conn,$reason);
        // $type = $_POST["type"];
        $dec = 2;
        // if()
        $items = array();
    
        $query ="SELECT * FROM inventory WHERE id='$itemId'";
        $results = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
        }
        
        if (count($items) >= 1) {
        
            $reducedAmount = $items[0]["quantityadded"] + $itemNumber;
            $amount = $items[0]["sellingprice"] * $itemNumber;         
            $singleamount = $items[0]["sellingprice"];         
            $salable = $items[0]["salable"] ;         
            $profit = $items[0]["profit"] ;         
                
            $query = "INSERT INTO inventryhistory
            (`inid`,`date`,`restock`,`reduce`,`reason`,`increasby`,`reduceby`,`type`,`price`) VALUES
             ('$itemId','$date','2','0','$reason1','$itemNumber','0','$salable','$amount')";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
    
            if($noofrows==1)
            {
               
                $query = "UPDATE inventory SET quantityadded= '$reducedAmount' WHERE id='$itemId'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {
                    $items3 = array();
                
                    $query3 ="SELECT * FROM  orderditems WHERE id ='$oderItemid'";
                    $results3 = mysqli_query($conn,$query3);
                    
                    while($row3 = mysqli_fetch_array($results3)){
                        $items3[] = $row3;
                    }

                    $qty = $items3["0"]["quantity"] - $itemNumber ; 
                    $location = $items3["0"]["location"]; 
                    $productId = $items3["0"]["productId"]; 
                    $amu = $items3["0"]["price"] * $qty;
                    $prof = $profit * $qty;

                    $query = "UPDATE orderditems SET profit ='$prof', amount='$amu', quantity='$qty' WHERE id='$oderItemid '";
                    $results = mysqli_query($conn,$query);
                    $noofrows = mysqli_affected_rows($conn);
                   
                    reduceLocationInventry($conn,$productId,$itemNumber,$location);

                    $items4 = array();
                
                    $query4 ="SELECT * FROM  orderditems WHERE orderid ='$oderid'";
                    $results4 = mysqli_query($conn,$query4);
                    
                    while($row4 = mysqli_fetch_array($results4)){
                        $items4[] = $row4;
                    }

                    //
                    $items5 = array();
                
                    $query5 ="SELECT * FROM  orders WHERE orderid ='$oderid'";
                    $results5 = mysqli_query($conn,$query5);
                    
                    while($row5 = mysqli_fetch_array($results5)){
                        $items5[] = $row5;
                    }
                    $locationName = $items5["0"]["locationName"]; 
                    //
                    
                    $totAm = 0;
                    $totalAmu = array();
                    for ($i=0; $i < count($items4); $i++) { 
                        $totalAmu[] = $items4[$i]["amount"];
                    }

                    for ($v=0; $v < count($totalAmu); $v++) { 
                        $totAm += $totalAmu[$v];
                    }


                    $totPr = 0;
                    $totalProf = array();
                    for ($i=0; $i < count($items4); $i++) { 
                        $totalProf[] = $items4[$i]["profit"];
                    }

                    for ($t=0; $t < count($totalProf); $t++) { 
                        $totPr += $totalProf[$t];
                    }

                    $fivePercent = 0.05;
                    $fivePercentOfTotal = $totAm * $fivePercent;

                    $sch = ($locationName == "Reception 1"||$locationName == "Reception 2")?$fivePercentOfTotal:0;
                    $query = "UPDATE orders SET totalammount ='$totAm', totalProfit='$totPr', serviceCharge='$sch' WHERE orderid ='$oderid'";
                    $results = mysqli_query($conn,$query);
                    $noofrows = mysqli_affected_rows($conn);

                    header("Location: ../View/Ordering/editOrder.php?msg= Reduction Successful");  
                }
                else
                {
                    header("Location: ../View/Ordering/editOrder.php?fail= Error:".mysqli_error($conn)); 
                }
            }
            else
            {
                header("Location: ../View/Ordering/editOrder.php?fail= Error:".mysqli_error($conn));         
            }
         
        }else{
            header("Location: ../View/Ordering/editOrder.php?fail= Error: Item Not Found"); 
        }
           
       
        
    }
 
?>