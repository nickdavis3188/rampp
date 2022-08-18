<?php
    function uploadArray($conn,$data){
        
        // foreach ($data as $index => $value) {     
        //     $myArray[] =  array();
        // }
    
        $numCount = 0;
        for ($i=0; $i < count($data) ; $i++) {
    
            $v = array();
            $k = array();
         
            foreach ($data[$i] as $key => $value) {
                $k[] = $key;
                $v[] = "'".$value."'";
            }
            $kr = implode(",",$k);
            $vr = implode(",",$v);
      
            $query = "INSERT INTO payroll($kr)VALUES($vr)";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
        
            if($noofrows==1)
            {     
                $numCount++;
            }
        } 
        if ($numCount == count($data)) {
           return "true";
        }else{
           return "false";
        }
    }
?>