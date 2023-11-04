<?php include "../includes/session_check.php" ;?>
<?php 
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$inventory_list=$operator->viewInventories();
?>
<div class="section-1-container section-container" id="section-1">
    <div class="container">
        <div class="row">
            <div class="col section-1 section-description wow fadeIn">
                <h2>List of available inventories</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th scope="col">Inventory ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
    foreach ($inventory_list as $inventory){
     echo '<tr>
     <th scope="row">'.$inventory['id'].'</th>
     <td data-title="Name">'.$inventory['name'].'</td>
     <td data-title="Quantity">'.$inventory['quantity'].'</td>
     <td data-title="Description">'.$inventory['description'].'</td></tr>';
    }?>
            </tbody>
        </table>
    </div>
</div>