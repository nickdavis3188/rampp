<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData = $post["pRegNo"];
     $jsonData2 = $post["venId"];
     
     $items = array();
     
     $query ="SELECT * FROM prequisitioninfo WHERE preqno =".$post["pRegNo"]."";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
         $items[] = $row;
    }

     $items2 = array();
     
     $query2 ="SELECT * FROM  preqitem WHERE preqno =".$post["pRegNo"]."";
     $results2 = mysqli_query($conn,$query2);
     
     while($row2 = mysqli_fetch_array($results2)){
        $items2[] = $row2;
    }

     $items3 = array();
     
    $query3 ="SELECT * FROM vendors WHERE id =".$post["venId"]."";
     $results3 = mysqli_query($conn,$query3);
     
     while($row3 = mysqli_fetch_array($results3)){
        $items3[] = $row3;
    }
    


   
     $preqno = $items[0]['preqno'];
     $from = $items[0]['from'];
     $subject = $items[0]['subject'];
     $summary = $items[0]['summary'];
     $dateprepared = $items[0]['date'];
     $total = $items[0]['total'];
     $supapprove = $items[0]['supapprove'];
     $manapprove = $items[0]['manapprove'];
     $mandapprove = $items[0]['mandapprove'];

     $manremark = $items[0]['manremark'];
     $mandremark = $items[0]['mandremark'];
     $supremark = $items[0]['supremark'];

     $mansig = $items[0]['mansig'];
     $mandsig = $items[0]['mandsig'];
     $supsig = $items[0]['supsig'];
   

    echo json_encode( array(array("preqno" =>$preqno ,"from"=>$from,"subject"=>$subject,"dateprepared"=>$dateprepared,"total"=>$total,"supapprove"=>$supapprove,"manapprove"=>$manapprove,"mandapprove"=>$mandapprove,'summary'=>$summary,'manremark'=>$manremark,'mandremark'=>$mandremark,'supremark'=>$supremark,'mansig'=>$mansig,'mandsig'=>$mandsig,'supsig'=>$supsig),$items2,$items3));
     
    

?>