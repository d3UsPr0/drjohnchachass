<?php 
include '../config/dbconnection.php';
include "../classes/operator.php";
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$pharmacists=$operator->allDrugs();
if(isset($_POST['sell'])){
if(!empty($_POST['dname'])){
session_start();
$pharmacist_name=$_SESSION['username_standard'];
$loc=$_POST['loc'];
$dname=$_POST['dname'];
$dquantity=$_POST['dquantity'];
// $date=date('Y-m-d H:i:s');
$date=date('Y-m-d H:i:s', strtotime('+1 hour'));
$drug_count=$operator->drug_count($dname);
foreach($drug_count as $count){
if($dquantity<=$count['drug_count']){
    $total=$operator->drug_cost($dname,$dquantity);
    foreach($total as $calculator){
    $sell=$calculator['total_cost'];
    $cost_per_unit=$calculator['price'];
    if($operator->drug_decrease($dquantity,$dname)){
    if($operator->saveSale($loc,$pharmacist_name,$dname,$dquantity,$cost_per_unit,$sell)){
    header('location: pharmacist.php');
    }
    }
    }
    }else{
    echo "<div style='text-align:center;margin-top:250px;'>
        <h3 style='color:red'>Hey, the quantity you are trying to supply exceeds the amount in store </br> Please,
            contact administrator for stock update! Thanks...</h3><br><a href='pharmacist.php?id=back'>Go back</a>
    </div>";
    }
    }}else{
    echo "<div style='text-align:center;margin-top:250px;'>
        <h3 style='color:red'>Hey, Please Select drug to supply</h3><br><a href='pharmacist.php?id=back'>Go back</a>
    </div>";
    }
    }
    ?>