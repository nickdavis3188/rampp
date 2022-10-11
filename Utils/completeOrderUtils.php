<?php
    function reduceInventry(\mysqli $conn,$productId,$qty){
        $items = array();
        
        $query ="SELECT * FROM inventory WHERE id='$productId'";
        $results = mysqli_query($conn,$query);
    
        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
        }
        if (count($items) > 0) {
            
            $reducedAmount = $items[0]["quantityadded"] - $qty;
        
            $query = "UPDATE inventory SET quantityadded= '$reducedAmount' WHERE id='$productId'";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows == 1)
            {
                return true;    
            }
            else
            {
                return false;
            }
        }else{
            return true;   
        }
      
    }
    function reduceLocationInventry(\mysqli $conn,$productId,$qty,$locationName){
        $items2 = array();
        
        $query2 ="SELECT * FROM salesLocation WHERE salesLocationName='$locationName'";
        $results2 = mysqli_query($conn,$query2);
    
        while($row2 = mysqli_fetch_array($results2)){
            $items2[] = $row2;
        }

        if (count($items2) > 0) {
            $locationId = $items2[0]["salesLocationId"];
        
            $items = array();
            
            $query ="SELECT * FROM locationproduct WHERE productId='$productId' AND locationId='$locationId'";
            $results = mysqli_query($conn,$query);
        
            while($row = mysqli_fetch_array($results)){
                $items[] = $row;
            }
            if (count($items) > 0) {
                $reducedAmount = $items[0]["quantityAdded"] - $qty;
                $lpId = $items[0]["lpId"];
                $query = "UPDATE locationproduct SET quantityAdded= '$reducedAmount' WHERE lpId='$lpId'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {
                    return true;    
                }
                else
                {
                    return false;
                }

            }else{
                return true;   
            }
           
        }else{
            return true;   
        }
      
    }
    
    function completeOrder(\mysqli $conn,array $itemArray){
        foreach ($itemArray as $index => $value) { 
            $productId = $value["productId"];
            $quantity = $value["quantity"];
            $location = $value["location"];
            
           $retVal = reduceInventry($conn,$productId,$quantity);
           if ($retVal) {
               $retV = reduceLocationInventry($conn,$productId,$quantity,$location);
               if ($retV) {
                    // return true;
               }else{
                //  return false;
               }
            }else{
                // return false;
            }
        }
    }
?>