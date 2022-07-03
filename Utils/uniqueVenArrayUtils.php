<?php
    function uploadArray4($conn,$data){
        
        
        foreach ($data as $index => $value) {     
            $myArray[] =  array('purchaseId' =>$value->purchaseId,'vendorId'=>$value->vendorId,'venname'=>$value->venname,"discount"=>$value->discount,"vat"=>$value->vat,"grandtotal"=>$value->grandtotal,"lpocreated"=>"No","approvesup"=>"Pending","approveman"=>"Pending","approvemand"=>"Pending","remsup"=>"","remman"=>"","remmand"=>"","sigsup"=>"","sigman"=>"","sigmand"=>"","mountwords"=>"","lpodate"=>"","lpono"=>"","disc"=>"","vt"=>"");
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
      
            $query = "INSERT INTO lpouniquevendor ($kr) VALUES($vr)";
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