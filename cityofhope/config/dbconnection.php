<?php 

 class DbConnection{

     private $conn;

     function  __construct()
     {
        //  $this->conn = new mysqli("localhost","root","","coh");
         $this->conn = new mysqli("localhost","drjohnch_admin","Djcss@2017!","drjohnch_coh");
     }
     function connect()
     {
    // Starting the session, necessary
     // for using session variables
     //session_start();
     // Declaring and hoisting the variables
    // $username = "";
    // $errors = array();
    // $_SESSION['success'] = ""; 
         return $this->conn;
     }
 }


?>