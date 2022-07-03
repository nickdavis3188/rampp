<?php
    function uploadArray1($conn,$data){
        
        
        foreach ($data as $index => $value) {     
            $myArray[] =  array('purchaseId' =>$value->purchaseId,'vendorId'=>$value->vendorId,'itemName'=>$value->itemName,'itemDescription'=>$value->itemDescription,'itemQuantity'=>$value->itemQuantity,'itemUnitMeasure'=>$value->itemUnitMeasure,'vendorUnitPrice'=>$value->vendorUnitPrice,'itemNumber'=>$value->itemNumber,'venname'=>$value->venname);
        }
    
        $numCount = 0;
        for ($i=0; $i < count($myArray) ; $i++) {
    
            $v = array();
            $k = array();
         
            foreach ($myArray[$i] as $key => $value) {
                $k[] = $key;
                $v[] = "'".$value."'";
            }
            $k = implode(",",$k);
            $v = implode(",",$v);
      
            $query = "INSERT INTO vedorquote ($k) VALUES($v)";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
        
            if($noofrows==1)
            {     
                $numCount++;
            }
        } 
        if ($numCount == count($myArray)) {
           return "True";
        }else{
           return "False";
        }
    }
?>