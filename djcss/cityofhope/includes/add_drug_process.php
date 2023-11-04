<?php
include '../config/dbconnection.php';
include "../classes/operator.php";
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
if(isset ($_POST['submit'])){
    $drug_name=$_POST['d_name'];
    $drug_quantity=$_POST['quantity'];
    $unit=$_POST['unit'];
    $tsh=$_POST['tsh'];
    $expire=$_POST['expire'];
    if($operator->insertDrug($drug_name,$drug_quantity,$unit,$tsh,$expire)){
       echo "<div style='text-align:center;margin-top:250px;'><h3 style='color:green'>Drug added successfully</h3><br><a href='template.php?id=add-drug'>Continue..</a></div>";
    }else{
        echo "<div style='text-align:center;margin-top:250px;'><h3 style='color:red'>Failed to add ..</h3><br><a href='template.php?id=add-drug'>Go back!</a></div>";
    }
}else{
    echo "<div style='text-align:center;margin-top:250px;'><h3 style='color:red'>Failed to add ..</h3><br><a href='template.php?id=add-drug'>Go back!</a></div>";
}

?>