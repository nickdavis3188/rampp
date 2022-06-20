<?php
    function uploadArray4($data){
        
        
        foreach ($data as $index => $value) {     
            $myArray[] =  array('purchaseId' =>$value->purchaseId,'vendorId'=>$value->vendorId,'venname'=>$value->venname,"discount"=>$value->discount,"vat"=>$value->vat,"grandtotal"=>$value->grandtotal,"lpocreated"=>"No","approvesup"=>"Pending","approveman"=>"Pending","approvemand"=>"Pending","remsup"=>"","remman"=>"","remmand"=>"","sigsup"=>"","sigman"=>"","sigmand"=>"","mountwords"=>"","lpodate"=>"","lpono"=>"","disc"=>"","vt"=>"");
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
      
            $query = "INSERT INTO lpouniquevendor ($k) VALUES($v)";
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