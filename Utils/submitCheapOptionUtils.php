<?php
    include("../Utils/cheepOptionArrayUtils.php");
    include("../Utils/uniqueVenArrayUtils.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();
    $jsonData1 = $post["chepItem"];
    $jsonData2 = $post["uniqVen"];
  
     
  
       $pid = $jsonData1[0]->purchaseId;
   
       $items2 = array();
      $query2 ="SELECT * FROM lowerpricelpo  WHERE purchaseId ='$pid ' ";
      $results2 = mysql_query($query2);
      
      while($row2 = mysql_fetch_array($results2)){
         $items2[] = $row2;
      }

       $items3 = array();
      $query3 ="SELECT * FROM lpouniquevendor  WHERE purchaseId ='$pid ' ";
      $results2 = mysql_query($query3);
      
      while($row3 = mysql_fetch_array($results3)){
         $items3[] = $row3;
      }
  
    
       if (count($items2) == 0 && count($items3) == 0 ) {
          $saveArrayToDb = uploadArray3($jsonData1);
          if($saveArrayToDb == "True"){
            $uniqueRes = uploadArray4($jsonData2);

            if ($uniqueRes) {
                echo json_encode(array("status"=>"success","message"=>"Comparative Table Created Successfully"));   
            }else{
                echo json_encode(array("status"=>"faild","message"=>"Error: Something went Wrong In unique vendor"));
            }
       
          }else{
              echo json_encode(array("status"=>"faild","message"=>"Error: Something went Wrong In Comparative Table"));
          }
       }else{
          echo json_encode(array("status"=>"data","data"=>$items2,"data2"=>$items3));
      }
 
?>