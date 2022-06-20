<?php
    function uploadArray($data){
        
        foreach ($data as $index => $value) {     
            $myArray[] =  array('itemname' =>$value->ItemName,'description'=>$value->Description,'unitprice'=>$value->UnitPrice,'qty'=>$value->Qty,'subtotal'=>$value->SubTotal,'preqno'=>$value->reqNo,'um'=>$value->um);
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
      
            $query = "INSERT INTO preqitem($k)VALUES($v)";
            $results = mysql_query($query);
            $noofrows = mysql_affected_rows();
        
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