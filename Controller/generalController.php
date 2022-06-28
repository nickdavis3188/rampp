<?php

class GeneralController{
    

    function createUser()
    {

        $fname = $_REQUEST['firstName'];
        $lname = $_REQUEST['lastName'];
        $uname = $_REQUEST['userName'];
        $pword = $_REQUEST['password'];
        $privilege = $_REQUEST['privilege'];
        
        $query = "insert into users (fname,lname,uname,pword,privilege)values('$fname','$lname','$uname','$pword','$privilege')";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if($noofrows==1)
        {
            echo ("The system user ".$fname." ".$lname. "'s account has been successfully created. <br>");
            echo ("<br><br><a href=".getenv('HTTP_REFERER').">Add More Users...</a>");
        }
        else
        {
            echo ("The user can not be added at the moment. Try again with a different username <br>".mysql_error());
            echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
        }

    }

    function deleteUser1()
    {
        $duser = $_REQUEST['duser'];
        $query = "delete from users where fname ='"."$duser"."'";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();
        if ($noofrows==1)
        {
        echo ("The user account has been successfully deleted...<br>");
        
        }
        else
        {
        
         echo ("The user account can not be deleted at this moment, please try again later...<br>");
         echo ("<br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
         }
    }

    function userRegistration($fname,$lname,$email,$phone,$address,$office,$signature,$sex,$profilepic,$userName,$password,$previlage){
    
        $query = "INSERT INTO users (`fname`, `lname`, `uname`, `pword`, `privilege`, `email`, `address`, `phone`, `sex`, `designation`, `profilepic`, `signature`) VALUES ('$fname', '$lname', '$userName', '$password', '$previlage', '$email', '$address', '$phone', '$sex', '$office', '$profilepic', '$signature')";
        
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();

        if($noofrows==1)
        {
            header("Location: ../View/HrManagement/addUser.php?msg='Registration Successful'");
         
        }
        else
        {
            header("Location: ../View/HrManagement/addUser.php?fail= Error:".mysql_error());          
        }
    }
    function fundreqest($fregno,$from,$datecreated,$ammount,$ammountword,$subject,$file,$justification,$manstatus,$mandsatus,$supstatus,$to){
        
        
        
        $query = "INSERT INTO fundrequisition (`fregno`, `from` ,`datecreated`, `ammount`,`ammountword`,`subject`, `file`, `justification`, `manstatus`,`mandsatus`,`supstatus`,`to`,`reqfrom`)VALUES ('$fregno',' $from','$datecreated','$ammount','$ammountword','$subject','$file','$justification','$manstatus','$mandsatus','$supstatus','$to')";
        $results = mysql_query($query);
        $noofrows = mysql_affected_rows();

        if($noofrows==1)
        {
            header("Location: ../View/FundRequisision/createFundRequisition.php?msg='Request Successfully Sent");
         
        }
        else
        {
            header("Location: ../View/FundRequisision/createFundRequisition.php?fail= Error:".mysql_error());          
        }
    }

    function updatequote($id){

        $items = array();

        $query ="SELECT quoted FROM prequisitioninfo WHERE preqno='$id'";

        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
      
        if (count($items) == 1) {
            $incr = $items[0]["quoted"]+1;
            $query3 = "UPDATE `prequisitioninfo`  SET quoted='$incr' WHERE preqno='$id'";
            $results3 = mysql_query($query3);
            $noofrows3 = mysql_affected_rows();
            if ($noofrows3 == 1){
                return "True";
            }else{
                return mysql_error();
            }
        }else{
            return "can't increment quote";
        }

    }
    function sendLpoCheck($id){
  
        $query3 = "UPDATE `lpouniquevendor`  SET lpocreated='Yes' WHERE vendorId ='$id'";
        $results3 = mysql_query($query3);
        $noofrows3 = mysql_affected_rows();
        if ($noofrows3 == 1){
            return "True";
        }else{
            return mysql_error();
        }
    }

    function getrqNo(){
  
        $items = array();

        $query ="SELECT * FROM prequisitioninfo";

        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
      
        if (count($items) == 0) {
            return 001;
        }else{
           $privNum =  ($items[count($items)- 1]["preqno"]) + 1;
           return $privNum;
        }
        // return $items;
    }

    function getFunNp(){
  
        $items = array();

        $query ="SELECT * FROM  fundrequisition";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        if (count($items) == 0) {
            return 001;
        }else{
           $privNum =  $items[count($items)- 1]["fregno"] + 1;
           return $privNum;
        }
        // return $items;
    }
    function getAllCategory(){
  
        $items = array();

        $query ="SELECT * FROM category";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }

    function getAllApprovedByMdLpo(){
  
        $items = array();

        $query ="SELECT * FROM  prequisitionconfirm WHERE lpo <> '1'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function getAllApprovedByMdk(){
  
        $items = array();

        $query ="SELECT * FROM prequisitioninfo WHERE csupapprove <> 'approve' AND mandapprove = 'approve'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }

    function getAllInventory(){
  
        $items = array();

        $query ="SELECT * FROM  inventory WHERE quantityadded < minnimumlevle" ;
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function getAllInventoryCat(){
  
        $items = array();

        $query ="SELECT * FROM category" ;
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return count($items);
    }
    function getAllInventoryPro(){
  
        $items = array();

        $query ="SELECT * FROM  inventory" ;
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return count($items);
    }
    function getAllInventoryLow(){
  
        $items = array();

        $query ="SELECT * FROM  inventory WHERE quantityadded < minnimumlevle";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return count($items);
    }

    function getAllApprovedByMdCC(){
  
        $items = array();

        $query ="SELECT * FROM prequisitioninfo WHERE quoted <>'0' AND mandapprove = 'approve'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function getAllApprovedByMd(){
  
        $items = array();

        $query ="SELECT * FROM prequisitioninfo WHERE mandapprove = 'approve'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function getAllDepartment(){
  
        $items = array();

        $query ="SELECT * FROM department";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function purchasePTableDisplay(){
 
        $items = array();

        $query ="SELECT `preqno`,`from`,`subject`,`date`,`summary`,`total`,`supapprove`,`manapprove`,`mandapprove`,`reqfrom` FROM prequisitioninfo";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function inventoryTableDisplay(){
 
        $items = array();

        $query ="SELECT * FROM inventory";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }

    function fundTableDisplay(){
   
        $items = array();

        $query ="SELECT * FROM fundrequisition";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function getVendorEmail($id){

        $items = array();

        $query ="SELECT `email` FROM vendors WHERE id = '$id'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function usersTableDisplay(){

        $items = array();

        $query ="SELECT * FROM users";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function lpoTableDisplay(){

        $items = array();

        $query ="SELECT * FROM  lpouniquevendor WHERE lpocreated ='Yes'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function vendorTableDisplay(){

        $items = array();

        $query ="SELECT * FROM vendors";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function vendorQuoteTableDisplay(){

        $items = array();

        $query ="SELECT * FROM prequisitionconfirm";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function staffTableDisplay(){

        $items = array();

        $query ="SELECT fname,lname,sex,dept,stafftag FROM staff";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    //lop
    function getAllSubUnApprlpo(){

        $items = array();

        $query ="SELECT * FROM lpouniquevendor WHERE lpocreated ='Yes' AND approvesup='Pending' ";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function getAllManUnApprlpo(){

        $items = array();

        $query ="SELECT * FROM lpouniquevendor WHERE lpocreated ='Yes' AND approvesup='approve' AND approveman='Pending' ";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function getAllManDUnApprlpo(){

        $items = array();

        $query ="SELECT * FROM lpouniquevendor WHERE lpocreated ='Yes' AND approveman='approve' AND approvemand='Pending' ";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    //lpo
    function getAllSubUnApproveC(){

        $items = array();

        $query ="SELECT * FROM prequisitioninfo WHERE compappsup='Pending'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }

    function getAllManUnApproveC(){

        $items = array();

        $query ="SELECT * FROM prequisitioninfo WHERE compappsup='approve' AND 	compappman='Pending'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }

    function getAllManDUnApproveC(){

        $items = array();

        $query ="SELECT * FROM prequisitioninfo WHERE compappman='approve' AND compappmand='Pending'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    //CompTable
    // purchase Requisition supapprove	manapprove	mandapprove
    function getAllSubUnApproveP(){

        $items = array();

        $query ="SELECT * FROM prequisitioninfo WHERE supapprove='Pending'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function getAllManUnApproveP(){

        $items = array();

        $query ="SELECT * FROM prequisitioninfo WHERE supapprove='approve' AND manapprove='Pending'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }
    function getAllManDUnApproveP(){

        $items = array();

        $query ="SELECT * FROM prequisitioninfo WHERE manapprove='approve' AND mandapprove='Pending'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }

//  FundRequisition fregno	from	datecreated	ammount	ammountword	subject	file	justification	manstatus	mandsatus	supstatus	manremark	mandremark	supremark	mansig	mandsig	supsig	to
    function getAllManUnApproveF(){

        $items = array();

        $query ="SELECT * FROM `fundrequisition` WHERE supstatus='approve' AND manstatus='Pending'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }

    function getAllManDUnApproveF(){

        $items = array();

        $query ="SELECT * FROM fundrequisition WHERE manstatus='approve' AND mandsatus='Pending'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }

    function getAllSubUnApproveF(){

        $items = array();

        $query ="SELECT * FROM fundrequisition WHERE supstatus='Pending'";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)){
            $items[] = $row;
        }
        return $items;
    }

   

    

    
}

