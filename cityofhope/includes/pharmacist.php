<?php
session_start();
include "../includes/session_check.php";
include '../config/dbconnection.php';
include "../classes/operator.php";
include "../includes/engine2.php";
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$instock=$operator->instock();
$out_of_stock=$operator->out_of_stock();
$today_count=$operator->viewSoldToday();
$expired=$operator->viewExpiredcount();
?>
<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $pagetitle?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link rel="shortcut icon" type="image/png" href="../assets/ico/favicon.png" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/supp_nav.css"> -->

    <link rel="stylesheet" type="text/css" href="../css/registration_form.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../assets/img/logo-form.png" width="30" height="30" class="d-inline-block align-top" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="mr-auto"></div>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item active">
                <li class="username"></li>
                <a class="nav-link" href="#"><?php echo $_SESSION['username_standard'];?><span
                        class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header">Option</h6>
                        <!-- <a class="dropdown-item" href="#"><?php echo $_SESSION['username'];?></a> -->
                        <a class="dropdown-item" href="../includes/logout_standard.php">Sign out</a>
                    </div>

                </li>

            </ul>

        </div>
    </nav>
    <section class="counters">
        <div class="container">   
        <?php foreach($today_count as $today){
                        echo '<div>
                        <a href="pharmacist.php?id=sells"><i class="fas fa-exclamation-triangle fa-3x"></i></i>
						<div class="counter" data-target="'.$today['id'].'">0</div>
						<h3>Sells (today)</h3>
						</div></a>';
						}
					?>        
            <?php foreach($instock as $instock_count_count){
                        echo '<div>
                        <a href="pharmacist.php?id=instock"><i class="fas fa-store fa-3x"></i>
						<div class="counter" data-target="'.$instock_count_count['instock'].'">0</div>
						<h3>In-Stock</h3>
						</div></a>';
						}
					?>

            <?php foreach($out_of_stock as $out_of_stock_count){
						echo '<div>
						<a href="pharmacist.php?id=out-of-stock"><i class="fas fa-exclamation-triangle fa-3x"></i>
						<div class="counter" data-target="'.$out_of_stock_count['out_of_stock'].'">0</div>
						<h3>Out of stock</h3>
						</div></a>';
						}
					?>

            <?php foreach($expired as $expired_count){
                        echo '<div>
                        <a href="pharmacist.php?id=expired"><i class="fas fa-exclamation-triangle fa-3x"></i>
						<div class="counter" data-target="0">0</div>
						<h3>Expired</h3>
						</div></a>';
						}
					?>

        </div>
    </section>
    <div class="content" style="align:center">

        <!-- Section 1 -->
        <?php
require $contents;
?>

    </div>
    <!-- Footer -->
    <footer>
        <div style="text-align:center">
            City of Hope &copy 2020
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/modal.js"></script>

    <!-- Jquery JS-->
    <script src="../pharmacist/vendor/jquery/jquery.min.js"></script>

    <!-- Vendor JS-->
    <!-- <script src="../pharmacist/vendor/select2/select2.min.js"></script>
<script src="../pharmacist/vendor/datepicker/moment.min.js"></script>
<script src="../pharmacist/vendor/datepicker/daterangepicker.js"></script> -->

    <!-- Main JS-->
    <!-- <script src="../pharmacist/js/global.js"></script> -->
    <script src="../js/scripts.js"></script>
    <script src="../js/chart.js"></script>
</body>

</html>

</html>