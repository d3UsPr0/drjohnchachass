<?php 
include "../includes/session_check.php";
include "../configuration/dbconnection.php";
include "../classes/operator.php";
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$url_term=$_GET['term'];
$results=$operator->results($url_term);
$user_records=$operator->user_records();
foreach($user_records as $user_profile){
    $a=idate("Y");$b=$user_profile['entry_year'];$z=($a-$b)+1;  
}
foreach($results as $result){
$result_id=$result['result_id'];
$term=$result['term'];
$result_date=$result['result_date'];
$civics=$result['civics'];
$history=$result['history'];
$geography=$result['geography'];
$kiswahili=$result['kiswahili'];
$english=$result['english'];
$physics=$result['physics'];
$chemistry=$result['chemistry'];
$biology=$result['biology'];
$maths=$result['maths'];
$bible=$result['bible'];
$ics=$result['ics'];
$agriculture=$result['agriculture'];
$literature=$result['literature'];
$civics_g=$result['civics_g'];
$history_g=$result['history_g'];
$geography_g=$result['geography_g'];
$kiswahili_g=$result['kiswahili_g'];
$english_g=$result['english_g'];
$physics_g=$result['physics_g'];
$chemistry_g=$result['chemistry_g'];
$biology_g=$result['biology_g'];
$maths_g=$result['maths_g'];
$bible_g=$result['bible_g'];
$ics_g=$result['ics_g'];
$agriculture_g=$result['agriculture_g'];
$literature_g=$result['literature_g'];
$civics_p=$result['civics_p'];
$history_p=$result['history_p'];
$geography_p=$result['geography_p'];
$kiswahili_p=$result['kiswahili_p'];
$english_p=$result['english_p'];
$physics_p=$result['physics_p'];
$chemistry_p=$result['chemistry_p'];
$biology_p=$result['biology_p'];
$maths_p=$result['maths_p'];
$bible_p=$result['bible_p'];
$ics_p=$result['ics_p'];
$agriculture_p=$result['agriculture_p'];
$literature_p=$result['literature_p'];
$civics_r=$result['civics_r'];
$history_r=$result['history_r'];
$geography_r=$result['geography_r'];
$kiswahili_r=$result['kiswahili_r'];
$english_r=$result['english_r'];
$physics_r=$result['physics_r'];
$chemistry_r=$result['chemistry_r'];
$biology_r=$result['biology_r'];
$maths_r=$result['maths_r'];
$bible_r=$result['bible_r'];
$ics_r=$result['ics_r'];
$agriculture_r=$result['agriculture_r'];
$literature_r=$result['literature_r'];
$overall_t=$result['overall_t'];
$overall_a=$result['overall_a'];
$overall_g=$result['overall_g'];
$overall_p=$result['overall_p'];
$points=$result['points'];
$division=$result['division'];
$title=$result['title'];

}
?>

<style id="table_style" type="text/css">

    body{
    font-family: Montserrat;
    font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 1rem;
    }
    
    table
    {
        border: 1px solid ccc;
        border-collapse: collapse;
    }
    table.center{
        margin-left:auto;
        margin-right:auto;
    }
    table th
    {
        background-color: #F7F7F7;
        color: #333;
        font-weight: bold;
    }
    table th, table td
    {
        padding: 5px;
        border: 1px solid #ccc;
    }
    

    
</style>

<script type="text/javascript">
    function PrintTable() {
        var printWindow = window.open('', '', 'height=3508px,width=2480px');
        printWindow.document.write('<html><head><title>Student Results</title>');
 
        //Print the Table CSS.
        var table_style = document.getElementById("table_style").innerHTML;
        printWindow.document.write('<style type = "text/css">');
        printWindow.document.write(table_style);
        printWindow.document.write('</style>');
        printWindow.document.write('</head>');
 
        //Print the DIV contents i.e. the HTML Table.
        printWindow.document.write('<body>');
        var divContents = document.getElementById("results").innerHTML;
        printWindow.document.write(divContents);
        printWindow.document.write('</body>');

 
        printWindow.document.write('</html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

<div class="card-body">      
<?php
            $folder="results";
            echo '<div class="alert alert-success alert-dismissibl" style="text-align:center">
            <a href="../results/'.$result_date.'/'.$z.'/'.$term.'/'.$result_id.'_'.$term.'.pdf"><strong>Download your full report!</strong></a></div>';
            echo '<input type="button" class="btn btn-primary" onclick="PrintTable()"; value="Print results" style="align:center"/>';
        ?>
        </div>
<div class="card shadow mb-4" id="results">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Results</h6>
    </div> -->
    <div class="card">
        <div class="card-body">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;font-size:14px;font-weight:700">
                    PRESIDENT'S OFFICE <br>
                    REGIONAL ADMINISTRATION AND LOCAL GOVERNMENT<br>
                    TARIME DISTRICT COUNCIL<br>
                    DR. JOHN CHACHA SECONDARY SCHOOL<br>
                    TAARIFA YA MAENDELEO YA MWANAFUNZI<br>
                    <?php echo strtoupper($title); ?><br>
                   JINA: <?php echo strtoupper($user_profile['fname']." ".$user_profile['mname']." ".$user_profile['lname']);?><br>
                </div>
                
            </div><br>
                <table class="center">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>SOMO</th>
                            <th>ALAMA</th>
                            <th>DARAJA</th>
                            <th>NAFASI</th>
                            <th>MAONI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="S/N">1</td>
                            <td data-label="Subject">Civics</td>
                            <td data-label="Score"><?php echo $civics ?></td>
                            <td data-label="Grade"><?php echo $civics_g ?></td>
                            <td data-label="Position"><?php echo $civics_p ?></td>
                            <td data-label="Remarks"><?php echo $civics_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">2</td>
                            <td data-label="Subject">History</td>
                            <td data-label="Score"><?php echo $history ?></td>
                            <td data-label="Grade"><?php echo $history_g ?></td>
                            <td data-label="Position"><?php echo $history_p ?></td>
                            <td data-label="Remarks"><?php echo $history_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">3</td>
                            <td data-label="Subject">Geography</td>
                            <td data-label="Score"><?php echo $geography ?></td>
                            <td data-label="Grade"><?php echo $geography_g ?></td>
                            <td data-label="Position"><?php echo $geography_p ?></td>
                            <td data-label="Remarks"><?php echo $geography_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">4</td>
                            <td data-label="Subject">Kiswahili</td>
                            <td data-label="Score"><?php echo $kiswahili ?></td>
                            <td data-label="Grade"><?php echo $kiswahili_g ?></td>
                            <td data-label="Position"><?php echo $kiswahili_p ?></td>
                            <td data-label="Remarks"><?php echo $kiswahili_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">5</td>
                            <td data-label="Subject">English</td>
                            <td data-label="Score"><?php echo $english ?></td>
                            <td data-label="Grade"><?php echo $english_g ?></td>
                            <td data-label="Position"><?php echo $english_p ?></td>
                            <td data-label="Remarks"><?php echo $english_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">6</td>
                            <td data-label="Subject">Physics</td>
                            <td data-label="Score"><?php echo $physics ?></td>
                            <td data-label="Grade"><?php echo $physics_g ?></td>
                            <td data-label="Position"><?php echo $physics_p ?></td>
                            <td data-label="Remarks"><?php echo $physics_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">7</td>
                            <td data-label="Subject">Chemistry</td>
                            <td data-label="Score"><?php echo $chemistry ?></td>
                            <td data-label="Grade"><?php echo $chemistry_g ?></td>
                            <td data-label="Position"><?php echo $chemistry_p ?></td>
                            <td data-label="Remarks"><?php echo $chemistry_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">8</td>
                            <td data-label="Subject">Biology</td>
                            <td data-label="Score"><?php echo $biology ?></td>
                            <td data-label="Grade"><?php echo $biology_g ?></td>
                            <td data-label="Position"><?php echo $biology_p ?></td>
                            <td data-label="Remarks"><?php echo $biology_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">9</td>
                            <td data-label="Subject">B/Mathematics</td>
                            <td data-label="Score"><?php echo $maths ?></td>
                            <td data-label="Grade"><?php echo $maths_g ?></td>
                            <td data-label="Position"><?php echo $maths_p ?></td>
                            <td data-label="Remarks"><?php echo $maths_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">13</td>
                            <td data-label="Subject">B/Knowledge</td>
                            <td data-label="Score"><?php echo $bible ?></td>
                            <td data-label="Grade"><?php echo $bible_g ?></td>
                            <td data-label="Position"><?php echo $bible_p ?></td>
                            <td data-label="Remarks"><?php echo $bible_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">11</td>
                            <td data-label="Subject">ICS</td>
                            <td data-label="Score"><?php echo $ics ?></td>
                            <td data-label="Grade"><?php echo $ics_g ?></td>
                            <td data-label="Position"><?php echo $ics_p ?></td>
                            <td data-label="Remarks"><?php echo $ics_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">12</td>
                            <td data-label="Subject">Agriculture</td>
                            <td data-label="Score"><?php echo $agriculture ?></td>
                            <td data-label="Grade"><?php echo $agriculture_g ?></td>
                            <td data-label="Position"><?php echo $agriculture_p ?></td>
                            <td data-label="Remarks"><?php echo $agriculture_r ?></td>
                        </tr>
                        <tr>
                            <td data-label="S/N">10</td>
                            <td data-label="Subject">Literature</td>
                            <td data-label="Score"><?php echo $literature ?></td>
                            <td data-label="Grade"><?php echo $literature_g ?></td>
                            <td data-label="Position"><?php echo $literature_p ?></td>
                            <td data-label="Remarks"><?php echo $literature_r ?></td>
                        </tr>
                       
                    </tbody>
                </table> <br>
        <div class="card-body">    
            <div class="alert alert-success alert-dismissibl" style="text-align:center"> 
                Ameshika nafasi ya <strong><?php echo substr($overall_p,0,strpos($overall_p,'/')) ?></strong> Kati ya wanafunzi <strong><?php echo substr($overall_p,strpos($overall_p,'/')+1) ?></strong>, Division <strong><?php echo $division?></strong> na Points <strong><?php echo $points?></strong>
            </div>  
        </div>
    </div>
</div>
<!-- <input type="button" onclick="PrintTable();" value="Print"/> -->


       
        
        