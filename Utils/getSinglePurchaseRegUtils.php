<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();
     $jsonData = $post["pRegNo"];
     
     $items = array();
     
     $query ="SELECT * FROM prequisitioninfo WHERE preqno =".$post["pRegNo"]."";
     $results = mysql_query($query);
     
     while($row = mysql_fetch_array($results)){
         $items[] = $row;
    }

     $items2 = array();
     
     $query2 ="SELECT * FROM  preqitem WHERE preqno =".$post["pRegNo"]."";
     $results2 = mysql_query($query2);
     
     while($row2 = mysql_fetch_array($results2)){
        $items2[] = $row2;
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
    //  supdate	mandate	manddate
     $mandate = $items[0]['mandate'];
     $manddate = $items[0]['manddate'];
     $supdate = $items[0]['supdate'];
   

    echo json_encode( array(array("preqno" =>$preqno ,"from"=>$from,"subject"=>$subject,"dateprepared"=>$dateprepared,"total"=>$total,"supapprove"=>$supapprove,"manapprove"=>$manapprove,"mandapprove"=>$mandapprove,'summary'=>$summary,'manremark'=>$manremark,'mandremark'=>$mandremark,'supremark'=>$supremark,'mansig'=>$mansig,'mandsig'=>$mandsig,'supsig'=>$supsig,'supdate'=>$supdate,'mandate'=>$mandate,'manddate'=>$manddate),$items2));
     
    

?>