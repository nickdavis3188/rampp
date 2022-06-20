<?php
      require("generalController.php");
      include("../Env/env.php");
      require("../Connection/dbConnection.php");
  
      $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
      $conn->connect();
      $genControll = new GeneralController();

  if (isset($_POST["inventory"])) {
    
    $catname = $_POST['catname'];
    $pname = $_POST['pname'];
    $qtyadded = $_POST['qtyadded'];
    $minlevle = $_POST['minlevle'];
    $costp = $_POST['costp'];
    $sallingp = $_POST['sallingp'];
    $profit = $_POST['profit'];
    $preptime = $_POST['preptime'];
    
    if (isset($_POST['salable'])) {
        
        $salable = $_POST['salable'];
        
        $query = "INSERT INTO inventory (`catname`, `productname` ,`quantityadded`, `minnimumlevle`,`costprice`,`profit`, `preparationtime`,`sellingprice`,`salable`)VALUES ('$catname',' $pname','$qtyadded','$minlevle','$costp','$profit','$preptime','$sallingp','$salable')";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
    
        if($noofrows==1)
        {
            header("Location: ../View/Inventory/addInventory.php?msg='Registration Successful");
         
        }
        else
        {
            header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysql_error());          
        }
    } else {
        $query = "INSERT INTO inventory (`catname`, `productname` ,`quantityadded`, `minnimumlevle`,`costprice`,`profit`, `preparationtime`,`sellingprice`,`salable`)VALUES ('$catname',' $pname','$qtyadded','$minlevle','$costp','$profit','$preptime','$sallingp','1')";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
    
        if($noofrows==1)
        {
            header("Location: ../View/Inventory/addInventory.php?msg='Registration Successful");
         
        }
        else
        {
            header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysql_error());          
        }
       
    }
    

  }elseif(isset($_POST["category"])){
    $catname = $_POST['catname'];

    $query = "INSERT INTO category (`catname`)VALUES ('$catname')";
    $results = mysql_query($query);
    $noofrows = mysql_affected_rows();

    if($noofrows==1)
    {
        header("Location: ../View/Inventory/addInventory.php?msg='Registration Successful");
     
    }
    else
    {
        header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysql_error());          
    }

  }else{
    if (isset($_POST["delcategory"])) {

        // $catname = $_POST['catname'];
        $query = "DELETE FROM category WHERE id ='" . $_POST["id"] . "'";
        
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            header("Location: ../View/Inventory/addInventory.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/Inventory/addInventory.php?fail= Error:".mysql_error()); 
        }
    }
  }



?>