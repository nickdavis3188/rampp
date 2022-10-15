<?php 

   function conString1(){
      $d = "mysql://bb134d716b6105:7aad4776@us-cdbr-east-06.cleardb.net/heroku_93c90bbbe30b061?reconnect=true";
      $un = "s";
      $servername = "us-cdbr-east-06.cleardb.net";
      $username = "bb134d716b6105";
      $password = "7aad4776";
      $dbname = "heroku_93c90bbbe30b061";
      $servername1 = "localhost";
      $username1 = "root";
      $password1 = "";
      $dbname1 = "rampp"; 
         
      // connect the database with the server
      $conn = new mysqli($servername,$username,$password,$dbname);
         
      // if error occurs 
      if ($conn -> connect_errno)
      {
         echo "Failed to connect to MySQL: " . $conn -> connect_error;
         exit();
      }
      return $conn;
   }