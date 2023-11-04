<?php
session_start();
include "../includes/session_check.php" ;
include '../config/dbconnection.php';
include "../classes/operator.php";
include "../includes/engine.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="assets/ico/favicon.png" />
    <title>City of Hope</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/styles.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/registration_form.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/login.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/table.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script> -->
</head>

<body>
    <!--wrapper start-->
    <div class="wrapper">
        <!--header menu start-->
        <div class="header">
            <div class="header-menu">
                <div class="title">City of <span>Hope</span></div>
                <div class="sidebar-btn">
                    <!-- <i class="fas fa-bars"></i> -->
                </div>
                <div style="color:white"><?php echo $_SESSION['username_admin']?></div>
                <ul>
                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                    <li><a href="#"><i class="fas fa-bell"></i></a></li>
                    <li><a href="../includes/logout_admin.php"><i class="fas fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
        <!--header menu end-->
        <!--sidebar start-->
        <div class="sidebar">
            <div class="sidebar-menu">
                <!-- <center class="profile">
						<img src="../assets/img/logo.png" alt="">
						<p>Admin</p>
					</center> -->
                <li class="item">
                    <a href="template.php?id=dashboard" class="menu-btn">
                        <i class="fas fa-desktop"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="item" id="stock">
                    <a href="#stock" class="menu-btn">
                        <i class="fas fa-store"></i><span>Stock<i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="template.php?id=in-store"><i class="fas fa-image"></i><span>In-Store</span></a>
                        <a href="template.php?id=sold"><i class="fas fa-address-card"></i><span>Sold</span></a>
                        <a href="template.php?id=add-drug"><i class="fas fa-address-card"></i><span>Add</span></a>
                        <a href="template.php?id=drug-update"><i class="fas fa-address-card"></i><span>Update</span></a>
                    </div>
                </li>
                <li class="item" id="pharmacist">
                    <a href="#pharmacist" class="menu-btn">
                        <i class="fas fa-user-friends"></i><span>Pharmacist <i
                                class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="template.php?id=viewpharmacist"><i class="fas fa-envelope"></i><span>View</span></a>
                        <a href="template.php?id=register"><i class="fas fa-envelope-square"></i><span>Add</span></a>
                    </div>
                </li>
                <li class="item" id="inventory">
                    <a href="#inventory" class="menu-btn">
                        <i class="fas fa-store-alt"></i><span>Inventories<i
                                class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="template.php?id=view-inventory"><i class="fas fa-lock"></i><span>View</span></a>
                        <a href="template.php?id=add-inventory"><i class="fas fa-language"></i><span>Add</span></a>
                    </div>
                </li>
                <li class="item" id="settings">
                    <a href="#settings" class="menu-btn">
                        <i class="fas fa-cog"></i><span>Settings <i class="fas fa-chevron-down drop-down"></i></span>
                    </a>
                    <div class="sub-menu">
                        <a href="template.php?id=change-password"><i class="fas fa-lock"></i><span>Password</span></a>
                        <a href="../includes/logout_admin.php"><i class="fas fa-language"></i><span>Log out</span></a>
                    </div>
                </li>
                <li class="item">
                    <a href="template.php?id=recounciliation" class="menu-btn">
                        <i class="fas fa-equals" aria-hidden="true"></i><span>Recounciliation</span>
                    </a>
                </li>
                <li class="item">
                    <a href="template.php?id=report" class="menu-btn">
                        <i class="fa fa-file" aria-hidden="true"></i><span>Report</span>
                    </a>
                </li>
                <li class="item">
                    <a href="template.php?id=about" class="menu-btn">
                        <i class="fas fa-info-circle"></i><span>About</span>
                    </a>
                </li>
            </div>
        </div>
        <!--sidebar end-->
        <!--main container start-->
        <div class="main-container">
            <?php
					require $contents;
				?>
        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->

    <script src="../js/scripts.js"></script>
    <script src="../js/chart.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(".sidebar-btn").click(function() {
            $(".wrapper").toggleClass("collapse");
        });
    });
    </script>


</body>

</html>