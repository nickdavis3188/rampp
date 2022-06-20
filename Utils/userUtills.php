<?php 
    class UserUtills
    {
         

        function usersTableDisplay(){

            $items = array();
    
            $query ="SELECT fname,lname,sex,designation,uname FROM users";
            $results = mysql_query($query);
    
            while($row = mysql_fetch_array($results)){
                $items[] = $row;
            }
            return $items;
        }

 
        
    }
   
    
?> 