<?php 
    session_start();
    $post = (array) json_decode(file_get_contents('php://input'),false);
    include("../Utils/arrayItem22Utils.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require('../vendor/autoload.php');

    
    $conn = conString1();
   
    $jsonData = $post["orderData"];
    $sellerid =$jsonData->sellerId;
    $orderid = $jsonData->orderId;
    $totaltime = $jsonData->totaltime;
    $totalammount = $jsonData->totalamount;
    $orderdate = $jsonData->orderdate;
    $odertime = $jsonData->orderTime;
    $hr = $jsonData->hr;
    $min = $jsonData->min;
    $ampm = $jsonData->ampm;
    $br = $jsonData->br;
    $kch = $jsonData->kch;
    $kt = $jsonData->kt;
    $bt = $jsonData->bt;
    $totalProfit = $jsonData->totalProfit;

    //items
    $orderItems = $jsonData->items;
    
    foreach ($orderItems as $index => $value) {    

      $reduceBy = $value->quantity;
      $productId = $value->productId;
      $dateOrderd = $value->dateOrderd;

        $items = array();
    
        $query ="SELECT * FROM inventory WHERE id='$productId'";
        $results = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
        }
        
        if (count($items) >= 1) {
        
            $reducedAmount = $items[0]["quantityadded"] - $reduceBy;
                
            $query = "INSERT INTO inventryhistory
            (`inid`,`date`,`restock`,`reduce`,`reason`,`increasby`,`reduceby`) VALUES
             ('$productId','$dateOrderd','0','2','Ordered','0','$reduceBy')";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
    
            if($noofrows==1)
            {
               
                $query = "UPDATE inventory SET quantityadded= '$reducedAmount' WHERE id='$productId'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {
                     
                }
                else
                {
                  echo json_encode(array("status" =>"fail","msg"=>"Erro: ".mysqli_error($conn)));
                }
            }
            else
            {
              echo json_encode(array("status" =>"fail","msg"=>"Erro: ".mysqli_error($conn)));   
            }
         
        }else{
          echo json_encode(array("status" =>"fail","msg"=>"Erro: Item Not Found"));
        }
    }


$query1 = "INSERT INTO orders (`sellerid`,`orderid`,`totaltime`,`totalammount`,`status`,`orderdate`,`odertime`,`hr`,`min`,`ampm`,`br`,`kch`,`k`,`b`,`receipt`,`bill`,`kt`,`bt`,`totalProfit`) VALUES ('$sellerid',' $orderid','$totaltime','$totalammount','0','$orderdate','$odertime ','$hr','$min','$ampm','$br','$kch','0','0','0','0','$kt','$bt','$totalProfit')";

    $results = mysqli_query($conn,$query1);
    $noofrows = mysqli_affected_rows($conn);
    
    if($noofrows==1)
    {
        $res = uploadArray($conn,$orderItems);
        if ($res == "true") {
           if ($br == 1 && $kch == 1) {
                 echo json_encode(array("status" =>"success" )); 
           }elseif($br == 1 && $kch == 0){

              echo json_encode(array("status" =>"success" )); 
           }elseif($br == 0 && $kch == 1){

              echo json_encode(array("status" =>"success" )); 
           }
         
                 
       }else {
           echo json_encode(array("status" =>"fail","msg"=>"Erro".mysqli_error($conn) ));
       }
     
    }
    else
    {     
        echo json_encode(array("status" =>"fail","msg"=>"Erro: ".mysqli_error($conn)));
    }
?>