<?php
    function uploadArray($conn,$data,$id){
        
        foreach ($data as $index => $value) {     
            $myArray[] =  array('productname'=>$value->productName,'price'=>$value->price,'quantity'=>$value->quantity,'amount'=>$value->amount,'preptime'=>$value->prepTime,'orderid'=>$id,"productcat"=>$value->productcat,"sn"=>$index+1,"prepAt"=>$value->prepAt,"description"=>$value->description,"finish"=>'0',"dateOrderd"=>$value->dateOrderd,"productId"=>$value->productId,"profit"=>$value->profit,"costprice"=>$value->costprice,"sellingprice"=>$value->sellingprice,"unitOfMeasure"=>$value->unitOfMeasure,"location"=>$value->locationName,"salesperson"=>$value->salesperson);
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
      
            $query = "INSERT INTO orderditems($kr)VALUES($vr)";
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