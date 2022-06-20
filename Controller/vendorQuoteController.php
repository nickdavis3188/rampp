<?php
    include("../Utils/vendorQuoteArrayUtills.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();

     $jsonData = $post["itemWithQuote"];
     $jsonData1 = $post["venid"];
     $jsonData2 = $post["pid"];
     $jsonData3 = $post["for"];
     $jsonData4 = $post["vname"];
     $jsonData5 = $post["from"];
     $jsonData6 = $post["date"];
     
   //   print_r($jsonData1."VID");
   //   print_r($jsonData2."PiD");
       
     $query = "INSERT INTO prequisitionconfirm (`pregno`, `vendorid`,`for`,`vname`,`from`,`date`)VALUES ('$jsonData2','$jsonData1','$jsonData3','$jsonData4','$jsonData5','$jsonData6')";
     $results = mysql_query($query);
     $noofrows = mysql_affected_rows();

     if($noofrows==1)
     {
        $res = uploadArray1($jsonData);
        if ($res == "True") {
           echo json_encode(array("status"=>"success"));             
        }else{
           echo json_encode(array("status"=>"faild","message"=>"cannot submit the Quote"));
        }
     }else{
        echo json_encode(array("status"=>"faild","message"=>"Error:".mysql_error()));
     }
        


?>