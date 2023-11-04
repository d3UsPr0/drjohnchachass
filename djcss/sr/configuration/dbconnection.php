<?php 

 class DbConnection{

     private $conn;
     
     function  __construct()
     {
         $this->conn = new mysqli("localhost","drjohnch_admin","Djcss@2017!","drjohnch_djcss");
     }


     function connect()
     {
         return $this->conn;
     }
 }

?>