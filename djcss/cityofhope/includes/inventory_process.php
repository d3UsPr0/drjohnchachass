<?php
include "../config/dbconnection.php";
include "../classes/operator.php";
$conn=new Dbconnection();
$operator=new operator($conn->connect());
if(isset($_POST['submit'])){
    $inventory_name=$_POST['inventory_name'];
    $quantity=$_POST['quantity'];
    $q_description=$_POST['q_description'];
    if($operator->saveInventory($inventory_name,$quantity,$q_description)){
        echo "<div style='text-align:center;margin-top:250px;'><h3 style='color:green'>Successfully saved</h3><br><a href='template.php?id=add-inventory'>Continue..</a></div>";
     }else{
         echo "<div style='text-align:center;margin-top:250px;'><h3 style='color:red'>Failed to save ..</h3><br><a href='template.php?id=add-inventory'>Go back!</a></div>";
     }
 }else{
     echo "<div style='text-align:center;margin-top:250px;'><h3 style='color:red'>Failed to save ..</h3><br><a href='template.php?id=add-inventory'>Go back!</a></div>";
 }?>