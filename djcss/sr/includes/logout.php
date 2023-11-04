<?php
include "../includes/session_check.php";
?>
<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION['success']);
   unset($_SESSION['fname']);
   header("Location:https://www.drjohnchachasecondary.org/sr");
   
?>