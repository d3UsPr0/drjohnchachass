<?php
   session_start();
   unset($_SESSION["username_admin"]);
   unset($_SESSION['login']);
   header("Location: ../");
   
?>