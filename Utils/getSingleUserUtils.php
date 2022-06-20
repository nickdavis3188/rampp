<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();
     $jsonData = $post["username"];
    //  print_r($jsonData);

     $items = array();
    
     $query ="SELECT * FROM users WHERE uname='".$post["username"]."'";
     $results = mysql_query($query);

     while($row = mysql_fetch_array($results)){
         $items[] = $row;
     }

   
     $firstname = $items[0]['fname'];
     $lastname = $items[0]['lname'];
     $email = $items[0]['email'];
     $address = $items[0]['address'];
     $phone = $items[0]['phone'];
     $sex = $items[0]['sex'];
     $office = $items[0]['designation'];
     $username = $items[0]['uname'];
     $privilege = $items[0]['privilege'];
     $profilepic = $items[0]['profilepic'];
     $signature = $items[0]['signature'];
     $password = $items[0]['pword'];

    //  print_r($firstname."\n".$lastname."\n".$email."\n".$address."\n".$phone."\n".$sex);
     echo json_encode(array("firstname" =>$firstname ,"lastname"=>$lastname,"email"=>$email,"address"=>$address,"phone"=>$phone,"sex"=>$sex,"office"=>$office,"username"=>$username,"privilege"=>$privilege,"profilepic"=>$profilepic,"signature"=>$signature,"password"=>$password));
     

?>