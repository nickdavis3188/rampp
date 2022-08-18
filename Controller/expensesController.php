<?php
     require("generalController.php");
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    
    $conn = conString1();
    $genControll = new GeneralController();

   if (isset($_POST["expenses"])) {

        $datee = $_POST['date'];
        $expNo = $_POST['expNo'];
        $staffId = $_POST['staffId'];
        $purch = $_POST['purch'];
        $expTy = $_POST['expTy'];
        $itemB = $_POST['itemB'];
        $desc = mysqli_real_escape_string($conn,$_POST['desc']);
        $amount = $_POST['amount'];
        $just = mysqli_real_escape_string($conn,$_POST['just']);

        
        $query = "INSERT INTO expenses (`date`, `expensesNo`,`staffId`, `purchaser`,`expensesType`,`itemBought`, `description`, `amount`, `justification`) VALUES ('$datee',' $expNo','$staffId','$purch','$expTy','$itemB','$desc','$amount','$just')";

        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);

        if($noofrows==1)
        {
            header("Location: ../View/Accounts/expenses.php?msg='Expenses Added Successful'");
        
        }
        else
        {
            header("Location: ../View/Accounts/expenses.php?fail= Error:".mysqli_error($conn));          
        }
   }
?>