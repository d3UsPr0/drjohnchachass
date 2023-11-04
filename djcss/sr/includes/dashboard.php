<?php
include "../includes/session_check.php";
include "../configuration/dbconnection.php";
include "../classes/operator.php";
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$user_records=$operator->user_records();
?>
<div class="row">
                        <div class="alert alert-success alert-dismissibl">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> You have logged into Dr. John Chacha Secondary
                            School
                            Student Record Management System.
                        </div>
<div class="row py-2">
    <div class="col-12 col-sm-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-4 mx-auto text-nowrap text-center px-2">
                        <a href="">
                            <img class="d-block mx-auto rounded-circle img-fluid" src="../img/profile.jpg">
                        </a>
                    </div>
                    <div class="col-lg-7 text-center text-lg-left">
                    <?php
                    foreach($user_records as $user_profile){
                        $a=idate("Y");$b=$user_profile['entry_year'];$z=($a-$b)+1;  
                        
                        echo '<h3 class="d-inline">'.$user_profile['fname']." ".$user_profile['mname']." ".$user_profile['lname'].'</h3>';
                        // <!-- <span class="badge badge-pill badge-success sup small align-top">4</span> -->
                        echo '<h6>Admission: '.$_SESSION['username'].'</h6>';
                        echo '<h6>Class: Form '.$z.'</h6>';
                        echo '<h6>Birthday: '.$user_profile['dob'].'</h6>';
                        // echo '<h6>Age :'.-$user_profile['dob'].'Years</h6>';
                        // echo '<h6>Sex :'.$user_profile['sex'].'</h6>';
                    }
                        
                       ?>

                    </div>
                    <!-- <div class="col-lg-3 col-6 mx-auto">
                            <div class="row no-gutters text-center justify-content-end align-items-end">
                                <div class="col">
                                    <h2>10</h2>
                                    <span class="badge badge-pill badge-dark font-weight-normal">Subjects</span>
                                </div>
                                <div class="col">
                                    <h2>9</h2>
                                    <span class="badge badge-pill badge-dark font-weight-normal">Friends</span>
                                </div>
                                <div class="col">
                                    <h2>3</h2>
                                    <span class="badge badge-pill badge-dark font-weight-normal">Height</span>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</div>