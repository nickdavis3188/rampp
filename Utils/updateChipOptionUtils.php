<?php
    include("../Utils/cheepOptionArrayUtils.php");
    include("../Utils/uniqueVenArrayUtils.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
   
     $conn = conString1();
 
    $jsonData3 = $post["updatChip"];
    $jsonData4 = $post["updateUnique"];
     


        foreach ($jsonData3 as $key => $value) {
            $itn = $value->itemNumber;
            $pno = $value->purchaseId;

            $query = "DELETE FROM lowerpricelpo WHERE itemNumber ='$itn' AND purchaseId = '$pno'";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows == 1)
            {
                $saveArrayToDb = uploadArray3($conn,$jsonData3 );
                if($saveArrayToDb == "True"){
                    $query = "DELETE FROM lpouniquevendor WHERE purchaseId = '$pno'";
                    $results = mysqli_query($conn,$query);
                    $noofrows = mysqli_affected_rows($conn);
                    if ($noofrows == 1)
                    {
                       $uniqueu =  uploadArray4($conn,$jsonData4);
                        echo json_encode(array("status"=>"success","message"=>"Comparative Table Created Successfully"));    
                    }else{
                        echo json_encode(array("status"=>"failed","message"=>"Error: Something went Wrong In unique"));
                    }
                }else{
                    echo json_encode(array("status"=>"failed","message"=>"Error: Something went Wrong In Comparative Table"));
                }
            }
        }

?>