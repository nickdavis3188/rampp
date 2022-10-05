<?php
    include("../Utils/vendorQuoteArrayUtills.php");
    include("../Env/env.php");
    require("generalController.php");
    require("../Connection/dbConnection.php");

    
    $post = (array) json_decode(file_get_contents('php://input'),false);
    
    
   
    $conn = conString1();
    $genController = new GeneralController();

     $jsonData = $post["itemWithQuote"];
     $jsonData1 = $post["venid"];
     $jsonData2 = $post["pid"];
     $jsonData3 = $post["for"];
     $jsonData4 = $post["vname"];
     $jsonData5 = $post["from"];
     $jsonData6 = $post["date"];
    $dd = date("Y-m-d",strtotime("$jsonData6"));
   //   print_r($jsonData1."VID");
   //   print_r($jsonData2."PiD");
       
     $query = "INSERT INTO prequisitionconfirm (`pregno`, `vendorid`,`for`,`vname`,`from`,`date`,`lpo`,`ca`)VALUES ('$jsonData2','$jsonData1','$jsonData3','$jsonData4','$jsonData5','$dd','0','0')";
     $results = mysqli_query($conn,$query);
     $noofrows = mysqli_affected_rows($conn);

     if($noofrows==1)
     {
        $res = uploadArray1($conn,$jsonData);
        if ($res == "True") {
            $updateq =  $genController->updatequote($conn,$jsonData2 );
            if ($updateq) {
               echo json_encode(array("status"=>"success"));             
            }else {
               echo json_encode(array("status"=>"faild","message"=>"Error:".$updateq));
            }

        }else{
           echo json_encode(array("status"=>"faild","message"=>"cannot submit the Quote"));
        }
     }else{
        echo json_encode(array("status"=>"faild","message"=>"Error:".mysqli_error($conn)));
     }
        


?>