<?php
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$in_store=$operator->viewStock()
?>
<div class="card">
    <div class="card-body">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;font-size:20px">
                <h4 class="panel-title">
                    Available drugs and selling price
                </h4>
            </div>
            <div class="panel-body">
                <table style="text-align:left">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th >Drug</th>
                            <th>Quantity</th>
                            <th>Selling price</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        foreach($in_store as $list){
                        echo '<tr >
                                <td data-label="ID">'.$list['id'].'</td>
                                <td data-label="Name">'.$list['dname'].'</td>
                                <td data-label="Quantity">'.$list['store_q'].'</td>
                                <td data-label="Quantity">'.$list['tsh'].'</td>
					        </tr>';
                        }
                        echo'<tr >
                            <td colspan=6></td>
					    </tr>';
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>