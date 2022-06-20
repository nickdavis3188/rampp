<?php
    include("../Utils/vendorQuoteArrayUtills.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
 
    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
     $conn->connect();

     $discount = $post["data"]->discount;
     $vat = $post["data"]->vat;
     $grandtotal = $post["data"]->grandTotal;
     $lpocreated = $post["data"]->lpocreated;
     $purchaseId = $post["data"]->purchaseId;
     $vendorId = $post["data"]->vendorId;
     $amountWords = $post["data"]->amountWords;
     $lpono = $post["data"]->lpono;
     $lpodate = $post["data"]->lpodate;
     $disc = $post["data"]->disc;
     $vt = $post["data"]->vt;

   
     
    $query = "UPDATE lpouniquevendor SET discount='$discount', vat='$vat',grandtotal= '$grandtotal', lpocreated= '$lpocreated',mountwords='$amountWords',lpono='$lpono',lpodate='$lpodate',disc='$disc',vt='$vt' WHERE purchaseId= '$purchaseId' AND vendorId='$vendorId'";
     
    $results = mysql_query($query);
    $noofrows = mysql_affected_rows();
    if ($noofrows == 1)
    {
        echo json_encode(array("status"=>"success","message"=>"Lpo Creation Successful"));       
    }
    else
    {
        echo json_encode(array("status"=>"faild","message"=>"Error".mysql_error()));    
    }
?>