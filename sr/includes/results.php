<?php
include "../includes/session_check.php";
include "../configuration/dbconnection.php";
include "../classes/operator.php";
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$user_records=$operator->user_records();
                    foreach($user_records as $year){
                       $form_one=$year['entry_year'];
                       $form_two=$year['entry_year']+1;
                       $form_three=$year['entry_year']+2;
                       $form_four=$year['entry_year']+3;
                    }

?>
<div class="col-lg-12">
    <p align='justify'>This section lets you view your results for particular year of study. Please select a year of
        study to view your results.</p>
</div>


<div class="col-md-6">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Form I : <?php echo $form_one ?>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <ul class="list-group">
                    <?php 
                        $exam_titles=$operator->exam_titles($form_one);
                        foreach($exam_titles as $titles){
                            if($titles['term']=="null"){
                                echo '<li class="list-group-item">'.$titles['title'].'</li>';
                            }else{
                            echo '<li class="list-group-item"><a href="template.php?id=one&term='.$titles['term'].'">'.$titles['title'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Form II :  <?php echo $form_two ?>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                <ul class="list-group">
                <?php 
                        $exam_titles=$operator->exam_titles($form_two);
                        foreach($exam_titles as $titles){
                             if($titles['term']=="null"){
                            echo '<li class="list-group-item">'.$titles['title'].'</li>';
                        }else{
                        echo '<li class="list-group-item"><a href="template.php?id=one&term='.$titles['term'].'">'.$titles['title'].'</a></li>';
                        }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Form III :  <?php echo $form_three ?>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                <ul class="list-group">
                <?php 
                        $exam_titles=$operator->exam_titles($form_three);
                        foreach($exam_titles as $titles){
                            if($titles['term']=="null"){
                                echo '<li class="list-group-item">'.$titles['title'].'</li>';
                            }else{
                            echo '<li class="list-group-item"><a href="template.php?id=one&term='.$titles['term'].'">'.$titles['title'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Form IV :  <?php echo $form_four ?>
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                <ul class="list-group">
                <?php 
                        $exam_titles=$operator->exam_titles($form_four);
                        foreach($exam_titles as $titles){
                            if($titles['term']=="null"){
                                echo '<li class="list-group-item">'.$titles['title'].'</li>';
                            }else{
                            echo '<li class="list-group-item"><a href="template.php?id=one&term='.$titles['term'].'">'.$titles['title'].'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>