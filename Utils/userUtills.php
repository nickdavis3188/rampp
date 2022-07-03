<?php 
    class UserUtills
    {
         

        function usersTableDisplay($conn){

            $items = array();
    
            $query ="SELECT fname,lname,sex,designation,uname FROM users";
            $results = mysqli_query($conn,$query);
    
            while($row = mysqli_fetch_array($results)){
                $items[] = $row;
            }
            return $items;
        }

 
        
    }
   
    
?> 