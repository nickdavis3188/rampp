<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

   
    $conn = conString1();

    if (isset($_GET['deleteInventory'])) {
        echo $_GET['id'];
       
        $query = "DELETE FROM inventory WHERE id='" . $_GET["id"] . "'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/Inventory/viewModefyDelete.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysqli_error($conn)); 
        }
    }elseif (isset($_POST['updateinventory'])) {
        $catname = $_POST['catname'];
        $pname = $_POST['pname'];
        $qtyadded = $_POST['qtyadded'];
        $costp = $_POST['costp'];
        $sallingp = $_POST['sallingp'];
        $profit = $_POST['profit'];
        $preptime = $_POST['preptime'];
        $minlevle = $_POST['minlevle'];
        $id = $_POST['id'];
   
     
        $query = "UPDATE inventory SET catname='$catname',productname='$pname',quantityadded='$qtyadded',costprice='$costp',sellingprice='$sallingp',profit='$profit',preparationtime='$preptime',minnimumlevle='$minlevle' WHERE id ='$id' ";

        $results = mysqli_query($conn,$query) ;
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/Inventory/viewModefyDelete.php?msg= Update Successful");        
        }
        else
        {
            header("Location: ../View/Inventory/viewModefyDelete.php?fail= Error:".mysqli_error($conn)); 
        }
    }
 
?>