<?php
   session_start();
   unset($_SESSION["username_standard"]);
   unset($_SESSION['login']);
   header("Location: ../");
   
?>