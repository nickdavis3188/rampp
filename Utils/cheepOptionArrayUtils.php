<?php
    function uploadArray3($data){
        
        
        foreach ($data as $index => $value) {     
            $myArray[] =  array('purchaseId' =>$value->purchaseId,'vendorId'=>$value->vendorId,'itemName'=>$value->itemName,'itemDescription'=>$value->itemDescription,'itemQuantity'=>$value->itemQuantity,'itemUnitMeasure'=>$value->itemUnitMeasure,'vendorUnitPrice'=>$value->vendorUnitPrice,'itemNumber'=>$value->itemNumber,'venname'=>$value->venname);
        }
    
        $numCount = 0;
        for ($i=0; $i < count($myArray) ; $i++) {
    
            $v = "";
            $k = "";
         
            foreach ($myArray[$i] as $key => $value) {
                $k[] = $key;
                $v[] = "'".$value."'";
            }
            $k = implode(",",$k);
            $v = implode(",",$v);
      
            $query = "INSERT INTO lowerpricelpo ($k) VALUES($v)";
            $results = mysql_query($query);
            $noofrows = mysql_affected_rows();
        
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