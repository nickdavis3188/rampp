<?php
    session_start();
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

   
    $conn = conString1();

    if (isset( $_SESSION['userName'])) {

        // echo  $_SESSION['userName'];
        
        if (isset($_POST['man'])) {
        
            $status = $_POST['approval'];
            $remark = mysqli_real_escape_string($conn,$_POST['remark']);
            $prno = $_POST['preqNo'];
            $date = $_POST['date'];
      
            $approver =  $_SESSION['userName'];
            $items11 = array();
            $query11 = "SELECT `signature` FROM users WHERE uname='$approver'";
            $results11 = mysqli_query($conn,$query11);
            while($row11 = mysqli_fetch_array($results11)){
                $items11[] = $row11;
            }
            $sigman11 = $items11[0]['signature'];
            // $sigman11 = $items11;
            if ($items11[0]['signature']) {
                $query = "UPDATE `payrollinfo`  SET approve2='$status',remark2='$remark',sgnature2='$sigman11',approveDate2='$date' WHERE `date` ='$prno'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {
                    header("Location: ../View/Accounts/payrollApproval2.php?msg= Update Successful");        
                }
                else
                {
                    header("Location: ../View/Accounts/payrollApproval2.php?fail= Error:".mysqli_error($conn)); 
                }
            } else {
                $query = "UPDATE `payrollinfo`  SET approve2='$status',remark2='$remark',approveDate2='$date' WHERE `date` ='$prno'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {
                    header("Location: ../View/Accounts/payrollApproval2?msg= Update Successful");        
                }
                else
                {
                    header("Location: ../View/Accounts/payrollApproval2.php?fail= Error:".mysqli_error($conn)); 
                }
            }
            
        }else if(isset($_POST['manD'])){
            
            $status1 = $_POST['approval'];
            $remark1 = mysqli_real_escape_string($conn,$_POST['remark']) ;
            $prno1 = $_POST['preqNo'];
            $date = $_POST['date'];

            $items12 = array();
            $approver =  $_SESSION['userName'];
            $query12 = "SELECT `signature` FROM users WHERE uname='$approver'";
            $results12 = mysqli_query($conn,$query12);
            while($row12 = mysqli_fetch_array($results12)){
                $items12[] = $row12;
            }
            $sigman12 = $items12[0]['signature'];
            if ($items12[0]['signature'])
            {
              
                $query1 = "UPDATE `payrollinfo`  SET approve3='$status1',remark3='$remark1',sgnature3='$sigman12',approveDate3='$date' WHERE `date` ='$prno1'";
                $results1 = mysqli_query($conn,$query1);
                $noofrows1 = mysqli_affected_rows($conn);
                if ($noofrows1 == 1)
                {
                    header("Location: ../View/Accounts/payrollApproval3.php?msg= Update Successful");        
                }
                else
                {
                    header("Location: ../View/Accounts/payrollApproval3.php?fail= Error:".mysqli_error($conn)); 
                }
                      
            }else {
               
                $query1 = "UPDATE `payrollinfo`  SET approve3='$status1',remark3='$remark1',approveDate3='$date' WHERE `date` ='$prno1'";
                $results1 = mysqli_query($conn,$query1);
                $noofrows1 = mysqli_affected_rows($conn);
                if ($noofrows1 == 1)
                {
                    header("Location: ../View/Accounts/payrollApproval3.php?msg= Update Successful");        
                }
                else
                {
                    header("Location: ../View/Accounts/payrollApproval3.php?fail= Error:".mysqli_error($conn)); 
                }
            }
        }else if(isset($_POST['sup'])){
    
            $status2 = $_POST['approval'];
            $remark2 = mysqli_real_escape_string($conn,$_POST['remark']);
            $prno2 = $_POST['preqNo'];
            $date = $_POST['date'];

         
            $items22 = array();
            $approver22 =  $_SESSION['userName'];
            $query22 = "SELECT `signature` FROM users WHERE uname='$approver22'";
            $results22 = mysqli_query($conn,$query22);
            while($row22 = mysqli_fetch_array($results22)){
                $items22[] = $row22;
            }
            $sigman22 = $items22[0]['signature'];
            // echo $sigman22;
            if ($items22[0]['signature'])
            {
                $query2 = "UPDATE `payrollinfo`  SET approve1='$status2',remark1='$remark2',sgnature1='$sigman22',approveDate1='$date' WHERE `date` ='$prno2'";
                $results2 = mysqli_query($conn,$query2);
                $noofrows2 = mysqli_affected_rows($conn);
                if ($noofrows2 == 1)
                {
                    header("Location: ../View/Accounts/payroleApprovel1.php?msg= Update Successful");        
                }
                else
                {
                    header("Location: ../View/Accounts/payroleApprovel1.php?fail= Error:".mysqli_error($conn)); 
                }
            }else {
                $query2 = "UPDATE `payrollinfo`  SET approve1='$status2',remark1='$remark2',approveDate1='$date' WHERE `date` ='$prno2'";
                $results2 = mysqli_query($conn,$query2);
                $noofrows2 = mysqli_affected_rows($conn);
                if ($noofrows2 == 1)
                {
                    header("Location: ../View/Accounts/payroleApprovel1.php?msg= Update Successful");        
                }
                else
                {
                    header("Location: ../View/Accounts/payroleApprovel1.php?fail= Error:".mysqli_error($conn)); 
                }
                
            }
        }
    }else{
        echo "No User Name";
    }

 
?>