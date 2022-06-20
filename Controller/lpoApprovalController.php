<?php
    session_start();
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();

    if (isset( $_SESSION['userName'])) {

        // echo  $_SESSION['userName'];
        
        if (isset($_POST['man'])) {
        
            $status = $_POST['approval'];
            $remark = $_POST['remark'];
            $prno2 = $_POST['preqNo'];
            $lpono = $_POST['lpono'];
            // echo $prno;
        
            $approver =  $_SESSION['userName'];
            $items11 = array();
            $query11 = "SELECT `signature` FROM users WHERE uname='$approver'";
            $results11 = mysql_query($query11);
            while($row11 = mysql_fetch_array($results11)){
                $items11[] = $row11;
            }
            $sigman11 = $items11[0]['signature'];
            $sigman11 = $items11;
            if ($items11[0]['signature']) {
                $query = "UPDATE `lpouniquevendor`  SET approveman='$status',remman='$remark',sigman='$sigman11' WHERE `purchaseId` ='$prno2' AND `lpono`='$lpono '";
                $results = mysql_query($query);
                $noofrows = mysql_affected_rows();
                if ($noofrows == 1)
                {
                    header("Location: ../View/Procurement/lpomanApprove.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/Procurement/lpomanApprove.php?fail= Error:".mysql_error()); 
                }
            } else {
                $query = "UPDATE `lpouniquevendor`  SET approveman='$status',remman='$remark' WHERE `purchaseId` ='$prno2' AND `lpono`='$lpono '";
                $results = mysql_query($query);
                $noofrows = mysql_affected_rows();
                if ($noofrows == 1)
                {
                    header("Location: ../View/Procurement/lpomanApprove.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/Procurement/lpomanApprove.php?fail= Error:".mysql_error()); 
                }
            }
            
        }else if(isset($_POST['manD'])){
            
            $status1 = $_POST['approval'];
            $remark1 = $_POST['remark'];
            $prno2 = $_POST['preqNo'];
            $lpono = $_POST['lpono'];

            $items12 = array();
            $approver =  $_SESSION['userName'];
            $query12 = "SELECT `signature` FROM users WHERE uname='$approver'";
            $results12 = mysql_query($query12);
            while($row12 = mysql_fetch_array($results12)){
                $items12[] = $row12;
            }
            $sigman12 = $items12[0]['signature'];
            if ($items12[0]['signature'])
            {
              
                $query1 = "UPDATE `lpouniquevendor`  SET approvemand='$status1',remmand='$remark1',sigmand='$sigman12' WHERE `purchaseId` ='$prno2' AND `lpono`='$lpono '";
                $results1 = mysql_query($query1);
                $noofrows1 = mysql_affected_rows();
                if ($noofrows1 == 1)
                {
                    header("Location: ../View/Procurement/lpoManDApprove.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/Procurement/lpoManDApprove.php?fail= Error:".mysql_error()); 
                }
                      
            }else {
               
                $query1 = "UPDATE `lpouniquevendor`  SET approvemand='$status1',remmand='$remark1' WHERE `purchaseId` ='$prno2' AND `lpono`='$lpono '";
                $results1 = mysql_query($query1);
                $noofrows1 = mysql_affected_rows();
                if ($noofrows1 == 1)
                {
                    header("Location: ../View/Procurement/lpoManDApprove.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/Procurement/lpoManDApprove.php?fail= Error:".mysql_error()); 
                }
            }
        }else if(isset($_POST['sup'])){
    
            $status2 = $_POST['approval'];
            $remark2 = $_POST['remark'];
            $prno2 = $_POST['preqNo'];
            $lpono = $_POST['lpono'];

     

            $items22 = array();
            $approver22 =  $_SESSION['userName'];
            $query22 = "SELECT `signature` FROM users WHERE uname='$approver'";
            $results22 = mysql_query($query22);
            while($row22 = mysql_fetch_array($results22)){
                $items22[] = $row22;
            }
            $sigman22 = $items22[0]['signature'];
            if ($sigman22)
            {
                $query2 = "UPDATE `lpouniquevendor`  SET approvesup='$status2',remsup='$remark2',sigsup	='$sigman22' WHERE `purchaseId` ='$prno2' AND `lpono`='$lpono '";
                $results2 = mysql_query($query2);
                $noofrows2 = mysql_affected_rows();
                if ($noofrows2 == 1)
                {
                    header("Location: ../View/Procurement/lpoSupApprove.php.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/Procurement/lpoSupApprove.php?fail= Error:".mysql_error()); 
                }
                      
            }else {
                $query2 = "UPDATE `lpouniquevendor`  SET approvesup='$status2',remsup='$remark2' WHERE `purchaseId` ='$prno2' AND `lpono`='$lpono'";
                $results2 = mysql_query($query2);
                $noofrows2 = mysql_affected_rows();
                if ($noofrows2 == 1)
                {
                    header("Location: ../View/Procurement/lpoSupApprove.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/Procurement/lpoSupApprove.php?fail= Error:".mysql_error()); 
                }
                
            }
        }
    }else{
        echo "No User Name";
    }

 
?>