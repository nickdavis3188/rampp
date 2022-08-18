<?php
      require("generalController.php");
      include("../Env/env.php");
      require("../Connection/dbConnection.php");
  
      $conn = conString1();
      $genControll = new GeneralController();

  if (isset($_POST["inventory"])) {
    
      // print_r((empty($orderingUnit)?"empty":$orderingUnit)." ".$_POST['salable']);
      if (isset($_POST['salable'])) {
         
          $catname = $_POST['catname'];
          $pname = $_POST['pname'];
          $qtyadded = $_POST['qtyadded'];
          $minlevle = $_POST['minlevle'];
          $costp = $_POST['costp'];
          $sallingp = $_POST['sallingp'];
          $profit = $_POST['profit'];
          $preptime = $_POST['preptime'];
          $PrepAt = $_POST['PrepAt'];
          $orderingUnit = $_POST['orderingUnit'];
        $salable = $_POST['salable'];
        
        $query = "INSERT INTO inventory (`catname`, `productname` ,`quantityadded`, `minnimumlevle`,`costprice`,`profit`, `preparationtime`,`sellingprice`,`salable`,`prepAt`,`oderingunit`)VALUES ('$catname',' $pname','$qtyadded','$minlevle','$costp','$profit','$preptime','$sallingp','$salable','$PrepAt','$orderingUnit')";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
    
        if($noofrows==1)
        {
            header("Location:  ../View/Inventory/addInventory.php?msg='Registration Successful");
        }
        else
        {
            header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysqli_error($conn));          
        }
    } else {
        // echo "Non salable";
        $catname = $_POST['catname'];
        $pname = $_POST['pname'];
        $qtyadded = $_POST['qtyadded'];
        $costp = $_POST['costp'];
        $minlevle = $_POST['minlevle'];
        // print_r($catname."-".$pname."-".$qtyadded."-".$costp);
        
       $query2 = "INSERT INTO `inventory` (catname,productname,quantityadded,minnimumlevle,costprice,profit,preparationtime,sellingprice,salable,prepAt,oderingunit)
       VALUES('$catname','$pname','$qtyadded','$minlevle','$costp','0','noTime','0','1','none','none')";
        $results = mysqli_query($conn,$query2);
        $noofrows = mysqli_affected_rows($conn);
        if($noofrows==1)
        {
            header("Location: ../View/Inventory/addInventory.php?msg='Registration Successful");
         
        }
        else
        {
            header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysqli_error($conn));          
        }
       
    }
    

  }elseif(isset($_POST["category"])){
    $catname = $_POST['catname'];

    $query = "INSERT INTO category (`catname`)VALUES ('$catname')";
    $results = mysqli_query($conn,$query);
    $noofrows = mysqli_affected_rows($conn);

    if($noofrows==1)
    {
        header("Location: ../View/Inventory/addInventory.php?msg='Registration Successful");
     
    }
    else
    {
        header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysqli_error($conn));          
    }

  }else{
    if (isset($_POST["delcategory"])) {

        // $catname = $_POST['catname'];
        $query = "DELETE FROM category WHERE id ='" . $_POST["id"] . "'";
        
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/Inventory/addInventory.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysqli_error($conn)); 
        }
    }
  }



?>