<?php
    class Validation{
        
        var $userName;
        var $password;
       
 
        function __construct($userName,$password){         
            $this->userName = $userName;
            $this->password = $password;
          
        }

        function IsAnyEmpty()
        {
            $result = "";
            if (is_null($this->userName) || is_null($this->password)) {
                $result = "true";
            }else{
                $result = "false";
            }
            return $result;
        }
    }
?>