<?php
    function uploadArray($conn,$data){
        
        foreach ($data as $index => $value) {     
            $myArray[] =  array('itemname' =>$value->ItemName,'description'=>$value->Description,'unitprice'=>$value->UnitPrice,'qty'=>$value->Qty,'subtotal'=>$value->SubTotal,'preqno'=>$value->reqNo,'um'=>$value->um);
        }
    
        $numCount = 0;
        for ($i=0; $i < count($myArray) ; $i++) {
    
            $v = array();
            $k = array();
         
            foreach ($myArray[$i] as $key => $value) {
                $k[] = $key;
                $v[] = "'".$value."'";
            }
            $kr = implode(",",$k);
            $vr = implode(",",$v);
      
            $query = "INSERT INTO preqitem($kr)VALUES($vr)";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
        
            if($noofrows==1)
            {     
                $numCount++;
            }
        } 
        if ($numCount == count($myArray)) {
           return "true";
        }else{
           return "false";
        }
    }
?>