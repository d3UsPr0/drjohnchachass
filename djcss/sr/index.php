<?php
session_start();
include "configuration/dbconnection.php";
include "classes/operator.php";
include "includes/page_engine.php";
$login_info="";
    
    if(isset($_POST['login']))
    {
      
      $conn=new Dbconnection();
      $operator=new Operator($conn->connect());
      $users=$operator->users();
        foreach ($users as $user){
            
            if($user['user_id']==$_POST['username'] && $user['pswd']==$_POST['pswd'] && $user['role']=='student'){
				// Storing username in session variable 
                $_SESSION['username'] = $user['user_id'];
                $_SESSION['fname']=$user['fname'];
				        $_SESSION['success'] = TRUE;
				        header("Location:includes/template.php");
            }elseif($user['user_id']==$_POST['username'] && $user['pswd']==$_POST['pswd'] && $user['role']=='staff'){
				// Storing username in session variable 
        $_SESSION['username'] = $user['user_id']; 
        $_SESSION['fname']=$user['fname'];
				$_SESSION['success'] = TRUE;
                header("Location:includes/academic.php");
            }else{
				$login_info='<div class="alert alert-danger alert-dismissibl">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Fail!</strong> Wrong Username or Password</div>';

            }
        }
	}
	 echo "Hi";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DJCSS-SR</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST" action="">
                  <div class="form-group text-center">
                    <?php echo $login_info;?>
                  </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pswd" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <!-- <label class="custom-control-label" for="customCheck">Remember Me</label> -->
                      </div>
                    </div>
                    <!-- <a href="#" type=submit name="go" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
                    <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="Login">
                  </form>
                  <hr>
                  <div class="text-center">
                    <!-- <a class="small" href="includes/forgot-password.php">Forgot Password?</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
