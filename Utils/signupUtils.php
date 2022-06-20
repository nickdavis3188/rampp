<?php
    class SignupUtils{
       var $fName;
       var $lName;
       var $userName;
       var $password;
       var $privilege;

       function __construct($fName,$lName,$userName,$password,$privilege){
           $this->fName = $fName;
           $this->lName = $lName;
           $this->userName = $userName;
           $this->password = $password;
           $this->privilege = $privilege;
       }

       function checkEmptyInput(){
           $result = false;
           if(empty($this->fName) || empty($this->lName) || empty($this->userName) || empty($this->password) || empty($this->privilege)){
               $result = true;
           }else{
               $result = false;
           }

           return $result;
       }

       function invalid()
       {
           $result = false;
           if (!preg_match("/^[a-zA-Z0-9]*$/",$userName)) {
               $result = true;
           }else{
               $result = false;
           }
           return $result;
       }

       function invalidEmail()
       {
           $result = false;
           $email = "myemail@mail.com";

            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $result = true;
            }else{
                $result = false;
            }
            return $result;
       }



    }