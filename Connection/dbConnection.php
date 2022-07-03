<?php 
function conString1(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rampp";
      
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

?>