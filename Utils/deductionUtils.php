<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData = $post["stafftag"];
     $jsonData2 = $post["month"];
     $jsonData3 = $post["year"];
     

    
     $items1 = array();
     $query = "SELECT * FROM deductions WHERE staffId = '$jsonData' AND MONTH(date) = '$jsonData2' AND YEAR(date) = '$jsonData3' ";
    // $query ="SELECT * FROM deductions WHERE staffId = '$jsonData'";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
         $items1[] = $row;
    }

    $items2 = array();
    $query = "SELECT * FROM salaryadvance WHERE staffId = '$jsonData' AND MONTH(date) = '$jsonData2' AND YEAR(date) = '$jsonData3' ";
   // $query ="SELECT * FROM deductions WHERE staffId = '$jsonData'";
    $results = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($results)){
        $items2[] = $row;
   }

    //  print_r($firstname."\n".$lastname."\n".$address."\n".$phone."\n".$phsexone."\n".$department);
     echo json_encode(array("deduction"=>$items1,"sal"=>$items2));
    //  echo $items;

?>