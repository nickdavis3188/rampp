<?php

class GeneralController
{


    function createUser($conn)
    {

        $fname = $_REQUEST['firstName'];
        $lname = $_REQUEST['lastName'];
        $uname = $_REQUEST['userName'];
        $pword = $_REQUEST['password'];
        $privilege = $_REQUEST['privilege'];

        $query = "insert into users (fname,lname,uname,pword,privilege)values('$fname','$lname','$uname','$pword','$privilege')";
        $results = mysqli_query($conn, $query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1) {
            echo ("The system user " . $fname . " " . $lname . "'s account has been successfully created. <br>");
            echo ("<br><br><a href=" . getenv('HTTP_REFERER') . ">Add More Users...</a>");
        } else {
            echo ("The user can not be added at the moment. Try again with a different username <br>" . mysqli_error($conn));
            echo ("<br><br><a href=" . getenv('HTTP_REFERER') . " >Go Back</a>");
        }
    }

    function deleteUser1($conn)
    {
        $duser = $_REQUEST['duser'];
        $query = "delete from users where fname ='" . "$duser" . "'";
        $results = mysqli_query($conn, $query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1) {
            echo ("The user account has been successfully deleted...<br>");
        } else {

            echo ("The user account can not be deleted at this moment, please try again later...<br>");
            echo ("<br><a href=" . getenv('HTTP_REFERER') . " >Go Back</a>");
        }
    }

    function userRegistration($conn, $fname, $lname, $email, $phone, $address, $office, $signature, $sex, $profilepic, $userName, $password, $previlage,$staffTag)
    {

        $query = "INSERT INTO users (`fname`, `lname`, `uname`, `pword`, `privilege`, `email`, `address`, `phone`, `sex`, `designation`, `profilepic`, `signature`,`staffTag`) VALUES ('$fname', '$lname', '$userName', '$password', '$previlage', '$email', '$address', '$phone', '$sex', '$office', '$profilepic', '$signature','$staffTag')";

        $results = mysqli_query($conn, $query);
        $noofrows = mysqli_affected_rows($conn);

        if ($noofrows == 1) {
            header("Location: ../View/HrManagement/addUser.php?msg='Registration Successful'");
        } else {
            header("Location: ../View/HrManagement/addUser.php?fail= Error:" . mysqli_error($conn));
        }
    }
    function fundreqest($conn, $fregno, $from, $datecreated, $ammount, $ammountword, $subject, $file, $justification, $manstatus, $mandsatus, $supstatus, $to)
    {



        $query = "INSERT INTO fundrequisition (`fregno`, `from` ,`datecreated`, `ammount`,`ammountword`,`subject`, `file`, `justification`, `manstatus`,`mandsatus`,`supstatus`,`to`,`reqfrom`)VALUES ('$fregno',' $from','$datecreated','$ammount','$ammountword','$subject','$file','$justification','$manstatus','$mandsatus','$supstatus','$to')";
        $results = mysqli_query($conn, $query);
        $noofrows = mysqli_affected_rows($conn);

        if ($noofrows == 1) {
            header("Location: ../View/FundRequisision/createFundRequisition.php?msg='Request Successfully Sent");
        } else {
            header("Location: ../View/FundRequisision/createFundRequisition.php?fail= Error:" . mysqli_error($conn));
        }
    }

    function updatequote($conn, $id)
    {

        $items = array();

        $query = "SELECT quoted FROM prequisitioninfo WHERE preqno='$id'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        if (count($items) == 1) {
            $incr = $items[0]["quoted"] + 1;
            $query3 = "UPDATE `prequisitioninfo`  SET quoted='$incr' WHERE preqno='$id'";
            $results3 = mysqli_query($conn, $query3);
            $noofrows3 = mysqli_affected_rows($conn);
            if ($noofrows3 == 1) {
                return "True";
            } else {
                return mysqli_error($conn);
            }
        } else {
            return "can't increment quote";
        }
    }
    function sendLpoCheck($conn, $id)
    {

        $query3 = "UPDATE `lpouniquevendor`  SET lpocreated='Yes' WHERE vendorId ='$id'";
        $results3 = mysqli_query($conn, $query3);
        $noofrows3 = mysqli_affected_rows($conn);
        if ($noofrows3 == 1) {
            return "True";
        } else {
            return mysqli_error($conn);
        }
    }

    function getLpoN($conn)
    {

        $items = array();

        $query = "SELECT MAX(lpono) FROM lpouniquevendor";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items[0][0] + 1;
        // if (count($items) == 0) {
        //     return 001;
        // } else {
        //     $privNum =  ($items[count($items) - 1]["lpono"]) + 1;
        //     return $privNum;
        // }
        // return $items;
    }

    function getOrderId($conn)
    {

        $items = array();

        $query = "SELECT MAX(orderid) FROM orders";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        return $items[0][0] + 1;
    }

    function getAllOrdringUnit($conn)
    {

        $items = array();

        $query = "SELECT * FROM orderingunit ";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        return $items;
    }

    function getAllOrderItems($conn,$id)
    {

        $items = array();

        $query = "SELECT * FROM orderditems WHERE orderid ='$id'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function getAllBarOrder($conn)
    {

        $items = array();

        $query = "SELECT * FROM orders WHERE br='1' AND `status`='0'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function getAllKitchenOrder($conn)
    {

        $items = array();

        $query = "SELECT * FROM orders WHERE kch='1' AND `status`='0'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
      return $items;
    }

    function getAllOrderedItem($conn)
    {

        $items = array();

        $query = "SELECT * FROM orders ";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        return $items;
    }
    function getOrderdItem($conn)
    {

        $items = array();

        $query = "SELECT * FROM orders WHERE `status`='0'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        return $items;
    }

    function getSalableItem($conn)
    {

        $items = array();

        $query = "SELECT * FROM inventory WHERE salable='2'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        return $items;
    }

    function getrqNo($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        if (count($items) == 0) {
            return 001;
        } else {
            $privNum =  ($items[count($items) - 1]["preqno"]) + 1;
            return $privNum;
        }
        // return $items;
    }
    function getExpNo($conn)
    {

        $items = array();

        $query = "SELECT * FROM expenses";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }

        if (count($items) == 0) {
            return 001;
        } else {
            $privNum =  ($items[count($items) - 1]["expensesNo"]) + 1;
            return $privNum;
        }
        // return $items;
    }

    function getFunNp($conn)
    {

        $items = array();

        $query = "SELECT * FROM  fundrequisition";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        if (count($items) == 0) {
            return 001;
        } else {
            $privNum =  $items[count($items) - 1]["fregno"] + 1;
            return $privNum;
        }
        // return $items;
    }
    function getAllCategory($conn)
    {

        $items = array();

        $query = "SELECT * FROM category";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function check_in_array(array $array, $callback)
    {
        $value = call_user_func($callback, $array);
        
        return $value;
        
    }

    function getorderItemById($conn,$id)
    {
                 
        $items = array();
        $query ="SELECT * FROM  orderditems WHERE orderid ='$id'";
        $results = mysqli_query($conn,$query);
        
        while($row = mysqli_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    
    function getCompletedOrderById($conn)
    {

        $items3 = array();
                 
        $query3 ="SELECT * FROM  orders WHERE status ='1' AND receipt='0'";
        $results3 = mysqli_query($conn,$query3);
        
        while($row3 = mysqli_fetch_array($results3)){
           $items3[] = $row3;
       }
        return $items3;
    }
    function getorderById($conn,$id)
    {

        $items3 = array();
                 
        $query3 ="SELECT * FROM  orders WHERE orderid ='$id'";
        $results3 = mysqli_query($conn,$query3);
        
        while($row3 = mysqli_fetch_array($results3)){
           $items3[] = $row3;
       }
        return $items3;
    }
    function getAlloderingMeasurment($conn)
    {

        $items = array();

        $query = "SELECT * FROM orderingunit";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function getAllApprovedByMdLpo($conn)
    {

        $items = array();

        $query = "SELECT * FROM  prequisitionconfirm WHERE lpo <> '1'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getAllApprovedByMdk($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo WHERE csupapprove <> 'approve' AND mandapprove = 'approve'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function getApprovepReqForTheMonth($conn,$mnt)
    {

        $items = array();

        $query = "SELECT * FROM  prequisitioninfo WHERE MONTH(date) = '$mnt' AND mandapprove ='approve'";
        
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function getAllInventory($conn)
    {

        $items = array();

        $query = "SELECT * FROM  inventory WHERE quantityadded < minnimumlevle";
        
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    // str_slice(string $str, int $start [, int $end])
    function str_slice()
    {
        $args = func_get_args();
        switch (count($args)) {
            case 1:
                return $args[0];
            case 2:
                $str        = $args[0];
                $str_length = strlen($str);
                $start      = $args[1];
                if ($start < 0) {
                    if ($start >= -$str_length) {
                        $start = $str_length - abs($start);
                    } else {
                        $start = 0;
                    }
                } else if ($start >= $str_length) {
                    $start = $str_length;
                }
                $length = $str_length - $start;
                return substr($str, $start, $length);
            case 3:
                $str        = $args[0];
                $str_length = strlen($str);
                $start      = $args[1];
                $end        = $args[2];
                if ($start >= $str_length) {
                    return "";
                }
                if ($start < 0) {
                    if ($start < -$str_length) {
                        $start = 0;
                    } else {
                        $start = $str_length - abs($start);
                    }
                }
                if ($end <= $start) {
                    return "";
                }
                if ($end > $str_length) {
                    $end = $str_length;
                }
                $length = $end - $start;
                return substr($str, $start, $length);
        }
        return null;
    }
    function getProfileDetails($conn, $username)
    {
        $query = "SELECT * FROM users WHERE uname='$username'";
        $result = ($conn->query($query));
        //declare array to store the data of database
        $row = array();

        if ($result->num_rows > 0) {
            // fetch all data from db into array 
            $row = $result->fetch_all(MYSQLI_ASSOC);
            return $row;
        }
    }
    function getAllInventoryCat($conn)
    {

        $items = array();

        $query = "SELECT * FROM category";
        $result = ($conn->query($query));
        //declare array to store the data of database
        $row = array();

        if ($result->num_rows > 0) {
            // fetch all data from db into array 
            $row = $result->fetch_all(MYSQLI_ASSOC);
            return count($row);
        }
    }
    function getAllInventoryPro($conn)
    {

        $items = array();

        $query = "SELECT * FROM  inventory";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return count($items);
    }
    function getAllInventoryLow($conn)
    {

        $items = array();

        $query = "SELECT * FROM  inventory WHERE quantityadded < minnimumlevle";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return count($items);
    }

    function getAllApprovedByMdCC($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo WHERE quoted <>'0' AND mandapprove = 'approve'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getSingleAudit($conn)
    {
        $yy = date('Y');
        $mm = date('m');
        $items = array();

        $query = "SELECT * FROM customAudit WHERE MONTH(date) = '$mm' AND YEAR(date) = '$yy'";

        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getAllApprovedByMd($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo WHERE mandapprove = 'approve'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getAllDepartment($conn)
    {

        $items = array();

        $query = "SELECT * FROM department";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function purchasePTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT `preqno`,`from`,`subject`,`date`,`summary`,`total`,`supapprove`,`manapprove`,`mandapprove`,`reqfrom` FROM prequisitioninfo";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function inventoryTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT * FROM inventory";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function fundTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT * FROM fundrequisition";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function expensesTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT * FROM expenses";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function payrollTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT * FROM payrollinfo";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    
    function getVendorEmail($conn, $id)
    {

        $items = array();

        $query = "SELECT `email` FROM vendors WHERE id = '$id'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function usersTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT * FROM users";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function lpoTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT * FROM  lpouniquevendor WHERE lpocreated ='Yes'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function vendorTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT * FROM vendors";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function vendorQuoteTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitionconfirm";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function staffTableDisplay($conn)
    {

        $items = array();

        $query = "SELECT * FROM staff";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function staffT($conn)
    {

        $items = array();

        $query = "SELECT * FROM staff";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    //lop
    function getAllSubUnApprlpo($conn)
    {

        $items = array();

        $query = "SELECT * FROM lpouniquevendor WHERE lpocreated ='Yes' AND approvesup='Pending' ";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getAllManUnApprlpo($conn)
    {

        $items = array();

        $query = "SELECT * FROM lpouniquevendor WHERE lpocreated ='Yes' AND approvesup='approve' AND approveman='Pending' ";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getAllManDUnApprlpo($conn)
    {

        $items = array();

        $query = "SELECT * FROM lpouniquevendor WHERE lpocreated ='Yes' AND approveman='approve' AND approvemand='Pending' ";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    //lpo
    function getAllSubUnApproveC($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo WHERE compappsup='Pending' AND quoted <>'0'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function getAllManUnApproveC($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo WHERE compappsup='approve' AND 	compappman='Pending' AND quoted <>'0'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function getAllManDUnApproveC($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo WHERE compappman='approve' AND compappmand='Pending' AND quoted <>'0'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    //CompTable
    // purchase Requisition supapprove	manapprove	mandapprove
    function getAllSubUnApproveP($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo WHERE supapprove='Pending'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getAllManUnApproveP($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo WHERE supapprove='approve' AND manapprove='Pending'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getAllManDUnApproveP($conn)
    {

        $items = array();

        $query = "SELECT * FROM prequisitioninfo WHERE manapprove='approve' AND mandapprove='Pending'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    // Payroll
    function getAllPayroleApproval1($conn)
    {

        $items = array();

        $query = "SELECT * FROM payrollinfo WHERE approve1='1'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getAllPayroleApproval2($conn)
    {

        $items = array();

        $query = "SELECT * FROM payrollinfo WHERE approve1='2' AND approve2='1'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
    function getAllPayroleApproval3($conn)
    {

        $items = array();

        $query = "SELECT * FROM payrollinfo WHERE approve2='2' AND approve3='1'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
// Payroll
  
    function getAllManUnApproveF($conn)
    {

        $items = array();

        $query = "SELECT * FROM `fundrequisition` WHERE supstatus='approve' AND manstatus='Pending'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function getAllManDUnApproveF($conn)
    {

        $items = array();

        $query = "SELECT * FROM fundrequisition WHERE manstatus='approve' AND mandsatus='Pending'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }

    function getAllSubUnApproveF($conn)
    {

        $items = array();

        $query = "SELECT * FROM fundrequisition WHERE supstatus='Pending'";
        $results = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($results)) {
            $items[] = $row;
        }
        return $items;
    }
}
