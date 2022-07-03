
<?php 
  // include("Env/env.php");
  // require("Connection/dbConnection.php");

  function str_slice() {
    $args = func_get_args();
    switch (count($args)) {
        case 1:
            return $args[0];
        case 2:
            $str        = $args[0];
            $str_length = strlen($str);
            $start      = $args[1];
            if ($start < 0) {
                if ($start >= - $str_length) {
                    $start = $str_length - abs($start);
                } else {
                    $start = 0;
                }
            }
            else if ($start >= $str_length) {
                $start = $str_length;
            }
            $length = $str_length - $start;
            return substr($str, $start, $length);
        case 3:
            $str        = $args[0];
            $str_length = strlen($str);
            $start      = $args[1];
            $end        = $args[2];
            if ($start >= $str_length) {
                return "";
            }
            if ($start < 0) {
                if ($start < - $str_length) {
                    $start = 0;
                } else {
                    $start = $str_length - abs($start);
                }
            }
            if ($end <= $start) {
                return "";
            }
            if ($end > $str_length) {
                $end = $str_length;
            }
            $length = $end - $start;
            return substr($str, $start, $length);
    }
    return null;
}
 echo str_slice("../mixesdff.png",3);

$string = "MICROSOFT CORP CIK#: 0000789019 (see all company filings)";
$newString = substr($string, 0, strpos($string, "../"));
// echo $string;
echo $newString;
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "rampp";
    
  // connect the database with the server
  // $conn = new mysqli($servername,$username,$password,$dbname);
    
   // if error occurs 
  //  if ($conn -> connect_errno)
  //  {
  //     echo "Failed to connect to MySQL: " . $conn -> connect_error;
  //     exit();
  //  }
 
  // $sql = "select * from inventory";
  // $result = ($conn->query($sql));
  // //declare array to store the data of database
  // $row = array(); 

  // if ($result->num_rows > 0) 
  // {
  //     // fetch all data from db into array 
  //     $row = $result->fetch_all(MYSQLI_ASSOC); 
  //     print_r($row); 
  // } 

  // $data = array(array("itemname"=>"book","description"=>"hard cover","qut"=>21,"subtotal"=>4220.58),array("itemname"=>"table","description"=>"flat","qut"=>4,"subtotal"=>12000));
  // for ($i=0; $i < count($data); $i++) { 
  //   $v = "";
  //   $k = "";
  //   foreach ($data[$i] as $key => $value) {
  //       $k[] = $key;
  //       $v[] = "'".$value."'";
  //   }
  //   $k = implode(",",$k);
  //   $v = implode(",",$v);
  //   echo($k);
  //   echo ($v);
    
  // }
  

?>

