<?php include "../includes/session_check.php" ;?>
<?php 
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$sold_list=$operator->viewSold();
?>
<div class="section-1-container section-container" id="section-1">
    <div class="container">
        <div class="row">
            <div class="col section-1 section-description wow fadeIn">
                <h2>List of supplied drugs</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">pharmacist</th>
                    <th scope="col">Drug</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Cost/each</th>
                    <th scope="col">Total</th>

                </tr>
            </thead>
            <tbody>
                <?php
    foreach ($sold_list as $sold){
     echo '<tr>
     <th scope="row">'.$sold['id'].'</th>
     <td data-title="Date">'.$sold['date'].'</td>
     <td data-title="pharmacist">'.$sold['pharmacist'].'</td>
     <td data-title="Drug">'.$sold['dname'].'</td>
     <td data-title="Quantity">'.$sold['quantity'].'</td>
     <td data-title="Cost/each">'.$sold['cost'].'</td>
     <td data-title="Total">'.$sold['total'].'</td></tr>';
    }?>
            </tbody>
        </table>
    </div>
</div>