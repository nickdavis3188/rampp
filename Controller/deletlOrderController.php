<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

   
    $conn = conString1();

    if (isset($_POST['delete'])) {

        $items = array();

        $query = "SELECT * FROM orderditems WHERE orderid ='". $_POST["orderid"] . "'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        foreach ($items as $index => $value) {   
            $itemId = $value['productId'];
            $quantity = $value['quantity'];
            $date = $_POST['date22'];
            $items = array();
        
            $query ="SELECT * FROM inventory WHERE id='$itemId'";
            $results = mysqli_query($conn,$query);
    
            while($row = mysqli_fetch_array($results)){
                $items[] = $row;
            }
            
            if (count($items) >= 1) {
            
                $totalRestock = $items[0]["quantityadded"] + $quantity;
        
                   
                $query = "INSERT INTO  inventryhistory (`inid`, `date` ,`restock`, `reduce`,`reason`,`increasby`,`reduceby`)VALUES ('$itemId','$date','2','0','Deleted Order','$quantity','0')";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
        
                if($noofrows==1)
                {
                   
                    $query = "UPDATE inventory SET quantityadded= '$totalRestock' WHERE id='$itemId'";
                    $results = mysqli_query($conn,$query);
                    $noofrows = mysqli_affected_rows($conn);
                    if ($noofrows == 1)
                    {
                             
                    }
                    else
                    {
                        header("Location: ../View/Ordering/vmanageOrder.php?fail= Error:".mysqli_error($conn)); 
                    }
                }
                else
                {
                    header("Location: ../View/Ordering/vmanageOrder.php?fail= Error:".mysqli_error($conn));         
                }
             
            }else{
                header("Location: ../View/Ordering/vmanageOrder.php?fail= Error: Item Not Found"); 
            }
        }



        $query = "DELETE FROM orders WHERE orderid ='". $_POST["orderid"] . "'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            $query = "DELETE FROM orderditems WHERE orderid ='". $_POST["orderid"] . "'";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows >= 1)
            {               
                header("Location: ../View/Ordering/vmanageOrder.php?msg=Delete successful");
            }
            else
            {
                header("Location: ../View/Ordering/vmanageOrder.php?fail= Error:".mysqli_error($conn)); 
            }
        }

    }
 
?>