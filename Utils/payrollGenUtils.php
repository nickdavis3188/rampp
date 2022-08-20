<?php

    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require("payrollInsertUtils.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
    
   
     $conn = conString1();
     $jsonData2 = $post["month"];
     $jsonData3 = $post["year"];
     $jsonData4 = $post["date"];
     $jsonData5 = $post["creator"];
        
     $items4 = array();
     $query = "SELECT * FROM payroll WHERE monthFor = '$jsonData2' AND yearFor= '$jsonData3'";
     $results = mysqli_query($conn,$query);
     
     while($row = mysqli_fetch_array($results)){
         $items4[] = $row;
    }

    if (count($items4) == 0) {

        $items = array();      
        $query ="SELECT * FROM staff ";
        $results = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
       }
           
       $postData = array();
       foreach ($items as $index => $value) { 
            $stafId = $value["stafftag"];

            $items1 = array();
            $query = "SELECT * FROM salaryadvance WHERE staffId = '$stafId' AND MONTH(date) = '$jsonData2' AND YEAR(date) = '$jsonData3' ";
            $results = mysqli_query($conn,$query);
            
            while($row = mysqli_fetch_array($results)){
                $items1[] = $row;
            }

            $items2 = array();
            $query = "SELECT * FROM deductions WHERE staffId = '$stafId' AND MONTH(date) = '$jsonData2' AND YEAR(date) = '$jsonData3' ";
            $results = mysqli_query($conn,$query);
            
            while($row = mysqli_fetch_array($results)){
                $items2[] = $row;
            }

            $items3 = array();
            $query = "SELECT * FROM orders WHERE sellerid = '$stafId' AND MONTH(orderdate) = '$jsonData2' AND YEAR(orderdate) = '$jsonData3' ";
            $results = mysqli_query($conn,$query);
            
            while($row = mysqli_fetch_array($results)){
                $items3[] = $row;
            }
   
            $commissionAd = count($items3);
          $precent = $value["staffincentive"]/100;
          $commission1 =$precent*$commissionAd; 
   
            $salAd = 0;
            foreach ($items1 as $index => $value1) { 
                $salAd += $value1["amount"];
            }

            $deduc = 0;
            foreach ($items2 as $index => $value1) { 
                $deduc += $value1["amount"];
            }

            $pMonth = $value["premonth"];
            $dd = $salAd +$deduc;
            $payable = $pMonth - $dd ;
            $pay = $payable + $commission1;

           $postData[] = array("sn"=>$index+1,"firstName"=>$value["fname"],"lastName"=>$value["lname"],"monthlySalary"=>$value["premonth"],"deduction"=>$deduc,"salaryAdvance"=>$salAd,"commission"=>$commission1,"amountPayable"=>$pay,"date"=>$jsonData4,"monthFor"=>$jsonData2,"yearFor"=>$jsonData3);
       }
       $query = "INSERT INTO payrollinfo (`date`,`createdby`)VALUES ('$jsonData4','$jsonData5')";
       $results = mysqli_query($conn,$query);
       $noofrows = mysqli_affected_rows($conn);
     
       if($noofrows==1)
       {  
           $payrollRes = uploadArray($conn,$postData);
           if ($payrollRes) {
               echo json_encode(array("statusCode"=>200,"data"=>$postData));     
           }else{
               echo json_encode(array("statusCode"=>500,"msg"=>"Payroll Insert Error"));
           }  
       }
       else
       {
            echo json_encode(array("statusCode"=>500,"msg"=>"Payroll Insert Error".mysqli_error($conn)));
       }
    }else{
        echo json_encode(array("statusCode"=>404,"msg"=>"Payroll For this Month Was Already Generated Please Go To The Vew To Get Your Copy"));
    }
?>