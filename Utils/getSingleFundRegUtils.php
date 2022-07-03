<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);

  
    $conn = conString1();

    $items = array();
     
    $query ="SELECT * FROM fundrequisition WHERE fregno =".$post["fRegNo"]."";
    $results = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($results)){
        $items[] = $row;
   }

//    print_r($items)

    $fregno = $items[0]['fregno'];
    $from = $items[0]['from'];
    $datecreated = $items[0]['datecreated'];
    $subject = $items[0]['subject'];
    $ammount = $items[0]['ammount'];
    $ammountword = $items[0]['ammountword'];
    $file = $items[0]['file'];
    $justification = $items[0]['justification'];
    $manstatus = $items[0]['manstatus'];
    $mandsatus = $items[0]['mandsatus'];
    $supstatus = $items[0]['supstatus'];
    $to = $items[0]['to'];

    $manremark = $items[0]['manremark'];
    $mandremark = $items[0]['mandremark'];
    $supremark = $items[0]['supremark'];

    $mansig = $items[0]['mansig'];
    $mandsig = $items[0]['mandsig'];
    $supsig = $items[0]['supsig'];
   
     $mandate = $items[0]['mandate'];
     $manddate = $items[0]['manddate'];
     $supdate = $items[0]['supdate'];

    echo json_encode( array("fregno" =>$fregno ,"from"=>$from,"subject"=>$subject,"ammount"=>$ammount,"ammountword"=>$ammountword,"mandsatus"=>$mandsatus,"manstatus"=>$manstatus,"supstatus"=>$supstatus,'datecreated'=>$datecreated,'file'=>$file,'justification'=>$justification,'to'=>$to,'manremark'=>$manremark,'mandremark'=>$mandremark,'supremark'=>$supremark,'mansig'=>$mansig,'mandsig'=>$mandsig,'supsig'=>$supsig,'supdate'=>$supdate,'mandate'=>$mandate,'manddate'=>$manddate));
      

?>

