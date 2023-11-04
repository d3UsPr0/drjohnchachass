<?php include "../includes/session_check.php" ;?>
<?php
ob_start();
$conn = new DbConnection();
$operator = new Operator($conn->connect());
$info = "";
if(isset($_POST['submit']))
{
if($_POST['password'] == $_POST['confirm_password']){

   if($operator->insertData($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password'],$_POST['account_type'])){
    $info ="<div style='text-align:center;'><h4 style='color:green'>Pharmacist registered successfully</h4></div>";
   }else{
       $info ="Fail to register";
   }
}else{
    $info = "Password do not match";
}
}
?>
<div class="signup-form">
    <form action="" method="post" id=form>
        <p class="hint-text-info"><?php echo $info; ?></p>
        <p class="hint-text">Create account for pharmacist</p>

        <div class="form-group">
            <div class="form-group">
                <select class="form-control" name="account_type">
                    <option value="" disabled selected>Choose account type</option>
                    <option value="admin">Admin</option>
                    <option value="standard">Standard</option>
                </select>
            </div>

            <div class="row">
                <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name"
                        required="required"></div>
                <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name"
                        required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"
                required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" id="register">Register
                Now</button>
        </div>
    </form>
</div>