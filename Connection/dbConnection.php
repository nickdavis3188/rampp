<?php 
    class DbConnection{
        var $serverName;
        var $dbUserName;
        var $dbPassword;
        var $dbName;
       

        function __construct ($serverName,$dbUserName,$dbPassword,$dbName)
        {
            $this->serverName = $serverName;
            $this->dbUserName = $dbUserName;
            $this->dbPassword = $dbPassword;
            $this->dbName = $dbName;
           
        }

        function connect()
        {
            $conn = mysql_connect($this->serverName,$this->dbUserName,$this->dbPassword)or die("Problems :".mysql_error());
            $dbselect = mysql_select_db($this->dbName,$conn) or die("Error selecting DB: ".mysql_error());

        }
        function conString(){
            $conn = mysql_connect($this->serverName,$this->dbUserName,$this->dbPassword)or die("Problems :".mysql_error());
            return $conn;
        }
    }

?>