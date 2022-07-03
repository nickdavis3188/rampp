<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
     $conn = conString1();
     $jsonData = $post["venid"];
    //  print_r($post["venid"]);
     $items = array();

     $query ="SELECT * FROM `vendors` WHERE id ='".$post["venid"]."'";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
         $items[] = $row;
    }
        
    // print_r($items); 
    $vcode = $items[0]['vcode'];
    $compname = $items[0]['compname'];
    $address = $items[0]['address'];
    $phone = $items[0]['phone'];
    $email = $items[0]['email'];
    $cpname = $items[0]['cpname'];
    $cpphone = $items[0]['cpphone'];
    $acctno = $items[0]['acctno'];
    $bankname = $items[0]['bankname'];
    $bankcode = $items[0]['bankcode'];
    $tin = $items[0]['tin'];
    $id = $items[0]['id'];
   


   
     echo json_encode(array("vcode" =>$vcode ,"compname"=>$compname,"address"=>$address,"phone"=>$phone,"email"=>$email,"cpname"=>$cpname,"cpphone"=>$cpphone,"acctno"=>$acctno,"bankname"=>$bankname,"bankcode"=>$bankcode,"tin"=>$tin,"id"=>$id));
    // //  echo $items;

?>