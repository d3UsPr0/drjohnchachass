<?php include "../includes/session_check.php" ;?>
<?php
$conn=new DbConnection();
$operator=new operator($conn->connect());
$total_for_all=$operator->total_sells_for_all();
$all_users=$operator->all_pharmacists();
$inventory=$operator->inventory();
$instock=$operator->instock();
$out_of_stock=$operator->out_of_stock();
$sells_for_each_pharmacist=$operator->display_sells_for_each_pharmacist();
$sells_group_by_locations=$operator->display_sells_for_each_village();
$total_sells=$operator->total_sells_for_all();
$expired=$operator->viewExpiredcount();
$i=1;
?>

<div class="container">
    <!-- <div class="row my-3">
        <div class="col">
            <h5>This week</h5>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="chLine" height="100"></canvas>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row my-3">
        <div class="col">
            <h5>Total supplies grouped by locations</h5>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Village</th>
                <th>Quantity</th>
                <th>Total sells</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sells_group_by_locations as $location_sells){
					  echo '<tr>
						<td data-label="ID">'.$i.'</td>
						<td data-label="Location">'.$location_sells['loc'].'</td>
						<td data-label="Quantity">'.$location_sells['quantity'].'</td>
						<td data-label="Total">'.$location_sells['total'].'</td>
					  </tr>';
					  $i=$i+1;}
					  foreach($total_sells as $total){
                        echo '<tr style="background:green;font-size:20px;color:white">
                            <td data-label="" colspan=3>Total Sells (All above): </td>
                            
                            <td data-label="Amount">'.number_format($total['total'],2).'</td>
					    </tr>';}
					  ?>
        </tbody>
    </table>

    <div class="row my-3">
        <div class="col">
            <h5>Total supplies for each pharmacist</h5>
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
            <?php foreach($sells_for_each_pharmacist as $pharmacist_sells){
					  echo '<tr>
						<td data-label="ID">'.$i.'</td>
						<td data-label="Supplie">'.$pharmacist_sells['pharmacist'].'</td>
						<td data-label="Quantity">'.$pharmacist_sells['quantity'].'</td>
						<td data-label="Total">'.$pharmacist_sells['total'].'</td>
					  </tr>';
					  $i=$i+1;}
					  foreach($total_sells as $total){
                        echo '<tr style="background:green;font-size:20px;color:white">
                            <td data-label="" colspan=3>Total Sells (All above): </td>
                            
                            <td data-label="Amount">'.number_format($total['total'],2).'</td>
					    </tr>';}
					  ?>
        </tbody>
    </table>
    <!-- counter -->
    <div class="row my-3">
        <div class="col">
            <h5>All counts</h5>
        </div>
    </div>
    <section class="counters">
        <div class="container">
            <?php foreach($total_for_all as $all_sells){
						echo '<div>
							<i class="fas fa-funnel-dollar fa-3x"></i>
							<div class="counter" data-target="'.$all_sells['total'].'">0</div>
							<h3>All sales</h3>
						</div>';
					}?>
            <?php foreach($all_users as $users){
						echo '<div>
							<i class="fas fa-user-friends fa-3x"></i>
							<div class="counter" data-target="'.$users['users'].'">0</div>
							<h3>Pharmacists</h3>
						</div>';
					}?>
            <?php foreach($instock as $instock_count_count){
						echo '<div>
						<i class="fas fa-store fa-3x"></i>
						<div class="counter" data-target="'.$instock_count_count['instock'].'">0</div>
						<h3>In-Stock</h3>
						</div>';
						}
					?>

            <?php foreach($out_of_stock as $out_of_stock_count){
						echo '<div>
						<a href="template.php?id=out-of-stock"><i class="fas fa-exclamation-triangle fa-3x"></i></a>
						<div class="counter" data-target="'.$out_of_stock_count['out_of_stock'].'">0</div>
						<h3>Out of stock</h3>
						</div>';
						}
					?>

            <?php foreach($expired as $expired_count){
						echo '<div>
						<a href="template.php?id=expired"><i class="fas fa-exclamation-triangle fa-3x"></i></a>
						<div class="counter" data-target="'. $expired_count['count'].'">0</div>
						<h3>Expired</h3>
						</div>';
						}
					?>

            <?php foreach($inventory as $inventory_count){
						echo '<div>
						<i class="fas fa-store-alt fa-3x"></i>
						<div class="counter" data-target="'.$inventory_count['inventory'].'">0</div>
						<h3>Inventories</h3>
						</div>';
						}
					?>

        </div>
    </section>

</div>
</div>