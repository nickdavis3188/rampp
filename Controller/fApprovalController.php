<?php
    session_start();
//  function usersTableDisplay(){
    include("../Env/env.php");
    require("../Connection/dbConnection.php");

    $conn = new DbConnection($databaseHost,$databaseUserName,$databasePassword,$databaseName);
    $conn->connect();

    if (isset( $_SESSION['userName'])) {
        
        if (isset($_POST['man'])) {

            $status = $_POST['approval'];
            $remark = $_POST['remark'];
            $prno = $_POST['freqNo'];
            $date = $_POST['date'];
            echo $prno;
        
            $approver =  $_SESSION['userName'];
            $items11 = array();
            $query11 = "SELECT `signature` FROM users WHERE uname='$approver'";
            $results11 = mysql_query($query11);
            while($row11 = mysql_fetch_array($results11)){
                $items11[] = $row11;
            }

            $sigman11 = $items11[0]['signature'];
                
            if ($items11[0]['signature']) {
                $query = "UPDATE `fundrequisition`  SET manstatus='$status',manremark='$remark',mansig='$sigman11',mandate='$date' WHERE `fregno` ='$prno'";
                $results = mysql_query($query);
                $noofrows = mysql_affected_rows();
                if ($noofrows == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalByMan.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalByMan.php?fail= Error:".mysql_error()); 
                }
            } else {
                $query = "UPDATE `fundrequisition`  SET manstatus='$status',manremark='$remark',mandate='$date' WHERE `fregno` ='$prno'";
                $results = mysql_query($query);
                $noofrows = mysql_affected_rows();
                if ($noofrows == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalByMan.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalByMan.php?fail= Error:".mysql_error()); 
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
            $results12 = mysql_query($query12);
            while($row12 = mysql_fetch_array($results12)){
                $items12[] = $row12;
            }
            $sigman12 = $items12[0]['signature'];
            if ($items12[0]['signature'])
            {
              
                $query1 = "UPDATE `fundrequisition`  SET mandsatus='$status1',mandremark='$remark1',mandsig='$sigman12',manddate='$date' WHERE `fregno` ='$prno1'";
                $results1 = mysql_query($query1);
                $noofrows1 = mysql_affected_rows();
                if ($noofrows1 == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalByMd.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalByMd.php?fail= Error:".mysql_error()); 
                }
                      
            }else {
               
                $query1 = "UPDATE `fundrequisition`  SET mandsatus='$status1',mandremark='$remark1',manddate='$date' WHERE `fregno` ='$prno1'";
                $results1 = mysql_query($query1);
                $noofrows1 = mysql_affected_rows();
                if ($noofrows1 == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalByMd.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalByMd.php?fail= Error:".mysql_error()); 
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
            $results22 = mysql_query($query22);
            while($row22 = mysql_fetch_array($results22)){
                $items22[] = $row22;
            }
            $sigman22 = $items22[0]['signature'];
            if ($sigman22)
            {
                $query2 = "UPDATE `fundrequisition`  SET supstatus='$status2',supremark='$remark2',supsig='$sigman22',supdate='$date'  WHERE `fregno` ='$prno2'";
                $results2 = mysql_query($query2);
                $noofrows2 = mysql_affected_rows();
                if ($noofrows2 == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalBySupervisor.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalBySupervisor.php?fail= Error:".mysql_error()); 
                }
                      
            }else {
                $query2 = "UPDATE `fundrequisition`  SET supstatus='$status2',supremark='$remark2',supdate='$date'  WHERE `fregno` ='$prno2'";
                $results2 = mysql_query($query2);
                $noofrows2 = mysql_affected_rows();
                if ($noofrows2 == 1)
                {
                    header("Location: ../View/FundRequisision/fapprovalBySupervisor.php?msg= Approval Successful");        
                }
                else
                {
                    header("Location: ../View/FundRequisision/fapprovalBySupervisor.php?fail= Error:".mysql_error()); 
                }
                
            }
        }
    }

 
?>