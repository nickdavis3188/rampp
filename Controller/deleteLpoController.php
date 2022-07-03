<?php
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

   
    $conn = conString1();

    if (isset($_POST['delete'])) {
       $lpoNo = $_POST["lpono"];
        $query = "UPDATE lpouniquevendor SET `lpocreated`='No'	WHERE lpono ='$lpoNo'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {
            header("Location: ../View/Procurement/viewDeleteLpo.php?msg= Delete Successful");        
        }
        else
        {
            header("Location: ../View/Procurement/viewDeleteLpo.php?fail= Error:".mysqli_error($conn)); 
        }
    }
?>