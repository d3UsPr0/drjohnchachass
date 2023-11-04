<?php include "../includes/session_check.php" ;?>
<?php
$conn=new DbConnection();
$operator=new operator($conn->connect());
$total_for_all=$operator->total_sells_for_all();
$sold_list=$operator->viewSold();
$i=1;

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

<div class="signup-form">
    <form action="" method="post" id=form>
        <div class="form-group">
            <p class="hint-text">From</p>
            <div class="row">

                <div class="col"><input type="date" class="form-control" name="start_date" placeholder="Start date"
                        required="required"></div>
                <div class="col"><input type="time" class="form-control" name="start_time" placeholder="Time"
                        required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <p class="hint-text">To</p>
            <div class="row">
                <div class="col"><input type="date" class="form-control" name="end_date" placeholder="End date"
                        required="required"></div>
                <div class="col"><input type="time" class="form-control" name="end_time" placeholder="Time"
                        required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" id="register">Display</button>
        </div>
    </form>
    
</div>
<div id="results">
<div class="row my-3">
    <div class="col">
        <h5>Results: For each pharmacist</h5>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Total sells</th>
        </tr>
    </thead>
    <tbody>
        <?php
					if(isset($_POST['submit'])){

						$d1=str_replace("/","-",$_POST['start_date']);
						$t1=str_replace("/","-",$_POST['start_time']);
						$d2=str_replace("/","-",$_POST['end_date']);
						$t2=str_replace("/","-",$_POST['end_time']);

						$date1=$d1." ".$t1.":"."00";
						$date2=$d2." ".$t2.":"."00";
                        $sells_for_each_pharmacist=$operator->display_sells_for_each_pharmacist_range($date1,$date2);
                        $sells_for_each_location=$operator->display_sells_for_each_location_range($date1,$date2);
                        $total_sells_pharmacist=$operator->total_sells_for_pharmacist_range($date1,$date2);$total_sells_location=$operator->total_sells_for_location_range($date1,$date2);

				 foreach($sells_for_each_pharmacist as $pharmacist_sells){
                      echo '<tr>
						<td data-label="ID">'.$i.'</td>
						<td data-label="Supplie">'.$pharmacist_sells['pharmacist'].'</td>
						<td data-label="Quantity" >'.$pharmacist_sells['quantity'].'</td>
						<td data-label="Total" style="">'.$pharmacist_sells['total'].'</td>
					  </tr>';
					  $i=$i+1;}
					  foreach($total_sells_pharmacist as $pharmacist_total){
                        echo '<tr style="background:blue;font-size:20px;color:white">
                            <td data-label="" colspan=3>Total Sells (All above):</td>
                            <td data-label="Amount" style="">'.$pharmacist_total['total'].'</td>
                        </tr>';}
                  
                        
					  }
					  ?>
    </tbody>
</table>


<div class="row my-3">
    <div class="col">
        <h5>Results: Grouped by Location</h5>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Total sells</th>
        </tr>
    </thead>
    <tbody>
        <?php
					if(isset($_POST['submit'])){

						$d1=str_replace("/","-",$_POST['start_date']);
						$t1=str_replace("/","-",$_POST['start_time']);
						$d2=str_replace("/","-",$_POST['end_date']);
						$t2=str_replace("/","-",$_POST['end_time']);

						$date1=$d1." ".$t1.":"."00";
						$date2=$d2." ".$t2.":"."00";
                        $sells_for_each_pharmacist=$operator->display_sells_for_each_pharmacist_range($date1,$date2);
                        $sells_for_each_location=$operator->display_sells_for_each_location_range($date1,$date2);
                        $total_sells_pharmacist=$operator->total_sells_for_pharmacist_range($date1,$date2);$total_sells_location=$operator->total_sells_for_location_range($date1,$date2);

                     foreach($sells_for_each_location as $location_sells){
					  echo '<tr>
						<td data-label="ID">'.$i.'</td>
						<td data-label="Location">'.$location_sells['loc'].'</td>
						<td data-label="Quantity" >'.$location_sells['quantity'].'</td>
						<td data-label="Total" >'.$location_sells['total'].'</td>
					  </tr>';
					  $i=$i+1;}
					  foreach($total_sells_location as $location_total){
                        echo '<tr style="background:blue;font-size:20px;color:white">
                            <td data-label="" colspan=3>Total Sells (All above):</td>
                            <td data-label="Amount" style="">'.$location_total['total'].'</td>
                        </tr>';}
                        
                        
                        
					  }
					  ?>
    </tbody>
</table>
</div>
<?php
            echo '<input type="button" class="btn btn-primary" onclick="PrintTable()"; value="Print report" style="align:center"/>';
        ?>
