<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
     $jsonData = $post["stafftag"];
     
     $items = array();
     
     $query ="SELECT * FROM staff WHERE stafftag =".$post["stafftag"]."";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
         $items[] = $row;
    }
        
    // print_r($items);

   
     $firstname = $items[0]['fname'];
     $lastname = $items[0]['lname'];
     $address = $items[0]['address'];
     $phone = $items[0]['phone'];
     $sex = $items[0]['sex'];
     $department = $items[0]['dept'];
     $stafftag = $items[0]['stafftag'];
     $insentive = $items[0]['staffincentive'];
     $month = $items[0]['premonth'];
     $annum = $items[0]['perannum'];
     $deptAmount= $items[0]['deptAmount'];
   

    //  print_r($firstname."\n".$lastname."\n".$address."\n".$phone."\n".$phsexone."\n".$department);
     echo json_encode(array("firstname" =>$firstname ,"lastname"=>$lastname,"department"=>$department,"address"=>$address,"phone"=>$phone,"sex"=>$sex,"stafftag"=>$stafftag,"insentive"=>$insentive,"month"=>$month,"annum"=>$annum,"deptAmount"=>$deptAmount));
    //  echo $items;

?>