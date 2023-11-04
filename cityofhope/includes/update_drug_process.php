<?php
include '../config/dbconnection.php';
include "../classes/operator.php";
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$drugs=$operator->allDrugs();
if(isset($_POST['submit'])){
    if(!empty($_POST['drug'])){
   if($operator->updateDrug($_POST['dquantity'],$_POST['sell_price'],$_POST['drug'])){ 
       echo "<div style='text-align:center;margin-top:250px;'><h3 style='color:green'>Drug updated successiful.</h3><br><a href='template.php?id=continue-update'>Continue</a></div>";
   }else{
    echo "<div style='text-align:center;margin-top:250px;'><h3 style='color:red'>Failed to update.</h3><br><a href='template.php?id=back'>Go back</a></div>";
}
}}else{
    echo "<div style='text-align:center;margin-top:250px;'><h3 style='color:red'>Failed to update.</br> Select from list</h3><br><a href='template.php?id=back'>Go back</a></div>";
}
?>