<?php
    session_start();
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

   
    $conn = conString1();

    if (isset( $_SESSION['userName'])) {
        
        if (isset($_POST['man'])) {

            $status = $_POST['approval'];
            $remark = mysqli_real_escape_string($conn,$_POST['remark']);
            $prno = $_POST['freqNo'];
            $date = $_POST['date'];
            echo $prno;
        
            $approver =  $_SESSION['userName'];
            $items11 = array();
            $query11 = "SELECT `signature` FROM users WHERE uname='$approver'";
            $results11 = mysqli_query($conn,$query11);
            while($row11 = mysqli_fetch_array($results11)){
                $items11[] = $row11;
            }

            $sigman11 = $items11[0]['signature'];
                
            if ($items11[0]['signature']) {
                $query = "UPDATE `fundrequisition`  SET manstatus='$status',manremark='$remark',mansig='$sigman11',mandate='$date' WHERE `fregno` ='$prno'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalByMan.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalByMan.php?fail= Error:".mysqli_error($conn)); 
                }
            } else {
                $query = "UPDATE `fundrequisition`  SET manstatus='$status',manremark='$remark',mandate='$date' WHERE `fregno` ='$prno'";
                $results = mysqli_query($conn,$query);
                $noofrows = mysqli_affected_rows($conn);
                if ($noofrows == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalByMan.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalByMan.php?fail= Error:".mysqli_error($conn)); 
                }
            }
            
        }else if(isset($_POST['manD'])){
            
            $status1 = $_POST['approval'];
            $remark1 = $_POST['remark'];
            $prno1 = $_POST['freqNo'];
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
              
                $query1 = "UPDATE `fundrequisition`  SET mandsatus='$status1',mandremark='$remark1',mandsig='$sigman12',manddate='$date' WHERE `fregno` ='$prno1'";
                $results1 = mysqli_query($conn,$query1);
                $noofrows1 = mysqli_affected_rows($conn);
                if ($noofrows1 == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalByMd.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalByMd.php?fail= Error:".mysqli_error($conn)); 
                }
                      
            }else {
               
                $query1 = "UPDATE `fundrequisition`  SET mandsatus='$status1',mandremark='$remark1',manddate='$date' WHERE `fregno` ='$prno1'";
                $results1 = mysqli_query($conn,$query1);
                $noofrows1 = mysqli_affected_rows($conn);
                if ($noofrows1 == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalByMd.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalByMd.php?fail= Error:".mysqli_error($conn)); 
                }
            }
        }else if(isset($_POST['sup'])){
    
            $status2 = $_POST['approval'];
            $remark2 = $_POST['remark'];
            $prno2 = $_POST['freqNo'];
            $date = $_POST['date'];

            $items22 = array();
            $approver22 =  $_SESSION['userName'];
            $query22 = "SELECT `signature` FROM users WHERE uname='$approver22'";
            $results22 = mysqli_query($conn,$query22);
            while($row22 = mysqli_fetch_array($results22)){
                $items22[] = $row22;
            }
            $sigman22 = $items22[0]['signature'];
            if ($sigman22)
            {
                $query2 = "UPDATE `fundrequisition`  SET supstatus='$status2',supremark='$remark2',supsig='$sigman22',supdate='$date'  WHERE `fregno` ='$prno2'";
                $results2 = mysqli_query($conn,$query2);
                $noofrows2 = mysqli_affected_rows($conn);
                if ($noofrows2 == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalBySupervisor.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalBySupervisor.php?fail= Error:".mysqli_error($conn)); 
                }
                      
            }else {
                $query2 = "UPDATE `fundrequisition`  SET supstatus='$status2',supremark='$remark2',supdate='$date'  WHERE `fregno` ='$prno2'";
                $results2 = mysqli_query($conn,$query2);
                $noofrows2 = mysqli_affected_rows($conn);
                if ($noofrows2 == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalBySupervisor.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalBySupervisor.php?fail= Error:".mysqli_error($conn)); 
                }
                
            }
        }
    }

 
?>