<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

   
    $conn = conString1();

    if (isset($_POST['restock'])) {

        $itemNumber = $_POST["qtyadded"];
        $itemId = $_POST["id"];
        $date = $_POST["date"];
        $reason = $_POST["reason"];
        $reason1 = mysqli_real_escape_string($conn,$reason);
        $res = 2;

        $items = array();
    
        $query ="SELECT * FROM inventory WHERE id='$itemId'";
        $results = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
        }
        
        if (count($items) >= 1) {
        
            $totalRestock = $items[0]["quantityadded"] + $itemNumber;
    
               
            $query = "INSERT INTO  inventryhistory (`inid`, `date` ,`restock`, `reduce`,`reason`,`increasby`,`reduceby`)VALUES ('$itemId',' $date','$res','0','$reason1','$itemNumber','0')";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
    
            if($noofrows==1)
            {
               
                $query = "UPDATE inventory SET quantityadded= '$totalRestock' WHERE id='$itemId'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {
                    header("Location: ../View/Inventory/viewModefyDelete.php?msg= Restock Successful");        
                }
                else
                {
                    header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysqli_error($conn)); 
                }
            }
            else
            {
                header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysqli_error($conn));         
            }
         
        }else{
            header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error: Item Not Found"); 
        }
           
       
        
    }
 
?>