<?php 
include "../includes/session_check.php";
  $login_info="";
    if(isset($_POST['submit'])){
        include "../configuration/dbconnection.php";
        include "../classes/operator.php";
        $conn=new Dbconnection();
        $operator=new Operator($conn->connect());
        $users=$operator->user_records();
            
        foreach ($users as $user){
            if($user['pswd']==$_POST['old']){
                if($_POST['new']==$_POST['confirm_new']){
                if($operator->change_password($_POST['new'])){
                $login_info='<div class="alert alert-success alert-dismissibl">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Password changed</div>';}
    }else{
        $login_info='<div class="alert alert-danger alert-dismissibl">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Fail!</strong> Passwords do not match</div>';
    }}else{
        $login_info='<div class="alert alert-danger alert-dismissibl">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Fail!</strong> Your old password is invalid</div>';
    }
}}
?>

<div class="col-lg-12">
    <p align='justify'>This section lets you change some settings</p>
</div>


<div class="col-md-6">
<div class="form-group">
                    <?php echo $login_info; ?>
                        </div>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Change password
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <ul class="list-group">
                    <form class="user" action="" method="POST">
                        <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="old" placeholder="Enter old password...">
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="new" placeholder="Enter new password">
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="confirm_new" placeholder="Confirm new password">
                        </div>
                        <!-- <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                        </div> -->
                        <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Submit">
                  </form>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        User setting 2
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                <ul class="list-group">
               Setting 2 form
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                       User setting 3
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                <ul class="list-group">
                Setting 3 form
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        User setting 4
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                <ul class="list-group">
                Setting 4 form
                    </ul>
                </div>
            </div>
        </div> -->
    </div>
</div>