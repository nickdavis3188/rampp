<?php 
    session_start();
    $post = (array) json_decode(file_get_contents('php://input'),false);
    include("../Utils/arrayItem22Utils.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require('../Utils/completeOrderUtils.php');
    require('../vendor/autoload.php');

    
    $conn = conString1();
   
    $jsonData = $post["orderData"];
    $cIdentity = mysqli_real_escape_string($conn,$post["cn"]);

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
    $locationName = $jsonData->locationName;
    $hasBarDesc = $jsonData->hasBarDesc;
    $hasKitchen = $jsonData->hasKitchen;
    $serviceCharge = $jsonData->serviceCharge;
    $barDesc = mysqli_real_escape_string($conn,$jsonData->barDesc);
    $kitchenDesc = mysqli_real_escape_string($conn,$jsonData->kitchenDesc);

    $totalProfit = $jsonData->totalProfit;

    //items
    $orderItems = $jsonData->items;
    function emitEvent($k,$b){
        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '6635d1fe09ee5548385f',
            '94187085362faba7043f',
            '1438712',
            $options
        );
        
        $data['message'] = array("signal"=>"1","c"=>"2","ff"=>"1","ord"=>"0","kkk"=>$k,"bbb"=>$b);
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    $orderCount = 1;
    $completeCount = 0;
    $status = 0;
    $query1 = "INSERT INTO customer (`customerName`,`orderCount`,`completeCount`,`status`,`sallerId`,`date`,`time`) VALUES ('$cIdentity','$orderCount','$completeCount','$status','$sellerid','$orderdate','$odertime')";

    $results = mysqli_query($conn,$query1);
    $noofrows = mysqli_affected_rows($conn);
    if($noofrows==1)
    {

    

    foreach ($orderItems as $index => $value) {    

      $reduceBy = $value->quantity;
      $productId = $value->productId;
      $dateOrderd = $value->dateOrderd;
      $locationName = $value->locationName;
      $qtySold = $value->quantity;

        $items = array();
    
        $query ="SELECT * FROM inventory WHERE id='$productId'";
        $results = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
        }
        
        if (count($items) >= 1) {
        
            $reducedAmount = $items[0]["quantityadded"] - $reduceBy;
            $numberSold = $items[0]["numberSold"] + $qtySold;

            $query = "INSERT INTO inventryhistory
            (`inid`,`date`,`restock`,`reduce`,`reason`,`increasby`,`reduceby`) VALUES
             ('$productId','$dateOrderd','0','2','Ordered','0','$reduceBy')";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
    
            if($noofrows==1)
            {
               
                $query = "UPDATE inventory SET quantityadded= '$reducedAmount', numberSold='$numberSold' WHERE id='$productId'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {
                    reduceLocationInventry($conn,$productId,$qtySold,$locationName);
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
   
   
    $items44 = array();
    $query ="SELECT * FROM customer WHERE customerName='$cIdentity'";
    $results = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($results)){
        $items44[] = $row;
    }
    $cId = $items44[0]["customerId"];

$query1 = "INSERT INTO orders (`sellerid`,`orderid`,`totaltime`,`totalammount`,`status`,`orderdate`,`odertime`,`hr`,`min`,`ampm`,`br`,`kch`,`k`,`b`,`receipt`,`bill`,`kt`,`bt`,`totalProfit`,`customerId`,`hasKechenDisc`,`hasBarDisc`,`kechenDisc`,`barDisc`,`locationName`,`serviceCharge`) VALUES ('$sellerid',' $orderid','$totaltime','$totalammount','0','$orderdate','$odertime ','$hr','$min','$ampm','$br','$kch','0','0','0','0','$kt','$bt','$totalProfit','$cId','$hasKitchen','$hasBarDesc','$kitchenDesc','$barDesc','$locationName','$serviceCharge')";

    $results = mysqli_query($conn,$query1);
    $noofrows = mysqli_affected_rows($conn);
    
    if($noofrows==1)
    {
        $res = uploadArray($conn,$orderItems,$orderid);
        if ($res == "true") {
           if ($br == 1 && $kch == 1) {

                emitEvent(1,1);
                 echo json_encode(array("status" =>"success" )); 

           }elseif($br == 1 && $kch == 0){
                emitEvent(0,1);
              echo json_encode(array("status" =>"success" )); 
           }elseif($br == 0 && $kch == 1){
              emitEvent(1,0);
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
}
?>