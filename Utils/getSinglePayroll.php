<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData = $post["date"];
   
    
     $items1 = array();
     $query = "SELECT * FROM payroll WHERE date = '$jsonData'  ";
    
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
         $items1[] = $row;
    }

    $items2 = array();
    $query = "SELECT * FROM payrollinfo WHERE  date = '$jsonData'";
  
    $results = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($results)){
        $items2[] = $row;
   }

  
     echo json_encode(array("payrolls"=>$items1,"payrollInfo"=>$items2));
  

?>