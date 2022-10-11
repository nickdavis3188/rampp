<?php
 require("./completeOrderUtils.php");
    function customerComplete($conn,$jsonData){
      
        $items3 = array();
                
        $query3 ="SELECT * FROM  orders WHERE orderid ='$jsonData'";
        $results3 = mysqli_query($conn,$query3);
        
        while($row3 = mysqli_fetch_array($results3)){
            $items3[] = $row3;
        }

        $customerId = $items3["0"]["customerId"];

        $items = array();
        $query ="SELECT * FROM customer WHERE customerId ='$customerId'";
        $results = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
        }
        $count = $items["0"]["completeCount"] + 1;
        // echo json_encode(array("status" =>"success","dd"=>$count));
        
        $query2 ="UPDATE customer SET completeCount='$count' WHERE customerId ='$customerId'";
        $results = mysqli_query($conn,$query2);
        $noofrows2 = mysqli_affected_rows($conn);
        if ($noofrows2 >= 1)
        {
            return true;
        }else{
           return false;
        }

    }
    function customerUnComplete($conn,$jsonData){
      
        $items3 = array();
                
        $query3 ="SELECT * FROM  orders WHERE orderid ='$jsonData'";
        $results3 = mysqli_query($conn,$query3);
        
        while($row3 = mysqli_fetch_array($results3)){
            $items3[] = $row3;
        }

        $customerId = $items3["0"]["customerId"];

        $items = array();
        $query ="SELECT * FROM customer WHERE customerId ='$customerId'";
        $results = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
        }
        $count = $items["0"]["completeCount"] - 1;
      
        $query2 ="UPDATE customer SET completeCount='$count' WHERE customerId ='$customerId'";
        $results = mysqli_query($conn,$query2);
        $noofrows2 = mysqli_affected_rows($conn);
        if ($noofrows2 >= 1)
        {
            return true;
        }else{
           return false;
        }

    }
?>