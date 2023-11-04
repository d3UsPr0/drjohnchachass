<?php include "../includes/session_check.php" ;?>
<?php 
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$out_of_stock_list=$operator->displayOutOfStock();
?>
<div class="section-1-container section-container" id="section-1">
    <div class="container">
        <div class="row">
            <div class="col section-1 section-description wow fadeIn">
                <h2>List of drugs below minimum count </h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Drug name</th>
                    <th scope="col">Store quantity</th>
                    <th scope="col">Cost/Each</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Tanzania Sh</th>
                    <th scope="col">Expire date</th>
                </tr>
            </thead>
            <tbody>
                <?php
    foreach ($out_of_stock_list as $stock){
     echo '<tr>
     <th scope="row">'.$stock['id'].'</th>
     <td data-title="Drug name">'.$stock['dname'].'</td>
     <td data-title="Quantity">'.$stock['store_q'].'</td>
     <td data-title="Cost/each">'.$stock['cost'].'</td>
     <td data-title="Unit">'.$stock['unit'].'</td>
     <td data-title="Tanzania Sh">'.$stock['tsh'].'</td>
     <td data-title="Expire">'.$stock['expire'].'</td></tr>';
    }?>
            </tbody>
        </table>
    </div>
</div>