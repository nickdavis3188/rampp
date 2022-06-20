<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();

    if (isset($_POST['restock'])) {

        $itemNumber = $_POST["qtyadded"];
        $itemId = $_POST["id"];
        $date = $_POST["date"];
        $reason = $_POST["reason"];
        $dec = 2;

        $items = array();
    
        $query ="SELECT * FROM inventory WHERE id='$itemId'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        
        if (count($items) >= 1) {
        
            $reducedAmount = $items[0]["quantityadded"] - $itemNumber;
                
            $query = "INSERT INTO inventryhistory
            (`inid`,`date`,`restock`,`reduce`,`reason`,`increasby`,`reduceby`) VALUES
             ('$itemId','$date','0','$dec','$reason','0','$itemNumber')";
            $results = mysql_query($query);
            $noofrows = mysql_affected_rows();
    
            if($noofrows==1)
            {
               
                $query = "UPDATE inventory SET quantityadded= '$reducedAmount' WHERE id='$itemId'";
                $results = mysql_query($query);
                $noofrows = mysql_affected_rows();
                if ($noofrows == 1)
                {
                    header("Location: ../View/Inventory/viewModefyDelete.php?msg= Restock Successful");        
                }
                else
                {
                    header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysql_error()); 
                }
            }
            else
            {
                header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysql_error());         
            }
         
        }else{
            header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error: Item Not Found"); 
        }
           
       
        
    }
 
?>