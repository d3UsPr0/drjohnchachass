<?php 
session_start();
include 'config/dbconnection.php';
include "classes/operator.php";
include "includes/engine.php";
$login_info="";
    
    if(isset($_POST['go']))
    {
	$conn=new Dbconnection();
    $operator=new Operator($conn->connect());
	$users=($operator->allUsers());
        foreach ($users as $user){
            if($user['email']==$_POST['email'] && $user['upassword']==$_POST['password'] && $user['account']=="admin"){
				// Storing username in session variable 
				$_SESSION['username_admin'] = $user['lname']; 
				$_SESSION['login'] = TRUE;
				header("Location:includes/template.php");
            }elseif($user['email']==$_POST['email'] && $user['upassword']==$_POST['password'] && $user['account']=="standard"){
				// Storing username in session variable 
				$_SESSION['username_standard'] = $user['lname']; 
				$_SESSION['login'] = TRUE;
                header("Location:includes/pharmacist.php");
            }else{
				$login_info="Wrong username or password";

            }
        }
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
    <title>Welcome - City of Hope</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="shortcut icon" type="image/png" href="assets/ico/favicon.png" />
</head>

<body>
    <section class="container">
        <section class="login-form">
            <form method="post" action="" role="login">
                <img src="assets/img/logo-form.png" class="img-responsive" alt="" />
                <input type="email" name="email" placeholder="Email" required class="form-control input-lg" />
                <input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
                <button type="submit" name="go" class="btn btn-lg btn-primary btn-block" id="go">Sign in</button>
                <div style="color:red">
                    <?php echo $login_info; ?>
                </div>
            </form>
        </section>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/css/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
</body>

</html>