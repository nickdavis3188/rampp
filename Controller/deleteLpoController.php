<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();

    if (isset($_POST['delete'])) {
       $lpoNo = $_POST["lpono"];
        $query = "UPDATE lpouniquevendor SET `lpocreated`='No'	WHERE lpono ='$lpoNo'";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows == 1)
        {
            header("Location: ../View/Procurement/viewDeleteLpo.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/Procurement/viewDeleteLpo.php?fail= Error:".mysql_error()); 
        }
    }
?>